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
    exit;
}

 // theme option callback
function dilabs_opt( $id = null, $url = null ){
    global $dilabs_opt;

    if( $id && $url ){

        if( isset( $dilabs_opt[$id][$url] ) && $dilabs_opt[$id][$url] ){
            return $dilabs_opt[$id][$url];
        }
    }else{
        if( isset( $dilabs_opt[$id] )  && $dilabs_opt[$id] ){
            return $dilabs_opt[$id];
        }
    }
}


// theme logo withour moble device

function dilabs_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="navbar-brand" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= dilabs_img_tag( array(
            "class" => "logo",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !dilabs_opt('dilabs_text_title') && dilabs_opt('dilabs_site_logo', 'url' )  ){
        $siteLogo = '<img class="logo" src="'.esc_url( dilabs_opt('dilabs_site_logo', 'url' ) ).'" alt="'.esc_attr( get_bloginfo('name') ).'" />';
        return '<a class="navbar-brand" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';
    }elseif( dilabs_opt('dilabs_text_title') ){
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( dilabs_opt('dilabs_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// theme logo for mobile device
function dilabs_mobile_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= dilabs_img_tag( array(
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );

        return $siteLogo;
    } elseif( !dilabs_opt('dilabs_text_title') && dilabs_opt('dilabs_site_logo', 'url' )  ){

        $siteLogo = '<img class="logo" src="'.esc_url( dilabs_opt('dilabs_site_logo', 'url' ) ).'" alt="'.esc_attr( get_bloginfo('name') ).'" />';
        return '<a class="mob-logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';
    }elseif( dilabs_opt('dilabs_text_title') ){
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( dilabs_opt('dilabs_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}
// custom meta id callback
function dilabs_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_dilabs_'.$id, true );
    return $value;
}


// Blog Date Permalink
function dilabs_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function dilabs_iframe_match() {
    $audio_content = dilabs_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function dilabs_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function dilabs_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dilabs' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'dilabs' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

// image alt tag
function dilabs_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function dilabs_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function dilabs_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'dilabs_pingback_header' );


// Excerpt More
function dilabs_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'dilabs_excerpt_more' );


// dilabs comment template callback
function dilabs_comment_callback( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment; ?>

    <div class="comment-item" id="comment-<?php comment_ID(); ?>"> 
        <?php if ( $avarta = get_avatar( $comment ) ) :
            printf( '<div class="avatar">%1$s</div>', $avarta );
        endif; ?>
        <div class='content'>
            <div class="title">
                <?php 
                    if ( $comment->user_id != '0' ) {
                        printf( '<h5>%1$s</h5>', get_user_meta( $comment->user_id, 'nickname', true ) );
                    } else {
                        printf( '<h5>%1$s</h5>', get_comment_author_link() );
                    }
                ?>
                <span><?php echo get_comment_date( 'j M Y' ); ?></span>
                <span><?php $edit_reply_text = esc_html__( 'Edit', 'dilabs' ); edit_comment_link( '<i class="fal fa-pencil"></i>'.$edit_reply_text, '  ', '' ); ?></span>
            </div>    
           
            <?php comment_text() ?>
            <div class='comments-info'>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'dilabs' ); ?></span>
                <?php endif; ?>
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text' => '<i class="fa fa-reply"></i>Reply' ) ) ) ?>
            </div>
            
        </div>
    </div>
<?php
}

//body class
add_filter( 'body_class', 'dilabs_body_class' );
function dilabs_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $dilabs_blog_single_sidebar = dilabs_opt('dilabs_blog_single_sidebar');


        if(is_active_sidebar('dilabs-blog-sidebar')){
            if($dilabs_blog_single_sidebar == '2'){
                $classes[] = 'left-sidebar';
            }elseif($dilabs_blog_single_sidebar == '3'){
                $classes[] = 'right-sidebar';
            }else{
                $classes[] = 'blog-standard';
            }
        }else{
           $classes[] = 'blog-standard'; 
        }

        $new_class = is_page() ? dilabs_meta('custom_body_class') : null;

        if ( $new_class ) {
            $classes[] = $new_class;
        }

    } else {
        if( !is_active_sidebar('dilabs-blog-sidebar') ) {
            $classes[] = 'blog-standard';
        }else{
            $classes[] = 'right-sidebar';
        }
    }
    return $classes;
}


function dilabs_footer_global_option(){

    // Dilabs Footer Bottom Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $dilabs_footer_bottom_active = dilabs_opt( 'dilabs_disable_footer_bottom' );
        $dilabs_footerwidget_enable = dilabs_opt( 'dilabs_footerwidget_enable' );
    }else{
        $dilabs_footer_bottom_active = '1';
        $dilabs_footerwidget_enable = '1';
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
    );       
    echo '<footer class="bg-dark text-light footer-custom-style">';
        echo '<div class="container">';
            if( $dilabs_footerwidget_enable == '1' ){
                if( ( is_active_sidebar( 'dilabs-footer-1' ) || is_active_sidebar( 'dilabs-footer-2' ) || is_active_sidebar( 'dilabs-footer-3' ) || is_active_sidebar( 'dilabs-footer-4' ) )) {
                    
                    echo '<div class="f-items default-padding-bottom pt-70 pt-xs-0">';
                        echo '<div class="row">';
                        if( is_active_sidebar( 'dilabs-footer-1' )){
                           dynamic_sidebar( 'dilabs-footer-1' ); 
                        }
                        if( is_active_sidebar( 'dilabs-footer-2' )){
                           dynamic_sidebar( 'dilabs-footer-2' ); 
                        }
                        if( is_active_sidebar( 'dilabs-footer-3' )){
                           dynamic_sidebar( 'dilabs-footer-3' ); 
                        } 
                        if( is_active_sidebar( 'dilabs-footer-4' )){
                           dynamic_sidebar( 'dilabs-footer-4' ); 
                        }  
                        echo '</div>';
                    echo '</div>';
                }
            }
        echo '</div>';
        if( $dilabs_footer_bottom_active == '1' ){
            if( ! empty( dilabs_opt( 'dilabs_copyright_text' ) ) ){
                echo '<!-- Start Footer Bottom -->';
                echo '<div class="footer-bottom bg-dark text-light text-center">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-lg-12">';
                                echo '<p>'.wp_kses( dilabs_opt( 'dilabs_copyright_text' ), $allowhtml ).'</p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
    echo '</footer>';
}

function dilabs_social_icon(){
    $dilabs_social_icon = dilabs_opt( 'dilabs_social_links' );
    if( ! empty( $dilabs_social_icon ) && isset( $dilabs_social_icon ) ){
        foreach( $dilabs_social_icon as $social_icon ){
            if( ! empty( $social_icon['title'] ) ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i>'.esc_html( $social_icon['description'] ).'</a>';
            }
        }
    }
}

// global header
function dilabs_global_header_option() {

    echo '<header>';
        if( class_exists( 'ReduxFramework' ) ){
            $dilabs_info_slogan   = dilabs_opt( 'dilabs_info_slogan' );
            $dilabs_email         = dilabs_opt( 'dilabs_email' );
        }else{
            $dilabs_info_slogan   = '';
            $dilabs_email         = '';
        }
        echo '<!-- Start Navigation -->';
        echo '<nav class="navbar navbar-common mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">';

            echo '<div class="container d-flex justify-content-between align-items-center">            ';
                

                echo '<!-- Start Header Navigation -->';
                echo '<div class="navbar-header">';
                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">';
                        echo '<i class="fa fa-bars"></i>';
                    echo '</button>';
                    echo dilabs_theme_logo();
                echo '</div>';
                echo '<!-- End Header Navigation -->';

                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
                echo '<div class="collapse navbar-collapse" id="navbar-menu">';

                    echo dilabs_mobile_theme_logo();
                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">';
                        echo '<i class="fa fa-times"></i>';
                    echo '</button>';
                    if( has_nav_menu('primary-menu') ) {
                        wp_nav_menu( array(
                            'theme_location'  => 'primary-menu',
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-center',
                            'fallback_cb'     => 'Dilabs_Bootstrap_Navwalker::fallback',
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>',
                            'walker'          => new Dilabs_Bootstrap_Navwalker(),
                        ) );
                    }
                echo '</div><!-- /.navbar-collapse -->';
                if($dilabs_info_slogan){

                    $email          = $dilabs_email;

                    $email          = is_email( $email );

                    $replace        = array(' ','-',' - ');
                    $with           = array('','','');

                    $emailurl       = str_replace( $replace, $with, $email );
                    echo '<div class="attr-right">';
                        echo '<!-- Start Atribute Navigation -->'; ?>
                        <div class="attr-nav">
                            <ul>
                                    <?php if( class_exists('woocommerce') ) { ?>
                                        <li class="wishlist">
                                            <?php
                                                if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
                                                    echo do_shortcode( '[ti_wishlist_products_counter]' );
                                                }
                                            ?>
                                        </li>
                                    
                                    
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <div class="basket-item-count">
                                                    <span class="cart-items-count"> 
                                                        <?php
                                                            if (is_admin()) return false;
                                                            WC()->cart->get_cart_contents_count(); 
                                                        ?>
                                                    </span>
                                                </div>
                                            </a>
                                            <!-- End Atribute Navigation -->
                                            <div class="widget_shopping_cart_content">
                                                <?php 
                                                    if (is_admin()) return false;
                                                    echo woocommerce_mini_cart();
                                                ?>
                                            </div>
                                        </li>
                                    <?php } ?>
                                
                            </ul>
                        </div> 
                        <?php
                        echo '<!-- End Atribute Navigation -->';

                    echo '</div>';
                }
                echo '<!-- Main Nav -->';

            echo '</div>  ';
            echo '<!-- Overlay screen for menu -->';
            echo '<div class="overlay-screen"></div>';
            echo '<!-- End Overlay screen for menu --> ';
        echo '</nav>';
        echo '<!-- End Navigation -->';
    echo '</header>';
}

add_filter( 'woocommerce_add_to_cart_fragments', 'cart_count_fragments', 10, 1 );

function cart_count_fragments( $fragments ) {
    $fragments['div.basket-item-count'] = '<div class="basket-item-count"><i class="fal fa-shopping-cart"></i><span class="cart-items-count badge">' . WC()->cart->get_cart_contents_count() . '</span></div>';
    return $fragments;
}

//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'dilabs_remove_tagcloud_inline_style',10,1 );
function dilabs_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

function dilabs_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function dilabs_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'dilabs' );
    }
    return $count;
}

