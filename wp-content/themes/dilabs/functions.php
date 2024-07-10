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
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/dilabs-constants.php';

//theme setup
require_once DILABS_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once DILABS_DIR_PATH_INC . 'essential-scripts.php';

//NavWalker
require_once DILABS_DIR_PATH_INC . 'dilabs-navwalker.php';

// plugin activation
require_once DILABS_DIR_PATH_FRAM . 'plugins-activation/dilabs-active-plugins.php';

// meta options
require_once DILABS_DIR_PATH_FRAM . 'dilabs-meta/dilabs-config.php';

// page breadcrumbs
require_once DILABS_DIR_PATH_INC . 'dilabs-breadcrumbs.php';

// sidebar register
require_once DILABS_DIR_PATH_INC . 'dilabs-widgets-reg.php';

//essential functions
require_once DILABS_DIR_PATH_INC . 'dilabs-functions.php';

// theme dynamic css
require_once DILABS_DIR_PATH_INC . 'dilabs-commoncss.php';

// helper function
require_once DILABS_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once DILABS_DEMO_DIR_PATH . 'demo-import.php';

// dilabs options
require_once DILABS_DIR_PATH_FRAM . 'dilabs-options/dilabs-options.php';

// hooks
require_once DILABS_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once DILABS_DIR_PATH_HOOKS . 'hooks-functions.php';

require_once DILABS_DIR_PATH_INC . '/woocommerce-hooks/woocommerce-hooks.php';

// woocommerce hooks
require_once DILABS_DIR_PATH_INC . '/woocommerce-hooks/woocommerce-hooks-functions.php';