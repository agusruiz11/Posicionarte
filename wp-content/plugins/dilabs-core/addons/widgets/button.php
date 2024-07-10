<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget .
 *
 */
class Dilabs_Button extends Widget_Base {

	public function get_name() {
		return 'dilabsbutton';
	}

	public function get_title() {
		return __( 'Button', 'dilabs' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'button_style',
			[
				'label' 	=> __( 'Button Style', 'dilabs' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'dilabs' ),
					'2' 		=> __( 'Style Two', 'dilabs' ),
				],
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'dilabs' )
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
			]
		);

		$this->add_control(
			'show_arrow_icon',
			[
				'label' 		=> __( 'Show Arrow Icon?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'dilabs' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 			=> [
						'title' 		=> __( 'Left', 'dilabs' ),
						'icon' 			=> 'fa fa-align-left',
					],
					'center' 		=> [
						'title' 		=> __( 'Center', 'dilabs' ),
						'icon' 			=> 'fa fa-align-center',
					],
						'right' 	=> [
						'title' 		=> __( 'Right', 'dilabs' ),
						'icon' 			=> 'fa fa-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .banner_btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .banner_btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn .btn-bg,{{WRAPPER}} .vs-btn,{{WRAPPER}} .banner_btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn .btn-shape' => 'background-color:{{VALUE}}',
                ],
				'condition'		=> [ 'button_style'	=> '1' ]
			]
        );

        $this->add_control(
			'button_bg_hover_color_one',
			[
				'label' 		=> __( 'Button Background Hover Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .banner_btn:hover' => 'background-color:{{VALUE}}',
                ],
				'condition'		=> [ 'button_style'	=> '2' ]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn,{{WRAPPER}} .banner_btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'dilabs' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn,{{WRAPPER}} .{{WRAPPER}} .banner_btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .banner_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .banner_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .banner_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'btn-wrapper' );
        $this->add_render_attribute( 'wrapper', 'class', esc_attr( $settings['button_align'] ) );

		if( $settings['button_style'] == '1' ){
	        $this->add_render_attribute( 'button', 'class', 'dilabs vs-btn' );
		}else{
			$this->add_render_attribute( 'button', 'class', 'banner_btn' );
		}

        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

        echo '<!-- Button -->';
        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
            if( ! empty( $settings['button_text'] ) ) {
                echo '<a '.$this->get_render_attribute_string('button').'>';
					echo esc_html( $settings['button_text'] );
					if( $settings['show_arrow_icon'] == 'yes' ){
						echo '<i class="far fa-long-arrow-right"></i>';
					}
					if( $settings['button_style'] == '1' ){
						echo ' ';
					}
				echo '</a>';
            }
        echo '</div>';
        echo '<!-- End Button -->';
	}
}