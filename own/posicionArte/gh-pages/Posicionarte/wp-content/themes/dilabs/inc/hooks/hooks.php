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

	/**
	* Hook for preloader
	*/
	add_action( 'dilabs_preloader_wrap', 'dilabs_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'dilabs_main_wrapper_start', 'dilabs_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'dilabs_header', 'dilabs_header_cb', 10 );

	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'dilabs_blog_start_wrap', 'dilabs_blog_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'dilabs_blog_col_start_wrap', 'dilabs_blog_col_start_wrap_cb', 10 );

	/**
	* Hook for Service Column Start Wrapper
	*/
    add_action( 'dilabs_service_col_start_wrap', 'dilabs_service_col_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'dilabs_blog_col_end_wrap', 'dilabs_blog_col_end_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'dilabs_blog_end_wrap', 'dilabs_blog_end_wrap_cb', 10 );

	/**
	* Hook for Blog Pagination
	*/
    add_action( 'dilabs_blog_pagination', 'dilabs_blog_pagination_cb', 10 );

    /**
	* Hook for Blog Content
	*/
	add_action( 'dilabs_blog_content', 'dilabs_blog_content_cb', 10 );

    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'dilabs_blog_sidebar', 'dilabs_blog_sidebar_cb', 10 );


    /**
	* Hook for Service Sidebar
	*/
	add_action( 'dilabs_service_sidebar', 'dilabs_service_sidebar_cb', 10 );

    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'dilabs_blog_details_sidebar', 'dilabs_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'dilabs_blog_details_wrapper_start', 'dilabs_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'dilabs_blog_post_meta', 'dilabs_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'dilabs_blog_details_share_options', 'dilabs_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'dilabs_blog_details_author_bio', 'dilabs_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'dilabs_blog_details_tags_and_categories', 'dilabs_blog_details_tags_and_categories_cb', 10 );
	add_action( 'dilabs_blog_details_post_navigation', 'dilabs_blog_details_post_navigation_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'dilabs_blog_details_comments', 'dilabs_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('dilabs_blog_details_col_start','dilabs_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('dilabs_blog_details_col_end','dilabs_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('dilabs_blog_details_wrapper_end','dilabs_blog_details_wrapper_end_cb');

	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('dilabs_blog_post_thumb','dilabs_blog_post_thumb_cb');

	/**
	* Hook for Blog Post Content
	*/
	add_action('dilabs_blog_post_content','dilabs_blog_post_content_cb');


	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('dilabs_blog_postexcerpt_read_content','dilabs_blog_postexcerpt_read_content_cb');

	/**
	* Hook for footer content
	*/
	add_action( 'dilabs_footer_content', 'dilabs_footer_content_cb', 10 );

	/**
	* Hook for main wrapper end
	*/
	add_action( 'dilabs_main_wrapper_end', 'dilabs_main_wrapper_end_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'dilabs_page_start_wrap', 'dilabs_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'dilabs_page_end_wrap', 'dilabs_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'dilabs_page_col_start_wrap', 'dilabs_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'dilabs_page_col_end_wrap', 'dilabs_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'dilabs_page_sidebar', 'dilabs_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'dilabs_page_content', 'dilabs_page_content_cb', 10 );