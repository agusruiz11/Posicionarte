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

if ( ! is_active_sidebar( 'dilabs-blog-sidebar' ) ) {
    return;
}
?>

<div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
	<aside>
    <?php dynamic_sidebar( 'dilabs-blog-sidebar' ); ?>
</aside>
</div>