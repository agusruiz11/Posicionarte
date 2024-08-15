<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Banner Widget .
 *
 */
class Dilabs_Banner extends Widget_Base {

	public function get_name() {
		return 'dilabsbanner';
	}

	public function get_title() {
		return __( 'Banner', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Banner_section',
			[
				'label' 	=> __( 'Banner', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout',
			[
				'label' 		=> __( 'Banner Style', 'dilabs' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'dilabs' ),
					'2' 		=> __( 'Style Two', 'dilabs' ),
					'3' 		=> __( 'Style Three', 'dilabs' ),
					'4' 		=> __( 'Style Four', 'dilabs' ),
					'5' 		=> __( 'Style Five', 'dilabs' ),
					'6' 		=> __( 'Style Six', 'dilabs' ),
					'7' 		=> __( 'Style Seven', 'dilabs' ),
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'banner_styling',
			[
				'label' 	=> __( 'Demo Image', 'digalu' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'layout' => ['1', '3', '2', '5','6','7'] ],
			]
        );
        $this->start_controls_tabs(
			'style_tabs1'
		);
		
		$this->start_controls_tab(
			'style_data_1',
			[
				'label' => esc_html__( 'Shape', 'digalu' ),
			]
		);

		$this->add_control(
			'shape_1',
			[
				'label' 		=> __( 'Shape 1', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'shape_2',
			[
				'label' 		=> __( 'Shape 2', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['1', '3', '5'] ],
			]
		);
        
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_data_2',
			[
				'label' => esc_html__( 'Thumb', 'digalu' ),
			]
		);
		$this->add_control(
			'thumb_1',
			[
				'label' 		=> __( 'Thumb 1', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'thumb_2',
			[
				'label' 		=> __( 'Thumb 2', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['1','6','7'] ],
			]
		);
		$this->add_control(
			'thumb_3',
			[
				'label' 		=> __( 'Thumb 3', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['1','6'] ],
			]
		);
		

		$this->end_controls_tab();


	
		$this->end_controls_tabs();
		$this->end_controls_section();




		$this->start_controls_section(
			'demo_content',
			[
				'label' 	=> __( 'Content Area', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				
			]
		);
        $this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Award winning digital marketing agency ', 'dilabs' ),
                'condition'		=> [ 'layout' => ['1', '3', '2', '5','6','7'] ],
			]
        );
        $this->add_control(
			'desc',
			[
				'label' 	=> __( 'Description', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Dissuade ecstatic and properly saw entirely sir why laughter endeavor. In on my jointure horrible margaret suitable he followed speedily. Indeed vanity excuse or mr lovers of on. By offer scale an stuff. Blush be sorry no sight sang lose.', 'dilabs' ),
                'condition'		=> [ 'layout' => ['1', '3', '2', '5','6','7'] ],
			]
        );
        $this->add_control(
			'counter_title',
			[
				'label' 	=> __( 'Counter Title', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Complate Project', 'dilabs' ),
                'condition'		=> [ 'layout' => ['2', '3'] ],
			]
        );
        $this->add_control(
			'counter_number',
			[
				'label' 	=> __( 'Counter', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '2000', 'dilabs' ),
                'condition'		=> [ 'layout' => ['2', '3'] ],
			]
        );
        $this->add_control(
			'suffix',
			[
				'label' 	=> __( 'Suffix', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'k', 'dilabs' ),
                'condition'		=> [ 'layout' => '2' ],
			]
        );
        $this->add_control(
			'v_button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'dilabs' ),
                'condition'		=> [ 'layout' => ['6'] ],
			]
        );
        $this->add_control(
			'v_button_url',
			[
				'label' 	=> __( 'Video Url', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '#', 'dilabs' ),
                'condition'		=> [ 'layout' => ['6'] ],
			]
        );

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'dilabs' ),
                'condition'		=> [ 'layout' => ['2', '1','7'] ],
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'dilabs' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [ 'layout' => ['2', '1','7'] ],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'Banner_section_2',
			[
				'label' 	=> __( 'Banner', 'driller' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'layout' => ['4'] ],
			]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'dilabs' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater->add_control(
            'banner_shape',
            [
                'label'     => __( 'Banner Shape', 'dilabs' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        
        $repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'WORLD BEST <span class="bg-theme">INDUSTRY</span>' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'subtitle', [
				'label' 		=> __( 'Subtitle', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'WORLD BEST <span class="bg-theme">INDUSTRY</span>' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater->add_control(
			'desc', [
				'label' 		=> __( 'Description', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Enthusiastically provide access to client-focused testing procedures through cooperative niches. Intrinsicly promote compelling methods of empowerment before.' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'First Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'dilabs' ),
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'First Button Link', 'dilabs' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'dilabs' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		
		$this->add_control(
			'banners_one',
			[
				'label' 		=> __( 'Banners', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Banner One', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
			]
		);

        $this->end_controls_section();

        

        //---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} h2',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();


		//---------------------------------------Descriptions Style---------------------------------------//

		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Descriptions Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Descriptions Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Descriptions Typography', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} p',
			]
        );
        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Descriptions Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .banner_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Descriptions Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .banner_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Button Style---------------------------------------//

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style 1', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'layout' => [ '4' ] ],
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Text Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn.btn-theme' => '--white: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Text Color Hover', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn.btn-theme:hover' => '--color-heading: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Background Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn.btn-theme' => '--color-primary:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Background Hover Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn.btn-theme::after' => '--white:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} .btn.btn-theme',
			]
		);


        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} .btn.btn-theme',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .btn.btn-theme' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .btn.btn-theme' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .btn.btn-theme' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout'] == '1' ){
			

			$shape_1 = $settings['shape_1']['url'] ? $settings['shape_1']['url'] : '#';

			echo '<div class="banner-style-one-area" style="background-image: url('.esc_url( $shape_1 ).');">';

				if( ! empty( $settings['shape_2']['url'] ) ){
			        echo '<div class="shape-left-top">';
			            echo dilabs_img_tag( array(
							'url'	=> esc_url( $settings['shape_2']['url'] )
						) );
			        echo '</div>';
			    }
		        echo '<!-- Single Item -->';
		        echo '<div class="banner-style-one">';
		            echo '<div class="container">';
		                echo '<div class="content">';
		                    
		                    echo '<div class="row align-center">';
		                        echo '<div class="col-xl-6 col-lg-6">';
		                            echo '<div class="information">';
		                            	if(!empty( $settings['title'] )){
			                                echo '<h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">'.wp_kses_post( $settings['title'] ).'</h2>';
			                            }
			                            if(!empty( $settings['desc'] )){
			                                echo '<p class="wow fadeInUp"  data-wow-delay="900ms" data-wow-duration="400ms">'.wp_kses_post( $settings['desc'] ).'</p>';
			                            }
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
									        $this->add_render_attribute( 'button', 'class', 'btn btn-md btn-gradient animation' );
									        echo '<div class="button mt-40 wow fadeInUp"  data-wow-delay="1200ms" data-wow-duration="400ms">';
					                        	echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['button_text'] ).'</a>';
					                        echo '</div>';
					                    }       
		                            echo '</div>';
		                        echo '</div>';

		                        echo '<div class="col-xl-6 col-lg-6 pl-50 pl-md-15 pl-xs-15">';
		                            echo '<div class="thumb">';
		                            	if( ! empty( $settings['thumb_1']['url'] ) ){
			                                echo '<img class="wow fadeInUp" src="'.esc_url( $settings['thumb_1']['url'] ).'" alt="Image Not Found">';
			                            }
			                            if( ! empty( $settings['thumb_2']['url'] ) ){
			                                echo '<img class="wow fadeInDown" data-wow-delay="500ms" src="'.esc_url( $settings['thumb_2']['url'] ).'" alt="Image Not Found">';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                        
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<!-- End Single Item -->';
		    echo '</div>';
		}elseif( $settings['layout'] == '2' ){
			$thumb_1 = $settings['thumb_1']['url'] ? $settings['thumb_1']['url'] : '#';

			echo '<div class="banner-style-two-area text-light bg-cover overflow-hidden" style="background-image: url('.esc_url( $thumb_1 ).');">';

				if( ! empty( $settings['shape_1']['url'] ) ){
			        echo '<div class="banner-shape-right-bottom">';
			            echo dilabs_img_tag( array(
							'url'	=> esc_url( $settings['shape_1']['url'] )
						) );
			        echo '</div>';
			    }

		        echo '<!-- Single Item -->';
		        echo '<div class="banner-style-two">';
		            echo '<div class="container">';
		                echo '<div class="content">';
		                    echo '<div class="row align-center">';
		                        echo '<div class="col-xl-8">';
		                        	if(!empty( $settings['title'] )){
			                            echo '<h2 class="wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="400ms">'.wp_kses_post( $settings['title'] ).'</h2>';
			                        }
		                        echo '</div>';
		                        echo '<div class="col-xl-4">';
		                            echo '<div class="banner-right-info">';
		                                echo '<div class="banner-list">';
		                                    echo '<div class="fun-fact">';
		                                        echo '<div class="content">';
		                                        	if(!empty( $settings['counter_title'] )){
			                                            echo '<div class="counter">';
			                                            	if(!empty( $settings['counter_number'] )){
				                                                echo '<div class="timer" data-to="'.esc_attr( $settings['counter_number'] ).'" data-speed="2000">'.esc_html( $settings['counter_number'] ).'</div>';
				                                            }
				                                            if(!empty( $settings['suffix'] )){
				                                                echo '<div class="operator">'.esc_html( $settings['suffix'] ).'</div>';
				                                            }
			                                            echo '</div>';
			                                            echo '<span class="medium">'.esc_html( $settings['counter_title'] ).'</span>';
			                                        }
		                                        echo '</div>';
		                                    echo '</div>';
		                                    if(!empty( $settings['desc'] )){
			                                    echo '<p class="wow fadeInUp" data-wow-delay="500ms">'.wp_kses_post( $settings['desc'] ).'</p>';
			                                }
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
										        $this->add_render_attribute( 'button', 'class', 'btn-animation' );

			                                    echo '<div class="button mt-30 wow fadeInUp" data-wow-delay="900ms">';
			                                        echo '<a '.$this->get_render_attribute_string('button').'><i class="fas fa-arrow-right"></i> <span>'.esc_html( $settings['button_text'] ).'</span></a>';
			                                    echo '</div>';
			                                }
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<!-- End Single Item -->';
		    echo '</div>';
		}elseif( $settings['layout'] == '3' ){
			$shape_1 = $settings['shape_1']['url'] ? $settings['shape_1']['url'] : '#';

			echo '<div class="banner-style-three-area overflow-hidden" style="background-image: url('.esc_url( $shape_1 ).');">';

		        echo '<!-- Single Item -->';
		        echo '<div class="banner-style-three pt-150 pt-md-120 pt-xs-60">';
		            echo '<div class="container">';
		                echo '<div class="content">';
		                    
		                    echo '<div class="row align-center">';
		                        echo '<div class="col-xl-6 col-lg-6 pr-50 pr-md-15 pr-xs-15 mt--80 mt-md-0 mt-xs-0">';
		                            echo '<div class="information">';
		                            	if(!empty( $settings['title'] )){
			                                echo '<h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">'.wp_kses_post( $settings['title'] ).'</h2>';
			                            }
			                            if(!empty( $settings['desc'] )){
			                                echo '<p class="wow fadeInUp"  data-wow-delay="900ms" data-wow-duration="400ms">'.wp_kses_post( $settings['desc'] ).'</p>';
			                            }
		                                echo '<div class="newsletter-form wow fadeInDown"  data-wow-delay="1200ms" data-wow-duration="400ms">';
		                                    echo '<form action="#">';
		                                        echo '<input type="email" placeholder="Your Email" class="form-control" name="email">';
		                                        echo '<button type="submit">'.esc_html__( 'Get Started', 'dilabs' ).'</button>  ';
		                                    echo '</form>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';

		                        echo '<div class="col-xl-6 col-lg-6 pl-60 pl-md-15 pl-xs-15">';
		                            echo '<div class="thumb">';
		                            	if( ! empty( $settings['thumb_1']['url'] ) ){
			                                echo '<img class="wow fadeInDown" src="'.esc_url($settings['thumb_1']['url']).'" alt="Thumb">';
			                            }
			                            if( ! empty( $settings['shape_2']['url'] ) ){
			                                echo dilabs_img_tag( array(
												'url'	=> esc_url( $settings['shape_2']['url'] )
											) );
			                            }
		                                echo '<div class="progress-card">';
		                                    echo '<div class="icon">';
		                                        echo '<i class="flaticon-startup-5"></i>';
		                                    echo '</div>';
		                                    echo '<div class="info">';
		                                    	if(!empty( $settings['counter_title'] )){
			                                        echo '<p>'.esc_html( $settings['counter_title'] ).'</p>';
			                                    }
			                                    if(!empty( $settings['counter_number'] )){
			                                        echo '<h4>'.esc_html( $settings['counter_number'] ).'</h4>';
			                                    }
		                                    echo '</div>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<!-- End Single Item -->';
		    echo '</div>';
		}elseif( $settings['layout'] == '4' ){
			echo '<div class="banner-area bg-gray navigation-circle banner-style-four-area zoom-effect overflow-hidden text-light">';
		        echo '<!-- Slider main container -->';
		        echo '<div class="banner-style-one-carousel">';
		            echo '<!-- Additional required wrapper -->';
		            echo '<div class="swiper-wrapper">';
		            	foreach( $settings['banners_one'] as $data ) {
			                echo '<!-- Single Item -->';
			                echo '<div class="swiper-slide banner-style-four">';
			                	if(!empty( $data['banner_img']['url'] )){
				                    echo '<div class="banner-thumb bg-cover shadow dark" style="background: url('.esc_url( $data['banner_img']['url'] ).');"></div>';
				                }
			                    echo '<div class="container">';
			                        echo '<div class="row align-center">';
			                            echo '<div class="col-xl-6 col-lg-7 col-md-10">';
			                                echo '<div class="content">';
			                                	if(!empty($data['title'])){
				                                    echo '<h4>'.esc_html($data['title']).'</h4>';
				                                }
				                                if(!empty($data['subtitle'])){
				                                    echo '<h2>'.esc_html($data['subtitle']).'</h2>';
				                                }
				                                if(!empty($data['desc'])){
				                                    echo '<p>'.esc_html($data['desc']).'</p>';
				                                }
				                                if(!empty($data['button_text'])){
				                                    echo '<div class="button">';
				                                    	echo '<a class="btn btn-theme btn-md animation" href="'.esc_url( $data['button_link']['url'] ).'">'.esc_html($data['button_text']).'</a>';
				                                    echo '</div>';
				                                }

			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                    if(!empty( $data['banner_shape']['url'] )){
				                    echo '<div class="banner-four-shape">';
				                        echo '<img src="'.esc_url( $data['banner_shape']['url'] ).'" alt="Image Not Found">';
				                    echo '</div>';
				                }
			                echo '</div>';
			                echo '<!-- End Single Item -->';
			            }

		            echo '</div>';

		            echo '<!-- Navigation -->';
		            echo '<div class="swiper-button-prev"></div>';
		            echo '<div class="swiper-button-next"></div>';

		        echo '</div>        ';
		    echo '</div>';
		}elseif( $settings['layout'] == '5' ){
			echo '<div class="banner-seo text-center">';
		        echo '<div class="container">';
		            echo '<div class="content-box">';
		                echo '<div class="row align-center">';
		                    echo '<div class="col-lg-8 offset-lg-2 info">';
		                    	if(!empty($settings['title'])){
			                        echo '<h2 class="wow fadeInRight" data-wow-defaul="300ms">'.esc_html($settings['title']).'</h2>';
			                    }
			                    if(!empty($settings['desc'])){
			                        echo '<p class="wow fadeInLeft" data-wow-delay="500ms">'.esc_html($settings['desc']).'</p>';
			                    }
		                    echo '</div>';
		                    echo '<div class="col-lg-10 offset-lg-1">';
		                        echo '<div class="seo-thumb">';
		                            if( ! empty( $settings['thumb_1']['url'] ) ){
								        echo '<img class="wow fadeInDown" src="'.esc_url( $settings['thumb_1']['url'] ).'" alt="Thumb">';  
								    }

		                            if( ! empty( $settings['shape_1']['url'] ) ){
								        echo '<img class="wow fadeInLeft" data-wow-delay="500ms" src="'.esc_url( $settings['shape_1']['url'] ).'" alt="Thumb">';  
								    }
								    if( ! empty( $settings['shape_2']['url'] ) ){
								        echo '<img class="wow fadeInUp" data-wow-delay="800ms" src="'.esc_url( $settings['shape_2']['url'] ).'" alt="Thumb">';  
								    }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout'] == '6' ){
			$shape_1 = $settings['shape_1']['url'] ? $settings['shape_1']['url'] : '#';

			echo '<div class="banner-software text-center text-light" style="background-image: url('.esc_url( $shape_1 ).');">';
		        echo '<div class="container">';
		            echo '<div class="content-box">';
		                echo '<div class="row align-center">';
		                    echo '<div class="col-lg-8 offset-lg-2 info">';
		                    	if(!empty($settings['title'])){
			                        echo '<h2 class="wow fadeInRight" data-wow-defaul="300ms">'.wp_kses_post($settings['title']).'</h2>';
			                    }
			                    if(!empty($settings['desc'])){
			                        echo '<p class="wow fadeInLeft" data-wow-delay="500ms">'.esc_html($settings['desc']).'</p>';
			                    }
			                    if(!empty($settings['v_button_text'])){
			                        echo '<div class="button wow fadeInDown" data-wow-delay="700ms">';
			                            echo '<a href="'.esc_url( $settings['v_button_url'] ).'" class="popup-youtube video-play-button with-text mt-20">';
			                                echo '<div class="effect"></div>';
			                                echo '<span><i class="fas fa-play"></i> '.esc_html($settings['v_button_text']).'</span>';
			                            echo '</a>';
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                    echo '<div class="col-lg-10 offset-lg-1">';
		                        echo '<div class="thumb-inner">';
		                        	if( ! empty( $settings['thumb_1']['url'] ) ){
								        echo '<img class="wow fadeInUp" data-wow-delay="800ms" src="'.esc_url( $settings['thumb_1']['url'] ).'" alt="Thumb">';  
								    }
								    if( ! empty( $settings['thumb_2']['url'] ) ){
								        echo '<img class="wow fadeInLeft" data-wow-delay="500ms" src="'.esc_url( $settings['thumb_2']['url'] ).'" alt="Thumb">';  
								    }
								    if( ! empty( $settings['thumb_3']['url'] ) ){
								        echo '<img class="wow fadeInLeft" data-wow-delay="300ms" src="'.esc_url( $settings['thumb_3']['url'] ).'" alt="Thumb">';  
								    }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		   echo ' </div>';
		}else{
			$shape_1 = $settings['shape_1']['url'] ? $settings['shape_1']['url'] : '#';
			echo '<div class="banner-digital-agency bg-cover overflow-hidden" style="background-image: url('.esc_url( $shape_1 ).');">';

		        echo '<div class="right-angle-thumb">';
		        	if( ! empty( $settings['thumb_1']['url'] ) ){
				        echo '<div class="item wow fadeInRight" style="background-image: url('.esc_url( $settings['thumb_1']['url'] ).');"></div>';  
				    }
				    if( ! empty( $settings['thumb_2']['url'] ) ){
				        echo '<div class="item wow fadeInRight" data-wow-delay="0.3s"  style="background-image: url('.esc_url( $settings['thumb_2']['url'] ).');"></div>';  
				    }
		        echo '</div>';

		        echo '<div class="container">';
		            echo '<div class="content">';
		                
		                echo '<div class="row align-center">';
		                    echo '<div class="col-lg-6">';
		                    	if(!empty($settings['title'])){
			                        echo '<h2 class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="400ms">'.wp_kses_post($settings['title']).'</h2>';
			                    }
			                    if(!empty($settings['desc'])){
			                        echo '<p class="wow fadeInUp"  data-wow-delay="900ms" data-wow-duration="400ms">'.esc_html($settings['desc']).'</p>';
			                    }

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
							        $this->add_render_attribute( 'button', 'class', 'btn btn-md btn-gradient animation' );

                                    echo '<div class="button mt-20 wow fadeInUp"  data-wow-delay="1200ms" data-wow-duration="400ms">';
			                            echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['button_text'] ).'</a>';
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