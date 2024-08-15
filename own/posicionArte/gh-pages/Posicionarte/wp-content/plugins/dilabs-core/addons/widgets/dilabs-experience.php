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
class Dilabs_Experience extends Widget_Base {

	public function get_name() {
		return 'dilabsexperience';
	}

	public function get_title() {
		return __( 'Dilabs Experience', 'dilabs' );
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
				'label' 	=> __( 'Experience', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        //-------------------------------------section heading start-------------------------------------//

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
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
			]
        );
        $this->add_control(
			'features',
			[
				'label'     	=> __( 'Features', 'dilabs' ),
                'type'      	=> Controls_Manager::WYSIWYG,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
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
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Ut fermentum massa justo', 'dilabs' )
			]
        );
        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna .', 'dilabs' )
			]
        );

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'If I face issue then how can I contact with you?', 'dilabs' ),
						'faq_answer'      => __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.' ),
					],
					[
						'faq_question'    => __( 'When Your Consult Business Begins To Grow?', 'dilabs' ),
                        'faq_answer'      => __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.' ),
					],
					[
						'faq_question'    => __( 'Common Misconcep About Building A Team?', 'dilabs' ),
                        'faq_answer'      => __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.' ),
					],
				],
				'title_field' 	=> '{{{ faq_question }}}',
			]
		);
        $this->end_controls_section();

        /*-------------------------------------------------------------Feedback styling--------------------------------------------------------*/

		$this->start_controls_section(
			'Section_header_styling',
			[
				'label' 	=> __( 'Header Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
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



		/*-------------------------------------------------------------Feedback styling--------------------------------------------------------*/

		$this->start_controls_section(
			'progresbar_content_styling',
			[
				'label' 	=> __( 'Progressbar Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'progresbar_tabs1'
		);

		//--------------------first tab start--------------------//

		$this->start_controls_tab(
			'progresbar_title',
			[
				'label' => esc_html__( 'Title', 'dilabs' ),
			]
		);
        $this->add_control(
			'progresbar_from_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .circle-progress .progressbar h4' => '--color-heading: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'progresbar_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .circle-progress .progressbar h4',
			]
		);

        $this->add_responsive_control(
			'progresbar_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .circle-progress .progressbar h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'progresbar_title_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .circle-progress .progressbar h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------first tab end--------------------//


		//--------------------2nd tab start--------------------//

		$this->start_controls_tab(
			'progresbar_tabs2',
			[
				'label' => esc_html__( 'Counter', 'dilabs' ),
			]
		);
		$this->add_control(
			'progresbar_subtitle_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .circle-progress .circle strong'	=> '--color-heading: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'progresbar_subtitle_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .circle-progress .circle strong',
			]
		);

        $this->add_responsive_control(
			'progresbar_subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .circle-progress .circle strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'progresbar_subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .circle-progress .circle strong' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();



		$this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Style', 'dilabs' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Faq Question Color', 'dilabs' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Faq Question Typography', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Faq Question Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Faq Question Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->add_control(
			'faq_answer_color',
			[
				'label' 		=> __( 'Faq Answer Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before'
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography',
				'label' 	=> __( 'Faq Answer Typography', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin',
			[
				'label' 		=> __( 'Faq Answer Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Faq Answer Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();



	}

	protected function render() {

        $settings = $this->get_settings_for_display();



        echo '<div class="experience-area">';
	        echo '<div class="container">';
	            echo '<div class="row">';
	                echo '<div class="col-xl-5">';
	                    echo '<div class="experience-style-one">';
	                        if( ! empty( $settings['title'] ) ){
		                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
		                    }
		                    if( ! empty( $settings['subtitle'] ) ){
		                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
		                    }
		                    if( ! empty( $settings['features'] ) ){
		                        echo wp_kses_post( $settings['features'] );
		                    }
	                        
	                        echo '<div class="circle-progress">';

	                        	foreach( $settings['values'] as $single_data ) {
		                            echo '<div class="progressbar">';
		                            	if(!empty( $single_data['progressbar_number'] )){
			                                echo '<div class="circle" data-percent="'.esc_attr( $single_data['progressbar_number'] ).'"><strong></strong></div>';
			                            }
		                                if(!empty( $single_data['progressbar_title'] )){
			                                echo '<h4>'.esc_html( $single_data['progressbar_title'] ).'</h4>';
			                            }
		                            echo '</div>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	                echo '<div class="col-xl-6 offset-xl-1">';
	                    echo '<div class="faq-style-one">';
				        	echo '<div class="accordion" id="faqAccordion">';
				        		$x = 1;
				                foreach( $settings['faq_repeater'] as $single_data ){
									if( $x == '1' ){
										$ariaexpanded 	= 'true';
										$class 			= 'show';
										$collesed 		= '';
									}else{
										$ariaexpanded 	= 'false';
										$class 			= '';
										$collesed 		= 'collapsed';
									}

					                echo '<div class="accordion-item">';
					                	if( ! empty( $single_data['faq_question'] ) ){
						                    echo '<h2 class="accordion-header" id="heading'.esc_attr($x).'">';
						                        echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.esc_attr($x).'" aria-expanded="'.esc_attr($ariaexpanded).'" aria-controls="collapse'.esc_attr($x).'">'.esc_html($single_data['faq_question']).'</button>';
						                    echo '</h2>';
						                }
						                if( ! empty( $single_data['faq_answer'] ) ){
						                    echo '<div id="collapse'.esc_attr($x).'" class="accordion-collapse collapse '.esc_attr($class).'" aria-labelledby="heading'.esc_attr($x).'" data-bs-parent="#faqAccordion">';
						                        echo '<div class="accordion-body">';
						                            echo '<p>'.esc_html($single_data['faq_answer']).'</p>';
						                        echo '</div>';
						                    echo '</div>';
						                }
					                echo '</div>';
					               $x++;
					            }
				            echo '</div>';
			            echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
	}
}