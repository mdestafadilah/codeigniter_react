var path = require('path');
var CompressionPlugin = require('compression-webpack-plugin');
var MinifyPlugin = require('babel-minify-webpack-plugin');
var webpack = require('webpack');
var minimist = require('minimist');
var site_path_console = minimist(process.argv.slice(2)).site_path;
var app_config = JSON.parse(require('fs').readFileSync(path.resolve(__dirname, '../../../../app.config'), 'utf8'));
var CopyWebpackPlugin = require('copy-webpack-plugin');
var package_json = require('./package.json');
var fs = require('fs');
module.exports = (env='development',arg) => {
	var site_path = (site_path_console !== undefined)?site_path_console:app_config.site_path;
	var config =
	{
		mode:env,
		plugins:[],
		externals:
		{
			jquery: 'jQuery'
		},
		entry:
		{
			app:path.resolve(__dirname, './src/js/app.js')
		},
		output:
		{
			path:path.resolve(__dirname, './dist/'+env+'/js/'),
			filename:'[name].bundle.js'
		},
		resolve:
		{
			alias:
			{
				GlobalModules: path.resolve(__dirname, '../../../modules/')
			}
		},
		performance:
		{
			hints: process.env.NODE_ENV === 'production' ? "warning" : false
		},
		module:
		{
			rules: 
			[
				{
					test: /\.config$/,
					exclude: /node_modules/,
					loader:'raw-loader'
				},
				{
					test: /\.jsx?$/,
					exclude: /(node_modules|bower_components)/,
					loader: 'babel-loader'
				},
				{
					test: /\.(png|jpg|gif|svg)$/i,
					use:
					[
						{
							loader: 'url-loader',
							options:
							{
								limit: 8192
							}
						}
					]
				},
				{
					test: /\.css$/,
					use: 
					[
						'style-loader',
						'css-loader'
					]
				},
				{
					test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
					use: 
					[
						{
							loader: 'file-loader',
							options:
							{
								limit: 10000,
								name: '[name].[ext]',
								mimetype: 'application/font-woff',
								outputPath:path.resolve(__dirname,'../fonts/'),
								publicPath:site_path+'assets/themes/'+package_json.theme.module+'/'+package_json.theme.name+'/dist/'+env+'/fonts/'
							}
						}
					]
				}
			]
		}
	}
	if(env == 'production')
	{
		config.plugins.push(
			// minify assets
			new MinifyPlugin({},{comments:false}),
			// compress plugin
			new CompressionPlugin({
				cache: true,
				deleteOriginalAssets:false
			}),
			// copy htaccess compressed assets
			new CopyWebpackPlugin([
				{
					from:path.resolve(__dirname,'../../../modules/htaccess_force_js.app_bundle'),
					toType: 'file',
					to:path.resolve(__dirname, './dist/'+env+'/js/.htaccess')
				},
				{
					from:path.resolve(__dirname,'../../../modules/htaccess_force_css.app_bundle'),
					toType: 'file',
					to:path.resolve(__dirname, './dist/'+env+'/css/.htaccess')
				}
			])
		)
	}
	return config;
}