<?php
/**
 * @Packge     : Dilabs
 * @Version    : 1.0
 * @Author     : Dilabs
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $dilabs_post_id = get_the_ID();

            // Get the page settings manager
            $dilabs_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $dilabs_page_settings_model = $dilabs_page_settings_manager->get_model( $dilabs_post_id );

            // Retrieve the color we added before
            $dilabs_header_style = $dilabs_page_settings_model->get_settings( 'dilabs_header_style' );
            $dilabs_header_builder_option = $dilabs_page_settings_model->get_settings( 'dilabs_header_builder_option' );

            if( $dilabs_header_style == 'header_builder'  ) {

                if( !empty( $dilabs_header_builder_option ) ) {
                    $dilabsheader = get_post( $dilabs_header_builder_option );
                    echo '<header>';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $dilabsheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $dilabs_header_builder_trigger = dilabs_opt('dilabs_header_options');
                if( $dilabs_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $dilabs_global_header_select = get_post( dilabs_opt( 'dilabs_header_select_options' ) );
                    $header_post = get_post( $dilabs_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    dilabs_global_header_option();
                }
            }
        } else {
            $dilabs_header_options = dilabs_opt('dilabs_header_options');
            if( $dilabs_header_options == '1' ) {
                dilabs_global_header_option();
            } else {
                $dilabs_header_select_options = dilabs_opt('dilabs_header_select_options');
                $dilabsheader = get_post( $dilabs_header_select_options );
                echo '<header>';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $dilabsheader->ID );
                echo '</header>';
            }
        }
    } else {
        dilabs_global_header_option();
    }