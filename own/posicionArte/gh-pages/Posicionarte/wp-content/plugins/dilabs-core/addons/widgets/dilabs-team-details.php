<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
/**
 *
 * Team Memeber Info Widget .
 *
 */
class Dilabs_Team_Info extends Widget_Base{

	public function get_name() {
		return 'dilabsmemberinfo';
	}

	public function get_title() {
		return __( 'Dilabs Team Info', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'team_info_section',
			[
				'label' 	=> __( 'Team Information', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'name',
			[
				'label' 	=> __( 'Name', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Juniatur Rahman', 'dilabs' )
			]
        );
        $this->add_control(
			'desig',
			[
				'label' 	=> __( 'Designation', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Graphics Designer', 'dilabs' )
			]
        );
        $this->add_control(
			'info',
			[
				'label' 	=> __( 'About Information', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring house in never fruit up. Pasture imagine my garrets.', 'dilabs' )
			]
        );
        $this->add_control(
			'p_info',
			[
				'label' 	=> __( 'Project Information', 'dilabs' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring house in never fruit up. Pasture imagine my garrets.', 'dilabs' )
			]
        );
        $this->add_control(
			'email',
			[
				'label' 	=> __( 'Email', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'support@avedi.com', 'dilabs' )
			]
        );
        $this->add_control(
			'mobile',
			[
				'label' 	=> __( 'Contact Number', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '+44-20-7328-4499', 'dilabs' )
			]
        );
        $this->add_control(
			'team_image',
			[
				'label' 		=> __( 'Team Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $social_repeater = new \Elementor\Repeater();

		$social_repeater->add_control(
			'social_icon',
			[
				'label' 		=> __( 'Social Icon', 'dilabs' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'fas fa-star',
					'library' 		=> 'solid',
				],
			]
		);

		$social_repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'dilabs' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(
			'social_icon_repeat',
			[
				'label' 	=> __( 'Icon List', 'dilabs' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $social_repeater->get_controls(),
				'default' 	=> [
					[
						'social_icon' 	=> __( 'Icon #1', 'dilabs' ),
					],
					[
						'social_icon' 	=> __( 'Icon #2', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ social_icon.value }}}',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'dilabs' ),
                'rows' 		=> 2,
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

		$this->end_controls_section();

		 /*-----------------------------------------features styling------------------------------------*/

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
					'{{WRAPPER}} h2'	=> '--color-heading: {{VALUE}}!important;'
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} h2',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
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
			'overview_title_padding',
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
				'label' => esc_html__( 'Info', 'dilabs' ),
			]
		);
		$this->add_control(
			'info_color',
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
				'name' 			=> 'info_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'info_margin',
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
			'info_padding',
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
		echo '<!-----------------------Start Teammember Information----------------------->';
			$email  	= $settings['email'];
			$mobile  	= $settings['mobile'];


            $email      = is_email( $email );

            $replace    = array(' ','-',' - ');
            $with       = array('','','');

            $emailurl   = str_replace( $replace, $with, $email );
            $mobileurl  = str_replace( $replace, $with, $mobile );

			echo '<div class="team-single-area">';
				echo '<div class="container">';
					echo '<div class="team-content-top">';
						echo '<div class="row">';
							if(!empty($settings['team_image']['url'])){

								echo '<div class="col-xl-6 left-info">';
			                        echo '<div class="thumb">';
			                            echo dilabs_img_tag( array(
											'url'	=> esc_url( $settings['team_image']['url'] ),
										) );
			                        echo '</div>';
			                    echo '</div>';
			                }
							echo '<div class="col-xl-6">';
								echo '<div class="team-right-info bg-dark text-light">';
									if( ! empty( $settings['name'] ) ){
						                echo '<h2>'.esc_html($settings['name']).'</h2>';
						            }
						            if( ! empty( $settings['desig'] ) ){
						                echo '<span>'.esc_html($settings['desig']).'</span>';
						            }
						            if( ! empty( $settings['info'] ) ){
						                echo '<p>'.esc_html($settings['info']).'</p>';
						            }
						            if( ! empty( $settings['p_info'] ) ){
							            echo '<div class="team-experience mt-30">';
			                                echo '<div class="fun-fact">';
			                                    echo wp_kses_post( $settings['p_info'] );
			                                echo '</div>';
			                            echo '</div>';
			                        }

					                echo '<ul>';
					                	if( ! empty( $emailurl ) ){
						                    echo '<li>';
						                        echo '<strong>'.esc_html__('Email: ','dilabs').'</strong>';
						                        echo '<a href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html($settings['email']).'</a>';
						                    echo '</li>';
						                }
						                if( ! empty( $mobileurl ) ){
						                    echo '<li>';
						                        echo '<strong>'.esc_html__('Phone: ','dilabs').'</strong>';
						                        echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'">'.esc_html($settings['mobile']).'</a>';
						                    echo '</li>';
						                }
					                echo '</ul>';
					                echo '<div class="social">';
					                	if( ! empty( $settings['button_text'] ) ){
						                    echo '<a class="btn circle btn-sm btn-gradient animation" href="'.esc_url( $settings['button_link']['url'] ).'">'.esc_html($settings['button_text']).'</a>';
						                }

					                    if( ! empty( $settings['social_icon_repeat'] ) ){
						                    echo '<div class="share-link">';
						                        echo '<i class="fas fa-share-alt"></i>';
						                        echo '<ul>';
						                        	foreach( $settings['social_icon_repeat'] as $single_icon ){
														$target 	= 	$single_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
														$nofollow 	= $single_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
						                            	echo '<li><a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $single_icon['icon_link']['url'] ).'">';
														\Elementor\Icons_Manager::render_icon( $single_icon['social_icon'], [ 'aria-hidden' => 'true' ] );
														echo '</li></a>';
													}
												echo '</ul>'; 
						                    echo '</div>';
						                }
					                echo '</div>';
					            echo '</div>';
				            echo '</div>';
				        echo '</div>';
		            echo '</div>';
	            echo '</div>';
            echo '</div>';
		echo '<!-----------------------End Teammember Information----------------------->';
	}
}