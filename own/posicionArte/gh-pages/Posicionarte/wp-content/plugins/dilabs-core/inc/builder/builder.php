<?php
    /**
     * Class For Builder
     */
    class DilabsBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'dilabs_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'dilabs-core',DILABS_PLUGDIRURI.'assets/js/dilabs-core.js',array( 'jquery' ),'1.0',true );
		}


        public function dilabs_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'dilabs_header_option',
                [
                    'label'     => __( 'Header Option', 'dilabs' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'dilabs_header_style',
                [
                    'label'     => __( 'Header Option', 'dilabs' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'dilabs' ),
    					'header_builder'       => __( 'Header Builder', 'dilabs' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'dilabs_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'dilabs' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->dilabs_header_choose_option(),
                    'condition' => [ 'dilabs_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'dilabs_footer_option',
                [
                    'label'     => __( 'Footer Option', 'dilabs' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'dilabs_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'dilabs' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'dilabs' ),
    				'label_off'     => __( 'No', 'dilabs' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'dilabs_footer_style',
                [
                    'label'     => __( 'Footer Style', 'dilabs' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'dilabs' ),
    					'footer_builder'       => __( 'Footer Builder', 'dilabs' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'dilabs_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'dilabs_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'dilabs' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->dilabs_footer_choose_option(),
                    'condition' => [ 'dilabs_footer_style' => 'footer_builder','dilabs_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Dilabs Builder', 'dilabs' ),
            	esc_html__( 'Dilabs Builder', 'dilabs' ),
				'manage_options',
				'dilabs',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('dilabs', esc_html__('Footer Builder', 'dilabs'), esc_html__('Footer Builder', 'dilabs'), 'manage_options', 'edit.php?post_type=dilabs_footer');
			add_submenu_page('dilabs', esc_html__('Header Builder', 'dilabs'), esc_html__('Header Builder', 'dilabs'), 'manage_options', 'edit.php?post_type=dilabs_header');
            add_submenu_page('dilabs', esc_html__('Tab Builder', 'dilabs'), esc_html__('Tab Builder', 'dilabs'), 'manage_options', 'edit.php?post_type=dilabs_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','dilabs' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'dilabs' ),
				'singular_name'      => __( 'Footer', 'dilabs' ),
				'menu_name'          => __( 'Dilabs Footer Builder', 'dilabs' ),
				'name_admin_bar'     => __( 'Footer', 'dilabs' ),
				'add_new'            => __( 'Add New', 'dilabs' ),
				'add_new_item'       => __( 'Add New Footer', 'dilabs' ),
				'new_item'           => __( 'New Footer', 'dilabs' ),
				'edit_item'          => __( 'Edit Footer', 'dilabs' ),
				'view_item'          => __( 'View Footer', 'dilabs' ),
				'all_items'          => __( 'All Footer', 'dilabs' ),
				'search_items'       => __( 'Search Footer', 'dilabs' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'dilabs' ),
				'not_found'          => __( 'No Footer found.', 'dilabs' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'dilabs' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'dilabs_footer', $args );

			$labels = array(
				'name'               => __( 'Header', 'dilabs' ),
				'singular_name'      => __( 'Header', 'dilabs' ),
				'menu_name'          => __( 'Dilabs Header Builder', 'dilabs' ),
				'name_admin_bar'     => __( 'Header', 'dilabs' ),
				'add_new'            => __( 'Add New', 'dilabs' ),
				'add_new_item'       => __( 'Add New Header', 'dilabs' ),
				'new_item'           => __( 'New Header', 'dilabs' ),
				'edit_item'          => __( 'Edit Header', 'dilabs' ),
				'view_item'          => __( 'View Header', 'dilabs' ),
				'all_items'          => __( 'All Header', 'dilabs' ),
				'search_items'       => __( 'Search Header', 'dilabs' ),
				'parent_item_colon'  => __( 'Parent Header:', 'dilabs' ),
				'not_found'          => __( 'No Header found.', 'dilabs' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'dilabs' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'dilabs_header', $args );

            $labels = array(
				'name'               => __( 'Tab Builder', 'dilabs' ),
				'singular_name'      => __( 'Tab Builder', 'dilabs' ),
				'menu_name'          => __( 'Dilabs Tab Builder', 'dilabs' ),
				'name_admin_bar'     => __( 'Tab Builder', 'dilabs' ),
				'add_new'            => __( 'Add New', 'dilabs' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'dilabs' ),
				'new_item'           => __( 'New Tab Builder', 'dilabs' ),
				'edit_item'          => __( 'Edit Tab Builder', 'dilabs' ),
				'view_item'          => __( 'View Tab Builder', 'dilabs' ),
				'all_items'          => __( 'All Tab Builder', 'dilabs' ),
				'search_items'       => __( 'Search Tab Builder', 'dilabs' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'dilabs' ),
				'not_found'          => __( 'No Tab Builder found.', 'dilabs' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'dilabs' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'dilabs_tab_builder', $args );

		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'dilabs_footer' == $post->post_type || 'dilabs_header' == $post->post_type || 'dilabs_tab_builder' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function dilabs_footer_choose_option(){

			$dilabs_post_query = new WP_Query( array(
				'post_type'			=> 'dilabs_footer',
				'posts_per_page'	    => -1,
			) );

			$dilabs_builder_post_title = array();
			$dilabs_builder_post_title[''] = __('Select a Footer','Dilabs');

			while( $dilabs_post_query->have_posts() ) {
				$dilabs_post_query->the_post();
				$dilabs_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $dilabs_builder_post_title;

		}

		public function dilabs_header_choose_option(){

			$dilabs_post_query = new WP_Query( array(
				'post_type'			=> 'dilabs_header',
				'posts_per_page'	    => -1,
			) );

			$dilabs_builder_post_title = array();
			$dilabs_builder_post_title[''] = __('Select a Header','Dilabs');

			while( $dilabs_post_query->have_posts() ) {
				$dilabs_post_query->the_post();
				$dilabs_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $dilabs_builder_post_title;

        }

    }

    $builder_execute = new DilabsBuilder();