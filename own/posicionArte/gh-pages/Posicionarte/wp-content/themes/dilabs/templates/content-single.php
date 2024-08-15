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
    dilabs_setPostViews( get_the_ID() );
    ?>
    <div <?php post_class(); ?> >
        <div class="blog-item-box">
        <?php
            if( class_exists('ReduxFramework') ) {
                $dilabs_post_details_title_position = dilabs_opt('dilabs_post_details_title_position');
            } else {
                $dilabs_post_details_title_position = 'header';
            }

            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            // Blog Post Thumbnail
            do_action( 'dilabs_blog_post_thumb' );

            if( $dilabs_post_details_title_position != 'header' ) {
                echo '<h4 class="title">'.wp_kses( get_the_title(), $allowhtml ).'</h4>';
            }
            echo '<div class="info">';
                // Blog Post Meta
                do_action( 'dilabs_blog_post_meta' );

                if( get_the_content() ){
                    the_content();
                    // Link Pages
                    dilabs_link_pages();
                }
            echo '</div>';        
        echo '</div>';
    echo '</div>';
    /**
    *
    * Hook for Blog Details Author Bio
    *
    * Hook dilabs_blog_details_author_bio
    *
    * @Hooked dilabs_blog_details_author_bio_cb 10
    *
    */
    do_action( 'dilabs_blog_details_author_bio' );

    $dilabs_post_tag = get_the_tags();
    if( class_exists('ReduxFramework') ) {
        $dilabs_post_details_share_options = dilabs_opt('dilabs_post_details_share_options');
        $dilabs_show_post_tag = dilabs_opt( 'dilabs_display_post_tags' );
    } else {
        $dilabs_show_post_tag = true;
        $dilabs_post_details_share_options = false;
    }

    if( ! empty( $dilabs_post_tag ) && $dilabs_show_post_tag || $dilabs_post_details_share_options ){
        echo '<div class="post-tags share">';
            if( $dilabs_show_post_tag  && is_array( $dilabs_post_tag ) && ! empty( $dilabs_post_tag ) ){
                if( count( $dilabs_post_tag ) > 1 ){
                    $tag_text = __( 'Tags: ', 'dilabs' );
                }else{
                    $tag_text = __( 'Tag: ', 'dilabs' );
                }
                echo '<div class="tags">';
                    echo '<h4>'.esc_html( $tag_text ).'</h4>';
                    foreach( $dilabs_post_tag as $tags ){
                        echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a> ';
                    }
                echo '</div>';
            }
            /**
            *
            * Hook for Blog Social Share Options
            *
            * Hook dilabs_blog_details_share_options
            *
            * @Hooked dilabs_blog_details_share_options_cb 10
            *
            */
            do_action( 'dilabs_blog_details_share_options' );
            
        echo '</div>';
        
    }

    /**
    *
    * Hook for Blog Navigation
    *
    * Hook dilabs_blog_details_post_navigation
    *
    * @Hooked dilabs_blog_details_post_navigation_cb 10
    *
    */
    do_action( 'dilabs_blog_details_post_navigation' );

    /**
    *
    * Hook for Blog Details Comments
    *
    * Hook dilabs_blog_details_comments
    *
    * @Hooked dilabs_blog_details_comments_cb 10
    *
    */
    do_action( 'dilabs_blog_details_comments' );