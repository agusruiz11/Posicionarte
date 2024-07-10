<?php
/**
 * @Packge     : Dilabs
 * @Version    : 1.0
 * @Author     : Dilabs
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $dilabs404title        = dilabs_opt( 'dilabs_fof_title' );
        $dilabs404subtitle     = dilabs_opt( 'dilabs_fof_subtitle' );
        $dilabs404description  = dilabs_opt( 'dilabs_fof_description' );
        $dilabs404btntext      = dilabs_opt( 'dilabs_fof_btn_text' );
        $bg_img                = dilabs_opt( 'dilabs_404_bg','url' );
        $dilabs_404_left_bg    = dilabs_opt( 'dilabs_404_left_bg','url' );
        $dilabs_404_right_bg   = dilabs_opt( 'dilabs_404_right_bg','url' );

    } else {
        $dilabs404title        = __( '404', 'dilabs' );
        $dilabs404subtitle     = __( 'Oops! That page can’t be found', 'dilabs' );
        $dilabs404description  = __( 'Sorry, but the page you are looking for does not existing', 'dilabs' );
        $dilabs404btntext      = __( ' Back To Home', 'dilabs');    
        $bg_img                = ''.DILABS_DIR_ASSIST_URI.'img/banner-3.jpg';
        $dilabs_404_left_bg    = ''.DILABS_DIR_ASSIST_URI.'img/44-left.png';    
        $dilabs_404_right_bg   = ''.DILABS_DIR_ASSIST_URI.'img/44-right.png';   
    }


    // get header
    get_header();

    echo '<div class="error-page-area default-padding text-center bg-cover" style="background-image: url('.esc_url( $bg_img ).');">';
        echo '<!-- Shape -->';
        echo '<div class="shape-left" style="background: url('.esc_url( $dilabs_404_left_bg ).');"></div>';
        echo '<div class="shape-right" style="background: url('.esc_url( $dilabs_404_right_bg ).');"></div>';
        echo '<!-- End Shape -->';
        echo '<div class="container">';
            echo '<div class="error-box">';
                echo '<div class="row">';
                    echo '<div class="col-lg-8 offset-lg-2">';
                        echo '<h1>'.esc_html( $dilabs404title ).'</h1>';
                        echo '<h2>'.esc_html( $dilabs404subtitle ).'</h2>';
                        echo '<p>'.esc_html( $dilabs404description ).'</p>';
                        echo '<a class="btn mt-20 btn-md btn-theme" href="'.esc_url( home_url('/') ).'">'.esc_html( $dilabs404btntext ).'</a>';
                    echo '</div>';
                echo '</div>';
           echo ' </div>';
        echo '</div>';
    echo '</div>';

    //footer
    get_footer();