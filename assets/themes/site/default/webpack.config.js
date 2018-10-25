var path = require('path');
var CompressionPlugin = require("compression-webpack-plugin");
var UglifyJsPlugin = require('uglifyjs-webpack-plugin');
var webpack = require("webpack");
var site_path = '/ci_app/';
module.exports = function(env='development',arg){
	var config =
	{
		mode:env,
		plugins:
		[
			new webpack.ProvidePlugin({
				$: 'jquery',
				jQuery: 'jquery'
			})
		],
		entry:
		{
			app:path.resolve(__dirname, './src/js/app.js')
		},
		output:
		{
			path:path.resolve(__dirname, './dist/'+env+'/js/'),
			filename:"[name].bundle.js"
		},
		resolve:
		{
			alias:
			{
				Modules: path.resolve(__dirname, 'modules/'),
				Vendor: path.resolve(__dirname, '../../../vendor/'),
				jquery: "jquery/src/jquery"
			}
		},
		module:
		{
			rules: 
			[
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
								outputPath:'../fonts/',
								publicPath:site_path+'assets/templates/site/default/dist/'+env+'/fonts/'
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
			new CompressionPlugin({
				cache: true,
				deleteOriginalAssets:false
			})
		)
	}
	return config;
}