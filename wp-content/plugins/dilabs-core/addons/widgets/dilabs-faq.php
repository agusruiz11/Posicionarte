<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class Dilabs_Faq extends Widget_Base {

	public function get_name() {
		return 'dilabsfaq';
	}

	public function get_title() {
		return __( 'Dilabs Faq', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'dilabs' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
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


        if( ! empty( $settings['faq_repeater'] ) ){

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
        }
	}
}