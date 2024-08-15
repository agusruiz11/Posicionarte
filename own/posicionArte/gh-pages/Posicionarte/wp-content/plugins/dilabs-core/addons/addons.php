<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Dilabs Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Dilabs_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}


	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

        // Register widget scripts
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);

        // category register
		add_action( 'elementor/elements/categories_registered',[ $this, 'dilabs_elementor_widget_categories' ] );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'dilabs' ),
			'<strong>' . esc_html__( 'Dilabs Core', 'dilabs' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'dilabs' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'dilabs' ),
			'<strong>' . esc_html__( 'Dilabs Core', 'dilabs' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'dilabs' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'dilabs' ),
			'<strong>' . esc_html__( 'Dilabs Core', 'dilabs' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'dilabs' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		
		
		
		// ------------------------------------------start header file------------------------------------------start //
		// Header Elements
		require_once( DILABS_ADDONS . '/header/header.php' );

		// Header Widget Register
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Header() );

		// ------------------------------------------end header file------------------------------------------start //



		// ------------------------------------------start footer file------------------------------------------start //
		// Footer Elements
		require_once( DILABS_ADDONS . '/footer-widgets/newsletter-widget.php' );
		// Footer Widget Register
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Newsletter_Widgets() );

		// ------------------------------------------end  footer file------------------------------------------start //



		// Include Widget files
		require_once( DILABS_ADDONS . '/widgets/section-title.php' );
		require_once( DILABS_ADDONS . '/widgets/blog-post.php' );
		require_once( DILABS_ADDONS . '/widgets/button.php' );


		require_once( DILABS_ADDONS . '/widgets/dilabs-banner.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-services.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-about-us.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-workprocess.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-projects.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-wcu.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-team.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-testimonials.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-experience.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-service2.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-features.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-partner.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-contact-info.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-pricing.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-contact-me.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-team-details.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-qualifications.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-project-info.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-faq.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-wwo.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-project-v2.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-app-features.php' );
		require_once( DILABS_ADDONS . '/widgets/dilabs-counterup.php' );


		
		


		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Button() );


		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Services() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_About_Us() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Work_Process() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Projects() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Wcu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Experience() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Offer() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Features() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Client_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Contact_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Pricing_Plan() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Portfolio_Hireme() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Team_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Qualifications() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Project_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Features_Ww0() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Project_V2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_App_Features() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Dilabs_Counterup() );




		
		
		

		

	}

    public function widget_scripts() {
        wp_enqueue_script(
            'dilabs-frontend-script',
            DILABS_PLUGDIRURI . 'assets/js/dilabs-frontend.js',
            array('jquery'),
            false,
            true
		);
	}
	

    function dilabs_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'dilabs',
            [
                'title' => __( 'Dilabs', 'dilabs' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
        $elements_manager->add_category(
            'dilabs_footer_elements',
            [
                'title' => __( 'Dilabs Footer Elements', 'dilabs' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'dilabs_header_elements',
            [
                'title' => __( 'Dilabs Header Elements', 'dilabs' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

	}

}

Dilabs_Extension::instance();