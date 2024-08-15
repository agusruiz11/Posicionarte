<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Dilabs
	* @Version     : 1.0
	* @Author     : Dilabs
    * @Author URI : https://themeforest.net/user/validthemes/portfolio
	*
	*/

	if( ! is_active_sidebar( 'dilabs-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-lg-4 col-xl-3">
	<!-- Sidebar Begin -->
	<aside class="sidebar mt-5 mt-lg-0">
		<?php
			dynamic_sidebar( 'dilabs-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>