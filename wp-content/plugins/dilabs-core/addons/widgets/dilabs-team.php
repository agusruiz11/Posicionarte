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
 * team Widget .
 *
 */
class Dilabs_Team extends Widget_Base {

	public function get_name() {
		return 'dilabsteam';
	}

	public function get_title() {
		return __( 'Dilabs Team', 'dilabs' );
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
				'label' 	=> __( 'Work Process', 'dilabs' ),
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
			'name',
			[
				'label'     => __( 'Name', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Name' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'Single Page', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'desig',
			[
				'label'     => __( 'Designation', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Designation' , 'dilabs' ),
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

        $this->add_control(
			'values',
			[
				'label' 		=> __( 'Team', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Shawon', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'		=> [ 'layout' => ['1','3']  ],
			]
		);

		$this->add_control(
			'shape',
			[
				'label' 		=> __( 'Shape', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['3']  ],
			]
		);


		$repeater = new Repeater();

		
		$repeater->add_control(
			'name',
			[
				'label'     => __( 'Name', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Name' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'Single Page', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'desig',
			[
				'label'     => __( 'Designation', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Designation' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'f_url',
			[
				'label'     => __( 'Facebook url', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			't_url',
			[
				'label'     => __( 'Twitter url', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'y_url',
			[
				'label'     => __( 'Youtube url', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
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

        
        $this->add_control(
			'values2',
			[
				'label' 		=> __( 'Team', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Shawon', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'		=> [ 'layout' => ['2']  ],
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
				'label' 		=> __( 'Gradient Color From', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => '--color-primary: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_control(
			'header_to_color',
			[
				'label' 		=> __( 'Gradient Color To', 'dilabs' ),
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


		/*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Team Styling', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Name', 'dilabs' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} a'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} a',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Designation', 'dilabs' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} span'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} span',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	        echo '<div class="team-style-two-area">';

		        echo '<div class="container">';
		            echo '<div class="row align-center">';
		            	if( $settings['show_section_heading'] == 'yes' ) {
			                echo '<!-- Single Item -->';
			                echo '<div class="col-xl-6 col-lg-12">';
			                    echo '<div class="site-heading">';
			                        if( ! empty( $settings['title'] ) ){
				                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
				                    }
				                    if( ! empty( $settings['subtitle'] ) ){
				                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            }
		                echo '<!-- End Single Item -->';
		                foreach( $settings['values'] as $single_data ) { 
			                echo '<!-- Single Item -->';
			                if( $settings['show_section_heading'] == 'yes' ) {
				                echo '<div class="col-xl-3 col-lg-4 col-md-6 mb-50 wow fadeInUp">';
				            }else{
				            	echo '<div class="col-xl-4 col-lg-4 col-md-6 mb-50 wow fadeInUp">';
				            }
			                    echo '<div class="team-style-two">';
			                        echo '<div class="thumb">';
			                        	if( ! empty( $single_data['image']['url'] ) ){
				                            echo dilabs_img_tag( array(
												'url'	=> esc_url( $single_data['image']['url'] ),
											) );
				                        }
			                            echo '<div class="team-info">';
			                                echo '<div class="content">';
			                                	if( ! empty( $single_data['name'] ) ){
				                                    echo '<h4><a href="'.esc_url( $single_data['url'] ).'">'.esc_html( $single_data['name'] ).'</a></h4>';
				                                }
				                                if( ! empty( $single_data['desig'] ) ){
				                                    echo '<span>'.esc_html( $single_data['desig'] ).'</span>';
				                                }
			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			                echo '<!-- End Single Item -->';
			            }
		               
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout'] == '2' ){
			echo '<div class="team-style-one-area">';

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

		                foreach( $settings['values2'] as $single_data ) { 
			                echo '<div class="col-xl-4 col-md-6 mb-30">';
			                    echo '<div class="team-style-one">';
			                        echo '<div class="thumb">';
			                            if( ! empty( $single_data['image']['url'] ) ){
				                            echo dilabs_img_tag( array(
												'url'	=> esc_url( $single_data['image']['url'] ),
											) );
				                        }
			                            echo '<div class="team-info">';
			                                
			                                echo '<div class="team-social">';
			                                    echo '<div class="share-link">';
			                                        echo '<i class="fas fa-share-alt"></i>';
			                                        echo '<ul>';
			                                        	if( ! empty( $single_data['f_url'] ) ){
				                                            echo '<li class="facebook"><a href="'.esc_url( $single_data['f_url'] ).'"><i class="fab fa-facebook-f"></i></a></li>';
				                                        }
				                                        if( ! empty( $single_data['t_url'] ) ){
				                                            echo '<li class="twitter"><a href="'.esc_url( $single_data['t_url'] ).'"><i class="fab fa-twitter"></i></a></li>';
				                                        }
				                                        if( ! empty( $single_data['y_url'] ) ){
				                                            echo '<li class="youtube"><a href="'.esc_url( $single_data['y_url'] ).'"><i class="fab fa-youtube"></i></a></li>';
				                                        }
			                                        echo '</ul>';
			                                    echo '</div>';
			                                    echo '<a href="#"><i class="fas fa-comments-alt"></i></a>';
			                                echo '</div>';
			                                echo '<div class="content">';
			                                    if( ! empty( $single_data['name'] ) ){
				                                    echo '<h4><a href="'.esc_url( $single_data['url'] ).'">'.esc_html( $single_data['name'] ).'</a></h4>';
				                                }
				                                if( ! empty( $single_data['desig'] ) ){
				                                    echo '<span>'.esc_html( $single_data['desig'] ).'</span>';
				                                }
			                                echo '</div>';

			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<div class="team-style-three-area text-center">';

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
		            	foreach( $settings['values'] as $single_data ) { 
			                echo '<!-- Single Item -->';
			                echo '<div class="col-xl-3 col-md-6 mb-30">';
			                    echo '<div class="team-style-three">';
			                    	if( ! empty( $single_data['image']['url'] ) ){
			                    		if( ! empty( $settings['shape']['url'] ) ){
					                        echo '<div class="thumb" style="background-image: url( '.esc_url( $settings['shape']['url'] ).' );">';
					                    }else{
					                    	echo '<div class="thumb">';
					                    }
				                            echo dilabs_img_tag( array(
												'url'	=> esc_url( $single_data['image']['url'] ),
											) );
				                        echo '</div>';
				                    }
			                        echo '<div class="content">';
			                            if( ! empty( $single_data['name'] ) ){
		                                    echo '<h4><a href="'.esc_url( $single_data['url'] ).'">'.esc_html( $single_data['name'] ).'</a></h4>';
		                                }
		                                if( ! empty( $single_data['desig'] ) ){
		                                    echo '<span>'.esc_html( $single_data['desig'] ).'</span>';
		                                }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			                echo '<!-- End Single Item -->';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}