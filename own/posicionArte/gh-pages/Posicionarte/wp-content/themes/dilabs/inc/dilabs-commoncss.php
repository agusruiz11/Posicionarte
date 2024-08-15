<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Dilabs
 * @Version    : 1.0
 * @Author     : Dilabs
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// enqueue css
function dilabs_common_custom_css(){
	wp_enqueue_style( 'dilabs-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = dilabs_opt( 'dilabs_css_editor' );
    $preloader_display  =  dilabs_opt('dilabs_display_preloader');
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $dilabs_header_bg =  get_header_image();
    }else{
        if( dilabs_meta( 'page_breadcrumb_settings' ) == 'page' && is_page() ){
            if( ! empty( dilabs_meta( 'breadcumb_image' ) ) ){
                $dilabs_header_bg = dilabs_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $dilabs_header_bg ) ){
        $customcss .= ".breadcrumb-area{
            background:url('{$dilabs_header_bg}')!important;
            background-position: center center !important;
            background-size: cover !important;
        }";
    }
    if( !empty( $preloader_display ) ){
        $dilabs_pre_img = dilabs_opt( 'dilabs_preloader_img','url' );
        if( ! empty( dilabs_opt( 'dilabs_preloader_img','url' ) ) ){
            $customcss .= "
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 999999;
                background: url('{$dilabs_pre_img}') center no-repeat #fff;
                text-align: center;
            }";
        }
    }
    
	// theme color
    $dilabsthemecolor = dilabs_opt('dilabs_theme_color');
	$dilabsthemecolor2 = dilabs_opt('dilabs_theme_color2');

    list($r, $g, $b) = sscanf( $dilabsthemecolor, "#%02x%02x%02x");
    list($r2, $g2, $b2) = sscanf( $dilabsthemecolor2, "#%02x%02x%02x");

    $dilabs_real_color = $r.','.$g.','.$b;
    $dilabs_real_color2 = $r2.','.$g2.','.$b2;


	if( !empty( $dilabsthemecolor ) ) {
		$customcss .= ":root {
		  --color-primary: rgb({$dilabs_real_color});
		}";
	}

    // theme color for home1 Gradient color
    if( !empty( $dilabsthemecolor && $dilabsthemecolor2) ) {
        $customcss .= ":root {
          --color-primary: rgb({$dilabs_real_color});
          --color-optional-secondary: rgb({$dilabs_real_color2});
        }";
    }

    // theme body font
    $dilabsthemebodyfont = dilabs_opt('dilabs_theme_body_typography', 'font-family');

    if( !empty( $dilabsthemebodyfont ) ) {
        $customcss .= ":root {
          --font-default: $dilabsthemebodyfont ;
        }";
    }

    // theme title font
    $dilabsthemetitlefont = dilabs_opt('dilabs_theme_title_typography', 'font-family');

    if( !empty( $dilabsthemetitlefont ) ) {
        $customcss .= ":root {
          --font-heading: $dilabsthemetitlefont ;
        }";
    }

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'dilabs-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'dilabs_common_custom_css', 100 );