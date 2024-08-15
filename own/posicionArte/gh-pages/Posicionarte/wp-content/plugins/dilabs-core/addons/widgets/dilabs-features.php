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
 * process Widget .
 *
 */
class Dilabs_Features extends Widget_Base {

	public function get_name() {
		return 'dilabsfeatures';
	}

	public function get_title() {
		return __( 'Dilabs Features', 'dilabs' );
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
				'label' 	=> __( 'Features', 'dilabs' ),
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
					'4' 			=> __( 'Style Four', 'dilabs' ),
				],
			]
		);
		$this->add_control(
			'bg',
			[
				'label' 		=> __( 'Background', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['3', '4'] ],
			]
		);

		$this->add_control(
			'title',
			[
				'label'     	=> __( 'Title', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is title area', 'dilabs'),
                'condition'		=> [ 'layout' => ['3', '4'] ],
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     	=> __( 'Subtitle', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'layout' => ['3', '4'] ],
			]
        );
        $this->add_control(
			'desc',
			[
				'label'     	=> __( 'Description', 'dilabs' ),
                'type'      	=> Controls_Manager::WYSIWYG,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'layout' => ['4'] ],
			]
        );
        
		
        $repeater = new Repeater();

		
		$repeater->add_control(
			'process_title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'process_con',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Customize templates and create unique campaigns ' , 'dilabs' ),
			]
        );
        
        $repeater->add_control(
			'img',
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
			'process2',
			[
				'label' 		=> __( 'Process', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ process_title }}}',
				'condition'		=> [ 'layout' => ['1','2', '4']  ],
			]
		);

		$repeater2 = new Repeater();

		
		$repeater2->add_control(
			'progressbar_title',
			[
				'label'     => __( 'Progressbar Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Business Idea' , 'dilabs' ),
			]
        );
        $repeater2->add_control(
			'progressbar_shuffix',
			[
				'label'     => __( 'Progressbar Shuffix', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'K' , 'dilabs' ),
			]
        );
        
        $repeater2->add_control(
			'progressbar_number',
			[
				'label'     => __( 'Progressbar Number', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '88' , 'dilabs' ),
			]
        );
        

        $this->add_control(
			'values',
			[
				'label' 		=> __( 'items', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ progressbar_title }}}',
				'condition'		=> [ 'layout' => ['1']  ],
			]
		);

		$repeater3 = new Repeater();

		$repeater3->add_control(
			'process_title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater3->add_control(
			'img',
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
		$repeater3->add_control(
			'btn_txt',
			[
				'label'     	=> __( 'Button Text', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'All Services', 'dilabs'),
			]
        );
        $repeater3->add_control(
			'btn_url',
			[
				'label'     	=> __( 'Button url', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( '#', 'dilabs'),
			]
        );
        

        $this->add_control(
			'process3',
			[
				'label' 		=> __( 'Process', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater3->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ process_title }}}',
				'condition'		=> [ 'layout' => ['3']  ],
			]
		);


		$repeater4 = new Repeater();

		
		$repeater4->add_control(
			'process_title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater4->add_control(
			'process_con',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Customize templates and create unique campaigns ' , 'dilabs' ),
			]
        );
        $repeater4->add_control(
			'icon',
			[
				'label'     => __( 'Icon Class', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        
        $this->add_control(
			'process4',
			[
				'label' 		=> __( 'Process', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater4->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ process_title }}}',
				'condition'		=> [ 'layout' => [ '4']  ],
			]
		);

        $this->end_controls_section();


        $this->start_controls_section(
			'Section_header_styling',
			[
				'label' 	=> __( 'Header Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'layout' => ['3','4']  ],
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

        
        //---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'appku' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .cont h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cont h3' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'appku' ),
                'selector' 	=> '{{WRAPPER}} .cont h4, {{WRAPPER}} .cont h3',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4, {{WRAPPER}} .cont h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4, {{WRAPPER}} .cont h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Content Style---------------------------------------//

		$this->start_controls_section(
			'content_style',
			[
				'label' 	=> __( 'Content Style', 'appku' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .cont p' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'content_typography',
				'label' 	=> __( 'Typography', 'appku' ),
                'selector' 	=> '{{WRAPPER}} .cont p',
			]
        );
        $this->add_responsive_control(
			'content_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .cont p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'content_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .cont p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if($settings['layout'] == 1) {
	        echo '<div class="feature-style-one-area">';
		        echo '<div class="container">';
		            echo '<div class="row align-center">';
		                echo '<!-- Single Item -->';
		                echo '<div class="col-lg-4 mb-30">';
		                    echo '<ul class="feature-fun-fact">';

		                    	foreach( $settings['values'] as $single_data ) { 
			                        echo '<li>';
			                            echo '<div class="fun-fact">';
			                                echo '<div class="counter">';
			                                	if( ! empty( $single_data['progressbar_number'] ) ){
				                                    echo '<div class="timer" data-to="'.esc_attr( $single_data['progressbar_number'] ).'" data-speed="4000">'.esc_html( $single_data['progressbar_number'] ).'</div>';
				                                }
			                                    if( ! empty( $single_data['progressbar_shuffix'] ) ){
				                                    echo '<div class="operator">'.esc_html( $single_data['progressbar_shuffix'] ).'</div>';
				                                }

			                                echo '</div>';
			                                if( ! empty( $single_data['progressbar_title'] ) ){
				                                echo '<span class="medium">'.esc_html( $single_data['progressbar_title'] ).'</span>';
				                            }
			                            echo '</div>';
			                        echo '</li>';
			                    }
		                        
		                    echo '</ul>';
		                echo '</div>';
		                echo '<!-- End Single Item -->';

		                foreach( $settings['process2'] as $single_data ) { 
			                echo '<!-- Single Item -->';
			                echo '<div class="col-lg-4 col-md-6 mb-30">';
			                    echo '<div class="feature-style-one cont">';
			                        echo '<div class="info">';
			                            if(!empty($single_data['process_title'])){
							                echo '<h4>'.esc_html($single_data['process_title']).'</h4>';
							            }
							            if(!empty($single_data['process_con'])){
							                echo '<p>'.esc_html($single_data['process_con']).'</p>';
							            }
			                        echo '</div>';
			                        if( ! empty( $single_data['img']['url'] ) ){
				                        echo '<div class="icon">';
				                            echo dilabs_img_tag( array(
												'url'	=> esc_url( $single_data['img']['url'] )
											) );
				                        echo '</div>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			                echo '<!-- End Single Item -->';
		            	}
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif($settings['layout'] == 2 ) {
			echo '<div class="feature-style-two-area default-padding-bottom">';
		        echo '<div class="container">';
		            echo '<div class="feature-two-box mt--50 mt-xs-0">';
		                echo '<div class="row">';
		                	$i = 0;
		                	foreach( $settings['process2'] as $single_data ) { 
		                		$i++;
    							$k = str_pad($i, 2, '0', STR_PAD_LEFT);

			                    echo '<!-- Single Item -->';
			                    echo '<div class="col-lg-4 col-md-6">';
			                        echo '<div class="feature-style-two cont">';
			                            echo '<span>'.esc_attr( $k ).'</span>';
			                           	if( ! empty( $single_data['img']['url'] ) ){
					                        echo '<div class="icon">';
					                            echo dilabs_img_tag( array(
													'url'	=> esc_url( $single_data['img']['url'] )
												) );
					                        echo '</div>';
					                    }
			                            if(!empty($single_data['process_title'])){
							                echo '<h3>'.esc_html($single_data['process_title']).'</h3>';
							            }
			                            if(!empty($single_data['process_con'])){
							                echo '<p>'.esc_html($single_data['process_con']).'</p>';
							            }
			                        echo '</div>';
			                    echo '</div>';
			                }
		                    
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif($settings['layout'] == 3 ) {
			$shape = $settings['bg']['url'] ? $settings['bg']['url'] : '#';
			echo '<div class="feature-style-three-area default-padding-top">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-8 offset-lg-2">';
		                    echo '<div class="site-heading text-center ">';
		                    	if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="container">';
		            echo '<div class="feature-three-items bg-cover text-light" style="background-image: url('.esc_url( $shape ).');">';
		                echo '<div class="row">';
		                    foreach( $settings['process3'] as $single_data ) { 
			                    echo '<!-- Single Item -->';
			                    echo '<div class="col-lg-4">';
			                        echo '<div class="feature-style-three cont">';
			                            if( ! empty( $single_data['img']['url'] ) ){
				                            echo dilabs_img_tag( array(
												'url'	=> esc_url( $single_data['img']['url'] )
											) );
					                    }
			                            if(!empty($single_data['process_title'])){
							                echo '<h3>'.esc_html($single_data['process_title']).'</h3>';
							            }
							            if( ! empty( $single_data['btn_txt'] ) ){
				                            echo '<a href="'.esc_url( $single_data['btn_url'] ).'">'.esc_html( $single_data['btn_txt'] ).' <i class="fas fa-arrow-right"></i></a>';
				                        }
			                        echo '</div>';
			                    echo '</div>';
			                    echo '<!-- End Single Item -->';
			                }
		                    
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		   echo '</div>';
		}else{
			$shape = $settings['bg']['url'] ? $settings['bg']['url'] : '#';
			echo '<div class="feature-style-four-area default-padding">';
		        echo '<div class="shape">';
		            echo '<img src="'.esc_url( $shape ).'" alt="Image Not Found">';
		        echo '</div>';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-4">';
		                	if( ! empty( $settings['title'] ) ){
		                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
		                    }
		                    if( ! empty( $settings['subtitle'] ) ){
		                        echo '<h2 class="title mb-30 mb-md-50">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
		                    }
		                    if( ! empty( $settings['desc'] ) ){
			                    echo '<div class="feature-alert">';
			                    	echo wp_kses_post( $settings['desc'] );
			                    echo '</div>';
			                }
		                echo '</div>';
		                echo '<div class="col-lg-7 offset-lg-1">';
		                    echo '<div class="row cont">';
		                       
		                    	foreach( $settings['process4'] as $single_data ) { 
			                        echo '<div class="col-md-6 mb-30">';
			                            echo '<div class="feature-style-four-item">';
			                                if(!empty($single_data['icon'])){
								                echo wp_kses_post($single_data['icon']);
								            }
			                                if(!empty($single_data['process_title'])){
								                echo '<h4>'.esc_html($single_data['process_title']).'</h4>';
								            }
				                            if(!empty($single_data['process_con'])){
								                echo '<p>'.esc_html($single_data['process_con']).'</p>';
								            }
			                            echo '</div>';
			                        echo '</div>';
			                    }
		                        

		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}