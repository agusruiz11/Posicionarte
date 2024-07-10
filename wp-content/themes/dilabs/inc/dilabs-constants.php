<?php
/**
 * @Packge     : Dilabs
 * @Version    : 1.0
 * @Author     : Dilabs
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'DILABS_DIR_URI' ) ) {
    define('DILABS_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'DILABS_DIR_ASSIST_URI' ) ) {
    define( 'DILABS_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'DILABS_DIR_CSS_URI' ) ) {
    define( 'DILABS_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Skin Css File
if ( ! defined( 'DILABS_DIR_SKIN_CSS_URI' ) ) {
    define( 'DILABS_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/') );
}


// Js File URI
if (!defined('DILABS_DIR_JS_URI')) {
    define('DILABS_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('DILABS_DIR_PLUGIN_URI')) {
    define('DILABS_DIR_PLUGIN_URI', get_theme_file_uri( '/assets/plugins/'));
}

// Base Directory
if (!defined('DILABS_DIR_PATH')) {
    define('DILABS_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('DILABS_DIR_PATH_INC')) {
    define('DILABS_DIR_PATH_INC', DILABS_DIR_PATH . 'inc/');
}

//DILABS framework Folder Directory
if (!defined('DILABS_DIR_PATH_FRAM')) {
    define('DILABS_DIR_PATH_FRAM', DILABS_DIR_PATH_INC . 'dilabs-framework/');
}

//Classes Folder Directory
if (!defined('DILABS_DIR_PATH_CLASSES')) {
    define('DILABS_DIR_PATH_CLASSES', DILABS_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('DILABS_DIR_PATH_HOOKS')) {
    define('DILABS_DIR_PATH_HOOKS', DILABS_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'DILABS_DEMO_DIR_PATH' ) ){
    define( 'DILABS_DEMO_DIR_PATH', DILABS_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'DILABS_DEMO_DIR_URI' ) ){
    define( 'DILABS_DEMO_DIR_URI', DILABS_DIR_URI.'inc/demo-data/' );
}