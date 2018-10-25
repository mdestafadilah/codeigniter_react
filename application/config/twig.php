<?php
/**
 * CI Twig Template Engine
 *
 * Twig templating for Codeigniter with support for
 * Modular Extensions HMVC
 *
 * @package   CI Twig
 * @author    Agung Dirgantara
 * @copyright 2017 Agung Dirgantara
 * @link      https://www.agungdirgantara.id
 * @version   0.1
*/

$config['twig.extension']       = ".html";
$config['twig.locations']       = 
[
    APPPATH . "views/"  =>  "../views/",
    FCPATH . "views/"   =>  "../../views/"
];
$config['twig.functions']   = 
[
    // URL Helper
    'site_url',
    'base_url',
    'current_url',
    'uri_string',
    'index_page',
    'anchor',
    'anchor_popup',
    'mailto',
    'safe_mailto',
    'auto_link',
    'url_title',
    'redirect',
    'prep_url',

    // String Helper
    'random_string',
    'increment_string',
    'alternator',
    'repeater',
    'reduce_double_slashes',
    'strip_slashes',
    'trim_slashes',
    'reduce_multiples',
    'quotes_to_entities',
    'strip_quotes',

    // Text Helper
    'word_limiter',
    'character_limiter',
    'ascii_to_entities',
    'convert_accented_characters',
    'word_censor',
    'highlight_code',
    'highlight_phrase',
    'word_wrap',
    'ellipsize',

    // Date Helper
    'now',
    'mdate',
    'standard_date',
    'local_to_gmt',
    'gmt_to_local',
    'mysql_to_unix',
    'unix_to_human',
    'human_to_unix',
    'nice_date',
    'timespan',
    'days_in_month',
    'date_range',
    'timezones',

    // Security Helper
    'xss_clean',
    'sanitize_filename',
    'do_hash',
    'strip_image_tags',
    'encode_php_tags',

    // Inflector Helper
    'singular',
    'plural',
    'camelize',
    'underscore',
    'humanize',
    'is_countable',

    // Language Helper
    'lang',

    '_function'
];
$config['twig.filters'] = array();
$config['twig.environment'] = 
[
    "cache_location"    => APPPATH . "cache/twig/",
    "cache_status"      => FALSE,
    "auto_reload"       => NULL,
    "debug_mode"        => FALSE,
    "autoescape"        => FALSE,
    "optimizations"     => -1
];
