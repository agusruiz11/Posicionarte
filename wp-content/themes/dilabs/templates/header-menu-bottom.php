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

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( dilabs_meta('page_breadcrumb_area') ) ) {
            $dilabs_page_breadcrumb_area  = dilabs_meta('page_breadcrumb_area');
        } else {
            $dilabs_page_breadcrumb_area = '1';
        }
    }else{
        $dilabs_page_breadcrumb_area = '1';
    }

    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );

    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $dilabs_page_breadcrumb_area == '1' ) {
            if( class_exists( 'ReduxFramework' )  ){
                $class = '';
            }else{
                $class = 'thumb-less';
            }
            echo '<!-- Page title -->';
            echo '<div class="breadcrumb-area custom-breadcrumb bg-gray bg-cover '.esc_attr($class).'">';
                echo '<div class="container">';
                    echo '<div class="breadcrumb-item">';
                        if( ! empty( dilabs_opt( 'breadcrumb_shape','url' ) ) ){
                            echo '<div class="breadcrum-shape">';
                                echo dilabs_img_tag( array(
                                    'url'   => esc_url( dilabs_opt( 'breadcrumb_shape','url' ) ),
                                ) );
                            echo '</div>';
                        }
                        echo '<div class="row">';
                            echo '<div class="col-lg-8 ">';
                                
                                if( class_exists('ReduxFramework') ) {
                                    $dilabs_breadcrumb_switcher = dilabs_opt( 'dilabs_enable_breadcrumb' );
                                } else {
                                    $dilabs_breadcrumb_switcher = '1';
                                }
                                if( $dilabs_breadcrumb_switcher == '1' ) {
                                    dilabs_breadcrumbs(
                                        array(
                                            'breadcrumbs_classes' => 'nav',
                                        )
                                    );
                                }
                                if( class_exists( 'ReduxFramework' )  ){
                                    $dilabs_page_title_switcher  = dilabs_opt('dilabs_page_title_switcher');
                                }else{
                                    $dilabs_page_title_switcher = '1';
                                }

                                if( $dilabs_page_title_switcher ){
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $dilabs_page_title_tag    = dilabs_opt('dilabs_page_title_tag');
                                    }else{
                                        $dilabs_page_title_tag    = 'h1';
                                    }
                                    if ( is_archive() ){
                                        echo dilabs_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }elseif ( is_home() ){
                                        $dilabs_blog_page_title_setting = dilabs_opt('dilabs_blog_page_title_setting');
                                        $dilabs_blog_page_title_switcher = dilabs_opt('dilabs_blog_page_title_switcher');
                                        $dilabs_blog_page_custom_title = dilabs_opt('dilabs_blog_page_custom_title');
                                        if( class_exists('ReduxFramework') ){
                                            if( $dilabs_blog_page_title_switcher ){
                                                echo dilabs_heading_tag(
                                                    array(
                                                        "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                        "text"  => !empty( $dilabs_blog_page_custom_title ) && $dilabs_blog_page_title_setting == 'custom' ? esc_html( $dilabs_blog_page_custom_title) : esc_html__( 'Blog', 'dilabs' ),
                                                        'class' => 'breadcumb-title'
                                                    )
                                                );
                                            }
                                        }else{
                                            echo dilabs_heading_tag(
                                                array(
                                                    "tag"   => "h1",
                                                    "text"  => esc_html__( 'Blog', 'dilabs' ),
                                                    'class' => 'breadcumb-title',
                                                )
                                            );
                                        }
                                    }elseif( is_search() ){
                                        echo dilabs_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                "text"  => esc_html__( 'Search Result', 'dilabs' ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }elseif( is_404() ){
                                        echo dilabs_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                "text"  => esc_html__( '404 PAGE', 'dilabs' ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }else{
                                        $posttitle_position  = dilabs_opt('dilabs_post_details_title_position');
                                        $postTitlePos = false;
                                        if( is_single() ){
                                            if( class_exists( 'ReduxFramework' ) ){
                                                if( $posttitle_position && $posttitle_position != 'header' ){
                                                    $postTitlePos = true;
                                                }
                                            }else{
                                                $postTitlePos = false;
                                            }
                                        }
                                        if( $postTitlePos != true ){
                                            echo dilabs_heading_tag(
                                                array(
                                                    "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                    "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                                    'class' => 'breadcumb-title'
                                                )
                                            );
                                        } else {
                                            if( class_exists( 'ReduxFramework' ) ){
                                                $dilabs_post_details_custom_title  = dilabs_opt('dilabs_post_details_custom_title');
                                            }else{
                                                $dilabs_post_details_custom_title = __( 'Blog Details','dilabs' );
                                            }

                                            if( !empty( $dilabs_post_details_custom_title ) ) {
                                                echo dilabs_heading_tag(
                                                    array(
                                                        "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                        "text"  => wp_kses( $dilabs_post_details_custom_title, $allowhtml ),
                                                        'class' => 'breadcumb-title'
                                                    )
                                                );
                                            }
                                        }
                                    }
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
        }
    } else {
        if( class_exists( 'ReduxFramework' )  ){
            $class = '';
        }else{
            $class = 'thumb-less';
        }
        echo '<!-- Page title -->';
        echo '<div class="breadcrumb-area bg-gray bg-cover '.esc_attr($class).'">';
            echo '<div class="container">';
                echo '<div class="breadcrumb-item">';
                    echo '<div class="breadcrum-shape">';
                        echo '<img src="'.DILABS_DIR_URI.'assets/img/16.png" alt="'.esc_attr__('shape', 'dilabs').'">';
                    echo '</div>';
                    echo '<div class="row">';
                        echo '<div class="col-lg-8 ">';
                            
                            if( class_exists('ReduxFramework') ) {
                                $dilabs_breadcrumb_switcher = dilabs_opt( 'dilabs_enable_breadcrumb' );
                            } else {
                                $dilabs_breadcrumb_switcher = '1';
                            }
                            if( $dilabs_breadcrumb_switcher == '1' ) {
                                dilabs_breadcrumbs(
                                    array(
                                        'breadcrumbs_classes' => 'nav',
                                    )
                                );
                            }
                            if( class_exists( 'ReduxFramework' )  ){
                                $dilabs_page_title_switcher  = dilabs_opt('dilabs_page_title_switcher');
                            }else{
                                $dilabs_page_title_switcher = '1';
                            }

                            if( $dilabs_page_title_switcher ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $dilabs_page_title_tag    = dilabs_opt('dilabs_page_title_tag');
                                }else{
                                    $dilabs_page_title_tag    = 'h1';
                                }
                                if ( is_archive() ){
                                    echo dilabs_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $dilabs_page_title_tag ),
                                            "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }elseif ( is_home() ){
                                    $dilabs_blog_page_title_setting = dilabs_opt('dilabs_blog_page_title_setting');
                                    $dilabs_blog_page_title_switcher = dilabs_opt('dilabs_blog_page_title_switcher');
                                    $dilabs_blog_page_custom_title = dilabs_opt('dilabs_blog_page_custom_title');
                                    if( class_exists('ReduxFramework') ){
                                        if( $dilabs_blog_page_title_switcher ){
                                            echo dilabs_heading_tag(
                                                array(
                                                    "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                    "text"  => !empty( $dilabs_blog_page_custom_title ) && $dilabs_blog_page_title_setting == 'custom' ? esc_html( $dilabs_blog_page_custom_title) : esc_html__( 'Blog', 'dilabs' ),
                                                    'class' => 'breadcumb-title'
                                                )
                                            );
                                        }
                                    }else{
                                        echo dilabs_heading_tag(
                                            array(
                                                "tag"   => "h1",
                                                "text"  => esc_html__( 'Blog', 'dilabs' ),
                                                'class' => 'breadcumb-title',
                                            )
                                        );
                                    }
                                }elseif( is_search() ){
                                    echo dilabs_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $dilabs_page_title_tag ),
                                            "text"  => esc_html__( 'Search Result', 'dilabs' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }elseif( is_404() ){
                                    echo dilabs_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $dilabs_page_title_tag ),
                                            "text"  => esc_html__( '404 PAGE', 'dilabs' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }else{
                                    $posttitle_position  = dilabs_opt('dilabs_post_details_title_position');
                                    $postTitlePos = false;
                                    if( is_single() ){
                                        if( class_exists( 'ReduxFramework' ) ){
                                            if( $posttitle_position && $posttitle_position != 'header' ){
                                                $postTitlePos = true;
                                            }
                                        }else{
                                            $postTitlePos = false;
                                        }
                                    }
                                    if( $postTitlePos != true ){
                                        echo dilabs_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    } else {
                                        if( class_exists( 'ReduxFramework' ) ){
                                            $dilabs_post_details_custom_title  = dilabs_opt('dilabs_post_details_custom_title');
                                        }else{
                                            $dilabs_post_details_custom_title = __( 'Blog Details','dilabs' );
                                        }

                                        if( !empty( $dilabs_post_details_custom_title ) ) {
                                            echo dilabs_heading_tag(
                                                array(
                                                    "tag"   => esc_attr( $dilabs_page_title_tag ),
                                                    "text"  => wp_kses( $dilabs_post_details_custom_title, $allowhtml ),
                                                    'class' => 'breadcumb-title'
                                                )
                                            );
                                        }
                                    }
                                }
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }