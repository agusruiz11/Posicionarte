<?php

// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
   exit();
}

/**
 * Plugin Name: Dilabs Core
 * Description: This is a helper plugin of dilabs theme
 * Version:     1.0
 * Author:      Validthemes
 * Author URI:  https://themeforest.net/user/validthemes/portfolio
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: dilabs
 */

// Define Constant
define( 'DILABS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'DILABS_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'DILABS_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );
define( 'DILABS_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );
define( 'DILABS_PLUGDIRURI', plugin_dir_url( __FILE__ ) );
define( 'DILABS_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );
define( 'DILABS_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'dilabs-template/' );

// load textdomain
load_plugin_textdomain( 'dilabs', false, basename( dirname( __FILE__ ) ) . '/languages' );

//include file.
require_once DILABS_PLUGIN_INC_PATH .'dilabscore-functions.php';
require_once DILABS_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once DILABS_PLUGIN_INC_PATH .'dilabsajax.php';
require_once DILABS_PLUGIN_INC_PATH .'builder/builder.php';

require_once DILABS_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';

//Widget
require_once DILABS_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
// require_once DILABS_PLUGIN_WIDGET_PATH . 'gallery-widget.php';
require_once DILABS_PLUGIN_WIDGET_PATH . 'dilabs-about-widget.php';
require_once DILABS_PLUGIN_WIDGET_PATH . 'dilabs-contact-widget.php';
require_once DILABS_PLUGIN_WIDGET_PATH . 'dilabs-contact-info.php';
require_once DILABS_PLUGIN_WIDGET_PATH . 'dilabs-download-button-widget.php';
require_once DILABS_PLUGIN_WIDGET_PATH . 'dilabs-cta-widget.php';
require_once DILABS_PLUGIN_WIDGET_PATH . 'dilabs-service-cta.php';

//addons
require_once DILABS_ADDONS . 'addons.php';

// Register widget styles
add_action( 'elementor/editor/before_enqueue_styles', 'widget_styles' );


function widget_styles() {

    wp_register_style( 'editor-style-1', plugins_url( 'assets/css/editor.css', __FILE__ ) );
    wp_enqueue_style( 'editor-style-1' );

}