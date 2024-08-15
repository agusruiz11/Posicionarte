<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Testimonials Widget .
 *
 */
class Dilabs_Testimonials extends Widget_Base {

	public function get_name() {
		return 'dilabstestimonials';
	}

	public function get_title() {
		return __( 'Dilabs Testimonials', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'features_section',
			[
				'label'     => __( 'Testimonials', 'dilabs' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Testimonial Style', 'dilabs' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'dilabs' ),
					'2' 		=> __( 'Style Two', 'dilabs' ),
					'3' 		=> __( 'Style Three', 'dilabs' ),
				],
			]
		);
		$this->add_control(
			'title',
			[
				'label'     	=> __( 'Title', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is title area', 'dilabs'),
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     	=> __( 'Subtitle', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is title area', 'dilabs'),
                'condition'		=> [ 'layout' => ['3'] ],
			]
        );
        //----------------------------feddback repeter start--------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'feedback', [
				'label' 		=> __( 'Feedback', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
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
			'slides',
			[
				'label' 		=> __( 'Slides', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Rubaida Kanom', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'		=> [ 'layout' => ['1', '2'] ],
				
			]
		);


		$repeater2 = new Repeater();

		$repeater2->add_control(
			'name', [
				'label' 		=> __( 'Name', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Business Growth' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'avrix' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'avrix' ),
					'two' 		=> __( 'Two Star', 'avrix' ),
					'three' 	=> __( 'Three Star', 'avrix' ),
					'four' 		=> __( 'Four Star', 'avrix' ),
					'five' 	 	=> __( 'Five Star', 'avrix' ),
				],
			]
		);
        $repeater2->add_control(
			'feedback', [
				'label' 		=> __( 'Feedback', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
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
			'slides2',
			[
				'label' 		=> __( 'Slides', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Rubaida Kanom', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'		=> [ 'layout' => ['3'] ],
				
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
				'condition'		=> [ 'layout' => ['1'] ],
			]
		);
		$this->add_control(
			'shape2',
			[
				'label' 		=> __( 'Shape Image 2', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['1'] ],
			]
		);
		$this->add_control(
			'thumb',
			[
				'label' 		=> __( 'Thumb', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['2'] ],
			]
		);
		
		$this->end_controls_section();

		
        /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Testimonials Styling', 'dilabs' ),
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
					'{{WRAPPER}} h4'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} h4',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Feedback', 'dilabs' ),
			]
		);
		$this->add_control(
			'counter_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'counter_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'counter_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'counter_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!------------------------------- Testimonials Area start ------------------------------->';

        if( $settings['layout'] == '1' ){
	        echo '<div class="testimonial-style-two-area  bg-gradient text-light">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-xl-8 offset-xl-2">';
		                    echo '<div class="testimonial-style-two-box default-padding">';
		                    	if( ! empty( $settings['shape']['url'] ) ){
			                        echo '<div class="star-shape">';
			                            echo dilabs_img_tag( array(
											'url'	=> esc_url( $settings['shape']['url'] ),
										) );
			                        echo '</div>';
			                    }
			                    if( ! empty( $settings['shape2']['url'] ) ){
		                            echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['shape2']['url'] ),
									) );
			                    }
		                        if(!empty($settings['title'])){
			                        echo '<div class="site-heaidng">';
			                            echo '<h2 class="title">'.esc_html($settings['title']).'</h2>';
			                        echo '</div>';
			                    }
		                        echo '<div class="testimonial-style-two-carousel swiper">';
		                            echo '<!-- Additional required wrapper -->';
		                            echo '<div class="swiper-wrapper">';
		                            	foreach( $settings['slides'] as $single_data ){
			                                echo '<!-- Single item -->';
			                                echo '<div class="swiper-slide">';
			                                    echo '<div class="testimonial-style-two">';
			                                        
			                                        echo '<div class="item">';
			                                            
			                                            if(!empty($single_data['feedback'])){
							                                echo '<div class="content">';
							                                    echo '<p>'.esc_html( $single_data['feedback'] ).'</p>';
							                                echo '</div>';
							                            }
			                                            echo '<div class="provider">';
			                                                echo '<div class="info">';
			                                                    if(!empty($single_data['name'])){
								                                    echo '<h4>'.wp_kses_post($single_data['name']).'</h4>';
								                                }
								                                if(!empty( $single_data['designation'] )){
							                                        echo '<span>'.esc_html($single_data['designation']).'</span>';
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
		                            echo '<div class="testimonial-two-swiper-nav">';

		                                echo '<!-- Pagination -->';
		                                echo '<div class="testimonial-two-pagination"></div>';

		                                echo '<div class="testimonial-two-button-prev"></div>';
		                                echo '<div class="testimonial-two-button-next"></div>';
		                            echo '</div>';

		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout'] == '2' ){
			echo '<div class="testimonail-style-one-area">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-5">';

		                    echo '<div class="testimonial-style-one-thumb">';
		                    	if(!empty($settings['title'])){
			                        echo '<h2 class="text-large">'.esc_html($settings['title']).'</h2>';
			                    }
			                    if( ! empty( $settings['thumb']['url'] ) ){
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['thumb']['url'] ),
									) );
			                    }
		                    echo '</div>';

		                echo '</div>';
		                echo '<div class="col-lg-6 offset-lg-1 pt-200 pt-md-50 pt-xs-40">';
		                    echo '<div class="testimonial-style-one-carousel swiper">';
		                        echo '<!-- Additional required wrapper -->';
		                        echo '<div class="swiper-wrapper">';

		                        	foreach( $settings['slides'] as $single_data ){
			                            echo '<!-- Single item -->';
			                            echo '<div class="swiper-slide">';
			                                echo '<div class="testimonial-style-one">';
			                                    
			                                    echo '<div class="item">';
			                                        
			                                        if(!empty($single_data['feedback'])){
						                                echo '<div class="content">';
						                                    echo '<p>'.esc_html( $single_data['feedback'] ).'</p>';
						                                echo '</div>';
						                            }
			                                        echo '<div class="provider">';
			                                        	if( ! empty( $single_data['img']['url'] ) ){
				                                            echo '<div class="thumb">';
				                                            	echo dilabs_img_tag( array(
																	'url'	=> esc_url( $single_data['img']['url'] ),
																) );
				                                            echo '</div>';
				                                        }
			                                            echo '<div class="info">';
			                                                if(!empty($single_data['name'])){
							                                    echo '<h4>'.wp_kses_post($single_data['name']).'</h4>';
							                                }
							                                if(!empty( $single_data['designation'] )){
						                                        echo '<span>'.esc_html($single_data['designation']).'</span>';
						                                    }
			                                            echo '</div>';
			                                        echo '</div>';
			                                    echo '</div>';
			                                echo '</div>';
			                            echo '</div>';
			                            echo '<!-- End Single item -->';
			                        }
		                        echo '</div>';

		                        echo '<!-- If we need pagination -->';
		                        echo '<div class="testimonial-style-one-pagination">';
		                            echo '<div class="swiper-pagination"></div>';
		                        echo '</div>';

		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		       echo ' </div>';
		    echo '</div>';
		}else{
			echo '<div class="testimonial-style-three-area default-padding">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-8 offset-lg-2">';
		                    echo '<div class="site-heading text-center">';
		                    	if(!empty($settings['title'])){
			                        echo '<h4 class="sub-title">'.esc_html($settings['title']).'</h4>';
			                    }
			                    if(!empty($settings['subtitle'])){
			                        echo '<h2 class="title">'.esc_html($settings['subtitle']).'</h2>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="container-fill">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-12">';
		                   echo ' <div class="testimonial-stage-carousel swiper">';
		                        echo '<!-- Additional required wrapper -->';
		                        echo '<div class="swiper-wrapper">';

		                            foreach( $settings['slides2'] as $single_data ){
		                            echo '<!-- Single item -->';
		                            echo '<div class="swiper-slide">';
		                                echo '<div class="testimonial-style-three-item">';
		                                    echo '<div class="item">';
		                                        echo '<div class="provider">';
		                                            echo '<div class="thumb">';
		                                                if( ! empty( $single_data['img']['url'] ) ){
			                                            	echo dilabs_img_tag( array(
																'url'	=> esc_url( $single_data['img']['url'] ),
															) );
				                                        }
		                                            echo '</div>';
		                                            echo '<div class="info">';
		                                            	if(!empty($single_data['heading'])){
			                                                echo '<h4>'.esc_html($single_data['heading']).'</h4>';
			                                            }
		                                                echo '<span>';
		                                                if(!empty($single_data['name'])){
			                                                echo '<strong>'.esc_html($single_data['name']).'</strong> / ';
			                                            }
			                                            if(!empty($single_data['name'])){
			                                                echo esc_html($single_data['designation']);
			                                            }
		                                                echo '</span>';
		                                            echo '</div>';
		                                        echo '</div>';
		                                        echo '<div class="review">';
		                                            if( $single_data['client_rating'] == 'one' ){
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                        }elseif( $single_data['client_rating'] == 'two' ){
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                        }elseif( $single_data['client_rating'] == 'three' ){
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                        }elseif( $single_data['client_rating'] == 'four' ){
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="far fa-star"></i>';
			                                        }else{
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                            echo '<i class="fas fa-star"></i>';
			                                        }
		                                        echo '</div>';
		                                        echo '<div class="content">';
		                                        if(!empty($single_data['feedback'])){
					                                echo '<p>'.esc_html( $single_data['feedback'] ).'</p>';
					                            }
                                        	echo '</div>';
                                    	echo '</div>';
                                	echo '</div>';
                            	echo '</div>';
                            	echo '<!-- End Single item -->';
                            }
                        echo '</div>';
        
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
		}

		echo '<!--------------------------------- Testimonials Area end --------------------------------->';
	}
}