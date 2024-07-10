<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : dilabs
 * @version   : 1.0
 * @Author    : Dilabs
 * @Author URI: https://themeforest.net/user/validthemes/portfolio
 */

// demo import file
function dilabs_import_files() {

	$demoImg = '<img src="'. DILABS_DEMO_DIR_URI  .'screen-image.jpg" alt="'.esc_attr__('Demo Preview Imgae','dilabs').'" />';

    return array(
        array(
            'import_file_name'             => esc_html__('Dilabs Demo','dilabs'),
            'local_import_file'            =>  DILABS_DEMO_DIR_PATH  . 'dilabs-demo.xml',
            'local_import_widget_file'     =>  DILABS_DEMO_DIR_PATH  . 'dilabs-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  DILABS_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'dilabs_opt',
                ),
            ),
            'import_notice' => $demoImg,
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'dilabs_import_files' );

// demo import setup
function dilabs_after_import_setup() {
	// Assign menus to their locations.
	$main_menu   = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'   	=> $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Creative Agency' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'dilabs_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function dilabs_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Dilabs Demo Import' , 'dilabs' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'dilabs' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'dilabs-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'dilabs_import_plugin_page_setup' );

// Enqueue scripts
function dilabs_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'dilabs-demo-import' ){
		// style
		wp_enqueue_style( 'dilabs-demo-import', DILABS_DEMO_DIR_URI.'css/dilabs.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'dilabs_demo_import_custom_scripts' );