// password protected form
add_filter('the_password_form','dilabs_password_form',10,1);
function dilabs_password_form( $output ) {
    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post"><div class="theme-input-group">
        <input name="post_password" type="password" class="theme-input-style" placeholder="'.esc_attr__( 'Enter Password','dilabs' ).'">
        <button type="submit" class="submit-btn btn-fill">'.esc_html__( 'Enter','dilabs' ).'</button></div></form>';
    return $output;
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'dilabs_cat_count_span' );
function dilabs_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'dilabs_archive_count_span' );
function dilabs_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
	return $links;
}


if( ! function_exists( 'dilabs_blog_category' ) ){
    function dilabs_blog_category(){
        if( class_exists( 'ReduxFramework' ) ){
            $dilabs_display_post_category =  dilabs_opt('dilabs_display_post_category');
        }else{
            $dilabs_display_post_category = '1';
        }

        if( $dilabs_display_post_category ){
            $dilabs_post_categories = get_the_category();
            if( is_array( $dilabs_post_categories ) && ! empty( $dilabs_post_categories ) ){
                if( dilabs_opt( 'dilabs_blog_style' ) == '2' ){
                    $padding_class = 'mb-20';
                }else{
                    $padding_class = '';
                }
                echo '<div class="blog-category '.esc_attr( $padding_class ).'">';
                    echo ' <a href="'.esc_url( get_term_link( $dilabs_post_categories[0]->term_id ) ).'">'.esc_html( $dilabs_post_categories[0]->name ).'</a> ';
                echo '</div>';
            }
        }
    }
}

// Add Extra Class On Comment Reply Button
function dilabs_custom_comment_reply_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'dilabs_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function dilabs_custom_edit_comment_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'dilabs_custom_edit_comment_link', 99);


function dilabs_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        if( ! is_single() ){
            if( dilabs_opt( 'dilabs_blog_style' ) == '3' ){
                $classes[] = "item grid-wide";
            }else{
                $classes[] = "item-inner";
            }
        }else{
            $classes[] = "item";
        }
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }

    return $classes;
}
add_filter( 'post_class', 'dilabs_post_classes', 10, 3 );