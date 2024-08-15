<?php
/**
 * @Packge     : Dilabs
 * @Version    : 1.0
 * @Author     : Dilabs
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 * Template Name: Coming Soon Page
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $dilabscoming_soontitle     = dilabs_opt( 'dilabs_coming_soon_title' );
        $dilabscoming_soonsubtitle  = dilabs_opt( 'dilabs_coming_soon_subtitle' );
        $dilabscoming_soonbtntext   = dilabs_opt( 'dilabs_coming_soon_btn_text' );
    } else {
        $dilabscoming_soontitle     = __( 'Website Under Construction', 'dilabs' );
        $dilabscoming_soonsubtitle  = __( 'Website Under Construction. Work Is Going On For The Website Please Stay With Us.', 'dilabs' );
        $dilabscoming_soonbtntext   = __( 'Return To Home', 'dilabs' );
    }


    // get header
    get_header();

    echo '<section class="vs-error-wrapper space">';
        echo '<div class="container">';
            echo '<div class="error-content text-center">';
                if( ! empty( dilabs_opt( 'dilabs_coming_soon_image', 'url' ) ) ){
                    echo '<div class="error-img">';
                        echo dilabs_img_tag( array(
                            'url'   => esc_url( dilabs_opt( 'dilabs_coming_soon_image', 'url' ) ),
                        ) );
                    echo '</div>';
                }
                echo '<div class="row justify-content-center">';
                    echo '<div class="col-xl-9">';
                        if( ! empty( $dilabscoming_soontitle ) ){
                            echo '<h2 class="error-title">'.esc_html( $dilabscoming_soontitle ).'</h2>';
                        }
                        if( ! empty( $dilabscoming_soonsubtitle ) ){
                            echo '<p class="error-text px-xl-5">'.esc_html( $dilabscoming_soonsubtitle ).'</p>';
                        }
                        echo '<a href="'.esc_url( home_url('/') ).'" class="vs-btn mask-btn"><span class="btn-text">'.esc_html( $dilabscoming_soonbtntext ).'</span><span class="btn-text-mask">'.esc_html( $dilabscoming_soonbtntext ).'</span></a>';

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</section>';

    //footer
    get_footer();