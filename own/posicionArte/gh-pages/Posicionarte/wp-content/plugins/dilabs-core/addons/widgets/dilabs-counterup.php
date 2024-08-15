<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class Dilabs_Counterup extends Widget_Base {

	public function get_name() {
		return 'dilabscounterup';
	}

	public function get_title() {
		return __( 'Counter Up', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Content', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		

		$repeater = new Repeater();

		$repeater->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'dilabs' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'dilabs' ),
			]
		);
		$repeater->add_control(
			'counter_suffix',
			[
				'label'     => __( 'Number Suffix', 'dilabs' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'k', 'dilabs' ),
			]
		);
		$repeater->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'dilabs' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Years Of Experience', 'dilabs' ),
			]
		);
		$this->add_control(
			'counterup',
			[
				'label' 		=> __( 'Counterup', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_number' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ counter_number }}}',
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
			]
		);
		


		$this->end_controls_section();

        /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Number', 'dilabs' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Colors', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .fun-fact .counter'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .counter',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Ttitle', 'dilabs' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .medium'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .medium',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .medium' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .medium' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'bg',
			[
				'label' => esc_html__( 'Background', 'dilabs' ),
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( 'Background', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .fun-fact'	=> 'background: {{VALUE}}!important;',
				],
			]
        );
        $this->add_responsive_control(
			'bg_margin',
			[
				'label' 		=> __( 'BG Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .fun-fact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'bg_padding',
			[
				'label' 		=> __( 'BG Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .fun-fact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_responsive_control(
			'bg_align',
			[
				'label' 		=> __( 'Alignment', 'dilabs' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'dilabs' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'dilabs' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'dilabs' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'center',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .fun-fact .counter' => 'justify-content: {{VALUE}};',
                ]
			]
		);
        
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="fun-facts-area bg-gradient text-light  default-padding">';
	        echo '<!-- Shape -->';
	        if( ! empty( $settings['shape']['url'] ) ){
                echo '<div class="shape">';
                    echo dilabs_img_tag( array(
						'url'	=> esc_url( $settings['shape']['url'] ),
					) );
                echo '</div>';
            }
	        echo '<!-- End Shape -->';
	        echo '<div class="container">';
	            echo '<div class="item-inner">';
	                echo '<div class="row">';
	                    foreach( $settings['counterup'] as $data ) {  
		                    echo '<div class="col-lg-3 col-md-6 item">';
		                        echo '<div class="fun-fact">';
		                            echo '<div class="counter">';
					                	if( ! empty( $data['counter_number'] ) ){
						                    echo '<div class="timer" data-to="'.esc_attr($data['counter_number']).'" data-speed="2000">'.esc_html($data['counter_number']).'</div>';
						                }
						                if( ! empty( $data['counter_suffix'] ) ){
						                    echo '<div class="operator">'.esc_html($data['counter_suffix']).'</div>';
						                }
					                echo '</div>';
					                if( ! empty( $data['counter_text'] ) ){
						                echo '<span class="medium">'.esc_html($data['counter_text']).'</span>';
						            }
		                        echo '</div>';
		                    echo '</div>';
		                }
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
	}

}