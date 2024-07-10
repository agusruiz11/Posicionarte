<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Project Widget .
 *
 */
class Dilabs_Projects extends Widget_Base {

	public function get_name() {
		return 'dilabsprojects';
	}

	public function get_title() {
		return __( 'Dilabs Projects', 'dilabs' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'work_process_section',
			[
				'label' 	=> __( 'Projects', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Style', 'dilabs' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'dilabs' ),
					'2' 			=> __( 'Style Two', 'dilabs' ),
					'3' 			=> __( 'Style Three', 'dilabs' ),
				],
			]
		);
         //-------------------------------------section heading start-------------------------------------//

		$this->add_control(
			'show_section_heading',
			[
				'label' 		=> __( 'Show SSection Header?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'show_half_bg',
			[
				'label' 		=> __( 'Show Half BG?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'title',
			[
				'label'     	=> __( 'Title', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is title area', 'dilabs'),
                'condition'		=> [ 'show_section_heading' => 'yes'  ],
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     	=> __( 'Subtitle', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'show_section_heading' => 'yes'  ],
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'tags',
			[
				'label'     => __( 'Categories', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Marketing, Sales' , 'dilabs' ),
                'description' 		=> __( 'Use (,) for separate categories' , 'dilabs' ),
			]
        );

        $repeater->add_control(
			'details_page', [
				'label' 		=> __( 'Details Page URL', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '#' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );

        $this->add_control(
			'projects',
			[
				'label' 		=> __( 'Projects', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'layout' => [ '1', '2' ] ],
			]
		);

		// ------------------------------------------style two ------------------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'desc',
			[
				'label'     => __( 'Description', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'btn_txt',
			[
				'label'     => __( 'Button  Text', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Marketing, Sales' , 'dilabs' ),
                'description' 		=> __( 'View Project' , 'dilabs' ),
			]
        );

        $repeater->add_control(
			'details_page', [
				'label' 		=> __( 'Details Page URL', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '#' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );

        $this->add_control(
			'projects2',
			[
				'label' 		=> __( 'Projects', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'layout' => [ '3' ] ],
			]
		);
		$this->add_control(
			'shape',
			[
				'label' 		=> __( 'Shape Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => [ '1','3' ] ],
			]
		);
        $this->end_controls_section();




        /*-------------------------------------------------------------Feedback styling--------------------------------------------------------*/

		$this->start_controls_section(
			'Section_header_styling',
			[
				'label' 	=> __( 'Header Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_section_heading' => 'yes'  ]
			]
        );
        $this->start_controls_tabs(
			'header_tabs1'
		);

		//--------------------first tab start--------------------//

		$this->start_controls_tab(
			'header_title',
			[
				'label' => esc_html__( 'Title', 'dilabs' ),
			]
		);
        $this->add_control(
			'header_from_color',
			[
				'label' 		=> __( 'Gradient Color From', 'digalu' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => '--color-primary: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_control(
			'header_to_color',
			[
				'label' 		=> __( 'Gradient Color To', 'digalu' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => '--color-secondary: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'header_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .sub-title',
			]
		);

        $this->add_responsive_control(
			'header_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'header_title_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------first tab end--------------------//


		//--------------------2nd tab start--------------------//

		$this->start_controls_tab(
			'header_tabs2',
			[
				'label' => esc_html__( 'subtitle', 'dilabs' ),
			]
		);
		$this->add_control(
			'header_subtitle_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2'	=> '--color-heading: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'header_subtitle_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} h2',
			]
		);

        $this->add_responsive_control(
			'header_subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'header_subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

       

        /*-----------------------------------------section Content styling------------------------------------*/

		$this->start_controls_section(
			'section_con_styling',
			[
				'label' 	=> __( 'Content Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs1'
		);


		$this->start_controls_tab(
			'style_normal_tab1',
			[
				'label' => esc_html__( 'Title', 'dilabs' ),
			]
		);
        $this->add_control(
			's_title_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} a'	=> '--white: {{VALUE}}!important;',
					'{{WRAPPER}} .info h2, {{WRAPPER}} .info h4'	=> '--color-heading: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} a, {{WRAPPER}} .info h2, {{WRAPPER}} .info h4',
			]
		);

        $this->add_responsive_control(
			's_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .info h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .info h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );

        $this->add_responsive_control(
			's_title_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .info h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .info h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'

				],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Meta', 'dilabs' ),
			]
		);
		$this->add_control(
			's_content_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-style-one .overlay span'	=> '--white: {{VALUE}}!important;',
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .gallery-list'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_content_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .project-style-one .overlay span, {{WRAPPER}} p, {{WRAPPER}} gallery-list',
			]
		);

        $this->add_responsive_control(
			's_content_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-style-one .overlay span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->add_responsive_control(
			's_content_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-style-one .overlay span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout'] == '1' ){
	        echo '<div class="project-style-one-area">';
		        echo '<div class="container">';
		            echo '<div class="heading-left">';
		                echo '<div class="row">';
		                    echo '<div class="col-xl-5 col-lg-6">';
		                        echo '<div class="content-left">';
		                            if( ! empty( $settings['title'] ) ){
				                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
				                    }
				                    if( ! empty( $settings['subtitle'] ) ){
				                        echo '<h2 class="heading">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
				                    }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		            
		            echo '<!-- Navigation -->';
		            echo '<div class="project-nav-box">';
		                echo '<div class="project-swiper-nav">';

		                    echo '<!-- Pagination -->';
		                    echo '<div class="project-button-prev"></div>';
		                    echo '<div class="project-button-next"></div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';

		        echo '<div class="project-style-one-items">';
		            echo '<div class="container-fill">';
		                echo '<div class="row">';
		                    echo '<div class="col-lg-12">';
		                        echo '<div class="project-center-stage-carousel swiper">';
		                            echo '<!-- Additional required wrapper -->';
		                            echo '<div class="swiper-wrapper">';
		                                echo '<!-- Single Item -->';

		                                foreach( $settings['projects'] as $single_data ) { 
							            	$url = $single_data['details_page'] ;
							        		if(!empty($url)){
							        			$url_start_tag 	= '<a href="'.esc_url($url).'">';
							        			$url_end_tag 	= '</a>';
							        		}else{
							        			$url_start_tag 	= '';
							        			$url_end_tag 	= '';
							        		}
			                                echo '<div class="swiper-slide">';
			                                	if(!empty($single_data['image']['url'])){
				                                    echo '<div class="project-style-one">';
				                                        echo dilabs_img_tag( array(
															'url'	=> esc_url( $single_data['image']['url'] ),
														) );
				                                        echo '<div class="overlay">';
				                                        	if(!empty($single_data['tags'])){
					                                            echo '<span>'.esc_html( $single_data['tags'] ).'</span>';
					                                        }
				                                            if(!empty($single_data['title'])){
								                              	echo '<h4>'.$url_start_tag.esc_html($single_data['title']).$url_end_tag.'</h4>';
								                            }
				                                        echo '</div>';
				                                        if(!empty($settings['shape']['url'])){
					                                        echo '<div class="shape">';
					                                            echo dilabs_img_tag( array(
																	'url'	=> esc_url( $settings['shape']['url'] ),
																) );
					                                        echo '</div>';
					                                    }
				                                    echo '</div>';
				                                }
			                                echo '</div>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout'] == '2' ){
			echo '<div class="project-style-two-area default-padding">';
				if( $settings['show_half_bg'] == 'yes' ) {
			        echo '<div class="shape-top-dark"></div>';
			    }

		        if( $settings['show_section_heading'] == 'yes' ) {
		        	echo '<div class="container">';
			            echo '<div class="row">';
			                echo '<div class="col-lg-8 offset-lg-2">';
			                    echo '<div class="site-heading text-center">';
			                    	if( ! empty( $settings['title'] ) ){
				                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
				                    }
				                    if( ! empty( $settings['subtitle'] ) ){
				                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        echo '</div>';
			    }

		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="container">';
		                    echo '<div class="row">';
		                        echo '<div class="col-md-12 gallery-content">';
		                            echo '<div class="magnific-mix-gallery masonary">';
		                                echo '<div id="gallery-masonary" class="gallery-items colums-3">';
		                                    echo '<!-- Single Item -->';
		                                    foreach( $settings['projects'] as $single_data ) { 
								            	$url = $single_data['details_page'] ;
								        		if(!empty($url)){
								        			$url_start_tag 	= '<a href="'.esc_url($url).'">';
								        			$url_end_tag 	= '</a>';
								        		}else{
								        			$url_start_tag 	= '';
								        			$url_end_tag 	= '';
								        		}
			                                    echo '<div class="gallery-item">';
			                                        echo '<div class="gallery-style-two">';
			                                        	if(!empty($single_data['image']['url'])){
				                                            echo '<div class="thumb">';
				                                                echo dilabs_img_tag( array(
																	'url'	=> esc_url( $single_data['image']['url'] ),
																) );
				                                            echo '</div>';
				                                        }
			                                            echo '<div class="content">';
			                                                echo '<div class="info">';
			                                                    if(!empty($single_data['title'])){
									                              	echo '<h4>'.$url_start_tag.esc_html($single_data['title']).$url_end_tag.'</h4>';
									                            }
			                                                    echo '<ul class="gallery-list">';
			                                                        $str = $single_data['tags'];
																	$delimiter = ',';
																	$words = explode($delimiter, $str);
												                    foreach ($words as $word) {
												                    	echo '<li>'.esc_html($word).'</li> ';
												                    }
			                                                    echo '</ul>';
			                                                echo '</div>';
			                                                if(!empty($url)){
				                                                echo '<div class="button">';
				                                                    echo '<a href="'.esc_url($url).'"><i class="fas fa-long-arrow-right"></i></a>';
				                                                echo '</div>';
				                                            }
			                                            echo '</div>';
			                                        echo '</div>';
			                                    echo '</div>';
			                                }
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			if(!empty( $settings['shape']['url'] )){
				echo '<div class="case-studies-area default-padding" style="background-image: url('.esc_url( $settings['shape']['url'] ).');">';
			}else{
				echo '<div class="case-studies-area>';
			}
		        echo '<div class="container">';
		            echo '<div class="case-carousel swiper">';
		                echo '<div class="heading-left">';
		                    echo '<div class="row">';
		                        echo '<div class="col-xl-5 col-lg-6">';
		                            echo '<div class="content-left">';
		                                if( ! empty( $settings['title'] ) ){
					                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
					                    }
					                    if( ! empty( $settings['subtitle'] ) ){
					                        echo '<h2 class="heading">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
					                    }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';

		                echo '<!-- Additional required wrapper -->';
		                echo '<div class="swiper-wrapper">';
		                	foreach( $settings['projects2'] as $single_data ) { 
			                    echo '<!-- Single item -->';
			                    echo '<div class="swiper-slide">';
			                        echo '<div class="case-style-two">';
			                            echo '<div class="row">';
			                            	if(!empty($single_data['image']['url'])){
				                                echo '<div class="col-xl-6">';
				                                    echo '<div class="case-thumb">';
				                                        echo dilabs_img_tag( array(
															'url'	=> esc_url( $single_data['image']['url'] ),
														) );
				                                    echo '</div>';
				                                echo '</div>';
				                            }

			                                echo '<div class="col-xl-6">';
			                                    echo '<div class="info text-light" style="background-image: url('.DILABS_PLUGDIRURI . 'assets/img/banner-3.webp);">';
			                                    	if(!empty($single_data['title'])){
				                                        echo '<h2>'.esc_html( $single_data['title'] ).'</h2>';
				                                    }
				                                    if(!empty($single_data['desc'])){
				                                        echo '<p>'.esc_html( $single_data['desc'] ).'</p>';
				                                    }
				                                    if(!empty( $single_data['btn_txt'] )){
				                                        echo '<a class="btn btn-md btn-dark animation" href="'.esc_url( $single_data['details_page'] ).'">'.esc_html( $single_data['btn_txt'] ).'</a>';
				                                    }
			                                    echo '</div>';
			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                    echo '<!-- End Single item -->';
			                }
		                echo '</div>';
		                echo '<!-- Navigation -->';
		                echo '<div class="case-swiper-nav">';
		                    echo '<!-- Pagination -->';
		                    echo '<div class="swiper-pagination"></div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}