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
    /**
    *
    * Hook for Footer Content
    *
    * Hook dilabs_footer_content
    *
    * @Hooked dilabs_footer_content_cb 10
    *
    */
    do_action( 'dilabs_footer_content' );


    wp_footer();
    ?>
</body>
</html>