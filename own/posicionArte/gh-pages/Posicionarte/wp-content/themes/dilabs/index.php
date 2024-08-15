<?php
/**
 * @Packge     : Dilabs
 * @Version    : 1.0
 * @Author     : Dilabs
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}   
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook dilabs_blog_start_wrap
    *
    * @Hooked dilabs_blog_start_wrap_cb 10
    *  
    */
    do_action( 'dilabs_blog_start_wrap' );
    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook dilabs_blog_col_start_wrap
    *
    * @Hooked dilabs_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'dilabs_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook dilabs_blog_content
    *
    * @Hooked dilabs_blog_content_cb 10
    *  
    */
    do_action( 'dilabs_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook dilabs_blog_pagination
    *
    * @Hooked dilabs_blog_pagination_cb 10
    *  
    */
    do_action( 'dilabs_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook dilabs_blog_col_end_wrap
    *
    * @Hooked dilabs_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'dilabs_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook dilabs_blog_sidebar
    *
    * @Hooked dilabs_blog_sidebar_cb 10
    *  
    */
    do_action( 'dilabs_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook dilabs_blog_end_wrap
    *
    * @Hooked dilabs_blog_end_wrap_cb 10
    *  
    */
    do_action( 'dilabs_blog_end_wrap' );

    //footer
    get_footer();