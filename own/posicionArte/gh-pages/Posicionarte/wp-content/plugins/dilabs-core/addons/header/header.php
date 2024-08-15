<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Header Widget .
 *
 */
class Dilabs_Header extends Widget_Base {

	public function get_name() {
		return 'dilabsheader';
	}

	public function get_title() {
		return __( 'Header', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'header_style',
			[
				'label' 		=> __( 'Header Style', 'dilabs' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'dilabs' ),
					'2' 		=> __( 'Style Two', 'dilabs' ),
					'3' 		=> __( 'Style Three', 'dilabs' ),
					'4' 		=> __( 'Style Four', 'dilabs' ),
					'5' 		=> __( 'Style Five', 'dilabs' ),
				],
			]
		);
		$this->add_control(
			'show_topbar',
			[
				'label' 		=> __( 'Show Support email?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => '4'  ],
			]
		);

		$this->add_control(
			'support_text',
			[
				'label' 	=> __( 'Support Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Have any Questions?', 'dilabs' ),
                'condition'		=> [ 'show_topbar' => 'yes' , 'header_style' => '4' ],
			]
        );
        $this->add_control(
			'support_email',
			[
				'label' 	=> __( 'Support E-Mail', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'info@digital.com', 'dilabs' ),
                'condition'		=> [ 'show_topbar' => 'yes' , 'header_style' => '4' ],
			]
        );
        $this->add_control(
			'phone',
			[
				'label' 	=> __( 'Phone', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '017598++-898', 'dilabs' ),
                'condition'		=> [ 'show_topbar' => 'yes' , 'header_style' => '4' ],
			]
        );
        $this->add_control(
			'address',
			[
				'label' 	=> __( 'Address', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '70240 Avenue of the Moon, California ', 'dilabs' ),
                'condition'		=> [ 'show_topbar' => 'yes' , 'header_style' => '4' ],
			]
        );

		$this->add_control(
			'logo_image',
			[
				'label' 		=> __( 'Upload Logo Light Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'logo_image_dark',
			[
				'label' 		=> __( 'Upload Logo Dark Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'header_style' => ['2','5']  ],
			]
		);
		$this->add_control(
			'logo_image_mobile',
			[
				'label' 		=> __( 'Upload Logo For Mobile Device', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'header_style' => '2'  ],
			]
		);
        $this->add_control(
			'logo_link',
			[
				'label' 		=> __( 'Logo Link', 'dilabs' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'show_search',
			[
				'label' 		=> __( 'Show Search Icon?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => ['1', '2', '4']  ],
			]
		);
		$this->add_control(
			'show_offcanvas',
			[
				'label' 		=> __( 'Show Offcanvus?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => ['1', '2', '4']  ],
			]
		);
		
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text 1', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'dilabs' ),
                'rows' 		=> 2,
                'condition'		=> [ 'header_style' => ['3','5']  ],
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link 1', 'dilabs' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [ 'header_style' => ['3','5']  ],
			]
		);

		$this->add_control(
			'button_text_2',
			[
				'label' 	=> __( 'Button Text 2', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'dilabs' ),
                'rows' 		=> 2,
                'condition'		=> [ 'header_style' => ['3']  ],
			]
        );

        $this->add_control(
			'button_link_2',
			[
				'label' 		=> __( 'Link 2', 'dilabs' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [ 'header_style' => ['3']  ],
			]
		);

		$menus = $this->dilabs_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'dilabs_menu_select',
				[
					'label'     	=> __( 'Select Dilabs Menu', 'dilabs' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'dilabs' ), admin_url( 'nav-menus.php' ) ),
					'condition'		=> [ 'header_style' => [ '1','2', '3', '4','5'] ],
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'dilabs' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'dilabs' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
					'condition'		=> [ 'header_style' => [ '1','2', '3', '4','5'] ],
				]
			);
		}

        $this->end_controls_section();

		//---------------------------------------MenuBar Style---------------------------------------//

		$this->start_controls_section(
			'menubar_style_section',
			[
				'label' 	=> __( 'MenuBar Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'menubar_color',
			[
				'label' 		=> __( 'Menubar Background Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs.no-background' => 'background-color: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_control(
			'sticky_menubar_color',
			[
				'label' 		=> __( 'Sticky Menubar Background Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs' => 'background-color: {{VALUE}}!important;',
                ],
			]
        );
         $this->add_control(
			'search_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs.no-background.white .attr-nav > ul > li > a' => '--white: {{VALUE}}!important;',
                ],
			]
        );
        $this->end_controls_section();

        //---------------------------------------Menu Style---------------------------------------//


		$this->start_controls_section(
			'section_con_styling',
			[
				'label' 	=> __( 'Menu Control', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs3'
		);


		$this->start_controls_tab(
			'style_normal_tab3',
			[
				'label' => esc_html__( 'Menu', 'dilabs' ),
			]
		);
         $this->add_control(
			'menu_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .no-background ul.nav > li > a' => '--white: {{VALUE}}!important;',
					'{{WRAPPER}} .no-background ul.nav > li > a' => 'color: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_control(
			'menu_hvr_color',
			[
				'label' 		=> __( 'Hover Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .no-background ul.nav > li > a:hover' => 'color: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} nav.navbar ul.nav > li > a',
			]
		);

        
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'submenu_normal_tab3',
			[
				'label' => esc_html__( 'Submenu', 'dilabs' ),
			]
		);
         $this->add_control(
			'submenu_menu_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'submenu_menu_hvr_color',
			[
				'label' 		=> __( 'Hover Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a:hover' => 'color: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'submenu_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
    }

    public function dilabs_menu_select(){
	    $dilabs_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'dilabs' );
	    foreach( $dilabs_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        $dilabs_avaiable_menu   = $this->dilabs_menu_select();

		if( ! $dilabs_avaiable_menu ){
			return;
		}

		$args = [
			'menu'  => $settings['dilabs_menu_select'],
            'container'       => 'ul',
            'menu_class'      => 'nav navbar-nav navbar-center',
            'fallback_cb'     => 'Dilabs_Bootstrap_Navwalker::fallback',
            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>',
            'walker'          => new Dilabs_Bootstrap_Navwalker(),
		];

        if($settings['header_style'] == 1) {

        	echo '<nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">';
        		if( $settings['show_search'] == 'yes' ) {
		            echo '<!-- Start Top Search -->';
		            echo '<div class="top-search">';
		                echo '<div class="container">';
		                    ?>
		            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input name="s"  type="search" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr__('Search', 'buscom'); ?>">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </form>
					<!-- echo '<input type="text" class="form-control" placeholder="'.esc_attr__('Search', 'dilabs').'">'; -->
					<?php
		                echo '</div>';
		            echo '</div>';
		            echo '<!-- End Top Search -->'; 
		        }

	            echo '<div class="container-fill d-flex justify-content-between align-items-center">            ';
	                

	                echo '<!-- Start Header Navigation -->';
	                echo '<div class="navbar-header">';
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>';
	                    if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo '<a class="navbar-brand" href="'.esc_url( $settings['logo_link']['url'] ).'">';
		                        echo dilabs_img_tag( array(
									'url'	=> esc_url( $settings['logo_image']['url'] ),
									'class' => 'logo'
								) );
		                    echo '</a>';
		                }
	                echo '</div>';
	                echo '<!-- End Header Navigation -->';

	                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
	                echo '<div class="collapse navbar-collapse" id="navbar-menu">';
	                	if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo dilabs_img_tag( array(
								'url'	=> esc_url( $settings['logo_image']['url'] ),
							) );
		                }
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-times"></i></button>';

	                    if( ! empty( $settings['dilabs_menu_select'] ) ){
							wp_nav_menu( $args );
						}
	                    
	                    
	                echo '</div><!-- /.navbar-collapse -->';

	                echo '<div class="attr-right">';
	                    echo '<!-- Start Atribute Navigation -->';
	                    echo '<div class="attr-nav flex">';
	                        echo '<ul>';
	                        	if( $settings['show_search'] == 'yes' ) {
									echo '<li class="search"><a href="#"><i class="far fa-search"></i></a></li>';
								}
								if( $settings['show_offcanvas'] == 'yes' && is_active_sidebar( 'dilabs-offcanvus-area' )  ) {
									echo '<li class="side-menu">';
										echo '<a href="#">';
											echo '<span class="bar-1"></span>';
											echo '<span class="bar-2"></span>';
											echo '<span class="bar-3"></span>';
										echo '</a>';
									echo '</li>';
								}
	                        echo '</ul>';
	                    echo '</div>';
	                    echo '<!-- End Atribute Navigation -->';

	                    if(is_active_sidebar( 'dilabs-offcanvus-area' )){
							echo '<!-- Start Side Menu -->';
							echo '<div class="side">';
								echo '<a href="#" class="close-side"><i class="icon_close"></i></a>';
								dynamic_sidebar( 'dilabs-offcanvus-area' );
							echo '</div>';
							echo '<!-- End Side Menu -->';
						}


	                echo '</div>';
	                echo '<!-- Main Nav -->';

	            echo '</div>  ';
	            echo '<!-- Overlay screen for menu -->';
	            echo '<div class="overlay-screen"></div>';
	            echo '<!-- End Overlay screen for menu --> ';
	        echo '</nav>';
	    }elseif($settings['header_style'] == 2) {
			echo '<nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed white no-background">';
        		if( $settings['show_search'] == 'yes' ) {
		            echo '<!-- Start Top Search -->';
		            echo '<div class="top-search">';
		                echo '<div class="container">';
		                    ?>
		            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input name="s"  type="search" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr__('Search', 'buscom'); ?>">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </form>
					<!-- echo '<input type="text" class="form-control" placeholder="'.esc_attr__('Search', 'dilabs').'">'; -->
					<?php
		                echo '</div>';
		            echo '</div>';
		            echo '<!-- End Top Search -->';
		        }

	            echo '<div class="container-fill d-flex justify-content-between align-items-center">            ';
	                

	                echo '<!-- Start Header Navigation -->';
	                echo '<div class="navbar-header">';
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>';
	                    if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo '<a class="navbar-brand" href="'.esc_url( $settings['logo_link']['url'] ).'">';
		                        echo dilabs_img_tag( array(
									'url'	=> esc_url( $settings['logo_image']['url'] ),
									'class' => 'logo logo-display'
								) );
								if( ! empty( $settings['logo_image_dark']['url'] ) ){
									echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['logo_image_dark']['url'] ),
										'class' => 'logo logo-scrolled'
									) );
								}
		                    echo '</a>';
		                }
	                echo '</div>';
	                echo '<!-- End Header Navigation -->';

	                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
	                echo '<div class="collapse navbar-collapse" id="navbar-menu">';
	                	if( ! empty( $settings['logo_image_mobile']['url'] ) ){
		                    echo dilabs_img_tag( array(
								'url'	=> esc_url( $settings['logo_image_mobile']['url'] ),
							) );
		                }
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-times"></i></button>';

	                    if( ! empty( $settings['dilabs_menu_select'] ) ){
							wp_nav_menu( $args );
						}
	                    
	                    
	                echo '</div><!-- /.navbar-collapse -->';

	                echo '<div class="attr-right">';
	                    echo '<!-- Start Atribute Navigation -->';
	                    echo '<div class="attr-nav flex">';
	                        echo '<ul>';
	                        	if( $settings['show_search'] == 'yes' ) {
									echo '<li class="search"><a href="#"><i class="far fa-search"></i></a></li>';
								}
								if( $settings['show_offcanvas'] == 'yes' && is_active_sidebar( 'dilabs-offcanvus-area' )  ) {
									echo '<li class="side-menu">';
										echo '<a href="#">';
											echo '<span class="bar-1"></span>';
											echo '<span class="bar-2"></span>';
											echo '<span class="bar-3"></span>';
										echo '</a>';
									echo '</li>';
								}
	                        echo '</ul>';
	                    echo '</div>';
	                    echo '<!-- End Atribute Navigation -->';

	                    if(is_active_sidebar( 'dilabs-offcanvus-area' )){
							echo '<!-- Start Side Menu -->';
							echo '<div class="side">';
								echo '<a href="#" class="close-side"><i class="icon_close"></i></a>';
								dynamic_sidebar( 'dilabs-offcanvus-area' );
							echo '</div>';
							echo '<!-- End Side Menu -->';
						}


	                echo '</div>';
	                echo '<!-- Main Nav -->';

	            echo '</div>  ';
	            echo '<!-- Overlay screen for menu -->';
	            echo '<div class="overlay-screen"></div>';
	            echo '<!-- End Overlay screen for menu --> ';
	        echo '</nav>';
	    }elseif($settings['header_style'] == 3 ) {
	    	echo '<nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">';
        		
	            echo '<div class="container-fill d-flex justify-content-between align-items-center">            ';
	                

	                echo '<!-- Start Header Navigation -->';
	                echo '<div class="navbar-header">';
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>';
	                    if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo '<a class="navbar-brand" href="'.esc_url( $settings['logo_link']['url'] ).'">';
		                        echo dilabs_img_tag( array(
									'url'	=> esc_url( $settings['logo_image']['url'] ),
									'class' => 'logo'
								) );
		                    echo '</a>';
		                }
	                echo '</div>';
	                echo '<!-- End Header Navigation -->';

	                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
	                echo '<div class="collapse navbar-collapse" id="navbar-menu">';
	                	if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo dilabs_img_tag( array(
								'url'	=> esc_url( $settings['logo_image']['url'] ),
							) );
		                }
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-times"></i></button>';

	                    if( ! empty( $settings['dilabs_menu_select'] ) ){
							wp_nav_menu( $args );
						}
	                    
	                    
	                echo '</div><!-- /.navbar-collapse -->';

	                echo '<div class="attr-right">';
	                    echo '<div class="attr-nav">';
	                        echo '<ul>';
	                            echo '<li class="button">';
	                            	if( ! empty( $settings['button_text'] ) ) {
	                            		if( ! empty( $settings['button_link']['url'] ) ) {
								            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
								        }

								        if( ! empty( $settings['button_link']['nofollow'] ) ) {
								            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
								        }

								        if( ! empty( $settings['button_link']['is_external'] ) ) {
								            $this->add_render_attribute( 'button', 'target', '_blank' );
								        }

		                                echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['button_text'] ).'</a>';
		                            }

		                            if( ! empty( $settings['button_text_2'] ) ) {
	                            		if( ! empty( $settings['button_link_2']['url'] ) ) {
								            $this->add_render_attribute( 'button_2', 'href', esc_url( $settings['button_link_2']['url'] ) );
								        }

								        if( ! empty( $settings['button_link_2']['nofollow'] ) ) {
								            $this->add_render_attribute( 'button_2', 'rel', 'nofollow' );
								        }

								        if( ! empty( $settings['button_link_2']['is_external'] ) ) {
								            $this->add_render_attribute( 'button_2', 'target', '_blank' );
								        }
	                                	echo '<a '.$this->get_render_attribute_string('button_2').'>'.esc_html( $settings['button_text_2'] ).'</a>';
	                                }
	                            echo '</li>';
	                        echo '</ul>';
	                    echo '</div>';

	                echo '</div>';
	                echo '<!-- Main Nav -->';

	            echo '</div>  ';
	            echo '<!-- Overlay screen for menu -->';
	            echo '<div class="overlay-screen"></div>';
	            echo '<!-- End Overlay screen for menu --> ';
	        echo '</nav>';
	    }elseif($settings['header_style'] == 4 ) {

	    	if( $settings['show_topbar'] == 'yes' ) {
		    	echo '<div class="top-bar-area top-bar-style-two bg-dark text-light">';
			        echo '<div class="container">';
			            echo '<div class="row align-center">';
			                echo '<div class="col-lg-8">';
			                    echo '<ul class="item-flex">';
			                    	if( ! empty( $settings['address'] ) ){
				                        echo '<li>';
				                            echo '<div class="icon"><i class="fas fa-map-marker-alt"></i></div> ';
				                            echo '<div class="info">';
				                                echo '<strong>'.esc_html__('Address', 'dilabs' ).'</strong>';
				                                echo esc_html( $settings['address'] );
				                            echo '</div>';
				                        echo '</li>';
				                    }
				                    if( ! empty( $settings['phone'] ) ){
				                        echo '<li>';
				                            echo '<div class="icon"><i class="fas fa-user-headset"></i></div>';
				                            echo '<div class="info">';
				                                echo '<strong>'.esc_html__('Phone', 'dilabs' ).'</strong>';
				                                echo '<a href="tel:'.esc_attr($settings['phone']).'">'.esc_html( $settings['phone'] ).'</a>';
				                            echo '</div>';
				                       echo ' </li>';
				                   }
			                    echo '</ul>';
			                echo '</div>';
			                if(!empty($settings['support_text'])){
				                echo '<div class="col-lg-4 text-end">';
				                    echo '<div class="call-entry">';
				                        echo '<div class="icon"><i class="fas fa-comments-alt-dollar"></i></div>';
				                        echo '<div class="info">';
				                            echo '<p>'.esc_html($settings['support_text']).'</p>';
				                            if(!empty($settings['support_email'])){
		                                        echo '<h5><a href="mailto:'.esc_attr($settings['support_text']).'">'.esc_html($settings['support_email']).'</a></h5>';
		                                    }
				                        echo '</div>';
				                    echo '</div>';
				                echo '</div>';
				            }

			            echo '</div>';
			        echo '</div>';
			    echo '</div>';
			}


	    	echo '<nav class="navbar mobile-sidenav navbar-default validnavs dark">';
        		if( $settings['show_search'] == 'yes' ) {
		            echo '<!-- Start Top Search -->';
		            echo '<div class="top-search">';
		                echo '<div class="container">';
		                    ?>
		            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input name="s"  type="search" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr__('Search', 'buscom'); ?>">
                            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                        </div>
                    </form>
					<!-- echo '<input type="text" class="form-control" placeholder="'.esc_attr__('Search', 'dilabs').'">'; -->
					<?php
		                echo '</div>';
		            echo '</div>';
		            echo '<!-- End Top Search -->';
		        }

	            echo '<div class="container d-flex justify-content-between align-items-center">            ';
	                

	                echo '<!-- Start Header Navigation -->';
	                echo '<div class="navbar-header">';
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>';
	                    if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo '<a class="navbar-brand" href="'.esc_url( $settings['logo_link']['url'] ).'">';
		                        echo dilabs_img_tag( array(
									'url'	=> esc_url( $settings['logo_image']['url'] ),
									'class' => 'logo'
								) );
		                    echo '</a>';
		                }
	                echo '</div>';
	                echo '<!-- End Header Navigation -->';

	                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
	                echo '<div class="collapse navbar-collapse" id="navbar-menu">';
	                	if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo dilabs_img_tag( array(
								'url'	=> esc_url( $settings['logo_image']['url'] ),
							) );
		                }
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-times"></i></button>';

	                    if( ! empty( $settings['dilabs_menu_select'] ) ){
							wp_nav_menu( $args );
						}
	                    
	                    
	                echo '</div><!-- /.navbar-collapse -->';

	                echo '<div class="attr-right">';
	                    echo '<!-- Start Atribute Navigation -->';
	                    echo '<div class="attr-nav flex">';
	                        echo '<ul>';
	                        	if( $settings['show_search'] == 'yes' ) {
									echo '<li class="search"><a href="#"><i class="far fa-search"></i></a></li>';
								}
								if( $settings['show_offcanvas'] == 'yes' && is_active_sidebar( 'dilabs-offcanvus-area' )  ) {
									echo '<li class="side-menu">';
										echo '<a href="#">';
											echo '<span class="bar-1"></span>';
											echo '<span class="bar-2"></span>';
											echo '<span class="bar-3"></span>';
										echo '</a>';
									echo '</li>';
								}
	                        echo '</ul>';
	                    echo '</div>';
	                    echo '<!-- End Atribute Navigation -->';

	                    if(is_active_sidebar( 'dilabs-offcanvus-area' )){
							echo '<!-- Start Side Menu -->';
							echo '<div class="side">';
								echo '<a href="#" class="close-side"><i class="icon_close"></i></a>';
								dynamic_sidebar( 'dilabs-offcanvus-area' );
							echo '</div>';
							echo '<!-- End Side Menu -->';
						}


	                echo '</div>';
	                echo '<!-- Main Nav -->';

	            echo '</div>  ';
	            echo '<!-- Overlay screen for menu -->';
	            echo '<div class="overlay-screen"></div>';
	            echo '<!-- End Overlay screen for menu --> ';
	        echo '</nav>';
	    }else{
	    	echo '<nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed dark no-background">';
        		
	            echo '<div class="container d-flex justify-content-between align-items-center">            ';
	                

	                echo '<!-- Start Header Navigation -->';
	                echo '<div class="navbar-header">';
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>';
	                    if( ! empty( $settings['logo_image']['url'] ) ){
		                    echo '<a class="navbar-brand" href="'.esc_url( $settings['logo_link']['url'] ).'">';
		                        echo dilabs_img_tag( array(
									'url'	=> esc_url( $settings['logo_image']['url'] ),
									'class' => 'logo'
								) );
		                    echo '</a>';
		                }
		                
	                echo '</div>';
	                echo '<!-- End Header Navigation -->';

	                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
	                echo '<div class="collapse navbar-collapse" id="navbar-menu">';
	                	if( ! empty( $settings['logo_image_dark']['url'] ) ){
		                    echo dilabs_img_tag( array(
								'url'	=> esc_url( $settings['logo_image_dark']['url'] ),
							) );
		                }
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-times"></i></button>';

	                    if( ! empty( $settings['dilabs_menu_select'] ) ){
							wp_nav_menu( $args );
						}
	                    
	                    
	                echo '</div><!-- /.navbar-collapse -->';

	                echo '<div class="attr-right">';
	                    echo '<div class="attr-nav">';
	                        echo '<ul>';
	                            echo '<li class="button">';
	                            	if( ! empty( $settings['button_text'] ) ) {
	                            		if( ! empty( $settings['button_link']['url'] ) ) {
								            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
								        }

								        if( ! empty( $settings['button_link']['nofollow'] ) ) {
								            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
								        }

								        if( ! empty( $settings['button_link']['is_external'] ) ) {
								            $this->add_render_attribute( 'button', 'target', '_blank' );
								        }

		                                echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['button_text'] ).'</a>';
		                            }
	                            echo '</li>';
	                        echo '</ul>';
	                    echo '</div>';

	                echo '</div>';
	                echo '<!-- Main Nav -->';

	            echo '</div>  ';
	            echo '<!-- Overlay screen for menu -->';
	            echo '<div class="overlay-screen"></div>';
	            echo '<!-- End Overlay screen for menu --> ';
	        echo '</nav>';
	    }
	}

}