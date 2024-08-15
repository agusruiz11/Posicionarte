<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : Dilabs
 * @version   : 1.0
 * @Author    : Dilabs
 * @Author URI: https://themeforest.net/user/validthemes/portfolio
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$dilabs_layout = dilabs_meta( 'custom_page_layout' );

if( $dilabs_layout == '1' ){
	echo '<div class="dilabs-main-wrapper">';
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}elseif( $dilabs_layout == '2' ){
    echo '<div class="dilabs-main-wrapper">';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}else{
	echo '<div class="dilabs-fluid">';
}
	echo '<div class="builder-page-wrapper">';
	// Query
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			the_content();
		}
        wp_reset_postdata();
	}

	echo '</div>';
if( $dilabs_layout == '1' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}elseif( $dilabs_layout == '2' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}else{
	echo '</div>';
}

//footer
get_footer();