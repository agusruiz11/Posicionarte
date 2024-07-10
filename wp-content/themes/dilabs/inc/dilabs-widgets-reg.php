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
    exit;
}

function dilabs_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $dilabs_sidebar_widget_title_heading_tag = dilabs_opt('dilabs_sidebar_widget_title_heading_tag');
    } else {
        $dilabs_sidebar_widget_title_heading_tag = 'h4';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'dilabs' ),
        'id'            => 'dilabs-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'dilabs' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<'.esc_attr($dilabs_sidebar_widget_title_heading_tag). ' class="title">',
        'after_title'   => '</'.esc_attr($dilabs_sidebar_widget_title_heading_tag).'>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'dilabs' ),
        'id'            => 'dilabs-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'dilabs' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ) );

    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 1', 'dilabs' ),
           'id'            => 'dilabs-footer-1',
           'before_widget' => '<div class="col-lg-3 col-md-6 footer-item mt-50"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 2', 'dilabs' ),
           'id'            => 'dilabs-footer-2',
           'before_widget' => '<div class="col-lg-3 col-md-6 mt-50 footer-item pl-50 pl-md-15 pl-xs-15"><div id="%1$s" class="f-item link footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 3', 'dilabs' ),
           'id'            => 'dilabs-footer-3',
           'before_widget' => '<div class="col-lg-3 col-md-6 footer-item  mt-50"><div id="%1$s" class=" footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 4', 'dilabs' ),
           'id'            => 'dilabs-footer-4',
           'before_widget' => '<div class="col-lg-3 col-md-6 footer-item mt-50"><div id="%1$s" class="f-item footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Offcanvas Item Widgets Area', 'dilabs' ),
           'id'            => 'dilabs-offcanvus-area',
           'before_widget' => '<div class="widget %2$s"><div id="%1$s" class="offcanvas-sidebar">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Service Widgets Area', 'dilabs' ),
           'id'            => 'dilabs-service-area',
           'before_widget' => '<div class="single-widget"><div id="%1$s" class="services-sidebar %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
    }

}

add_action( 'widgets_init', 'dilabs_widgets_init' );