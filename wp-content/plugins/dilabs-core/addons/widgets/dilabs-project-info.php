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
 * Project Inforamtion Widget .
 *
 */
class Dilabs_Project_Info extends Widget_Base {

	public function get_name() {
		return 'dilabsprojectinfo';
	}

	public function get_title() {
		return __( 'Dilabs Project Info', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label'     => __( 'Project Info', 'dilabs' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'p_image',
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
			's_image',
			[
				'label' 		=> __( 'Shape Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$project_info = new \Elementor\Repeater();

		$project_info->add_control(
			'info_label',
            [
				'label'         => __( 'Info Label', 'dilabs' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Date' , 'dilabs' ),
				'label_block'   => true,
			]
		);
		$project_info->add_control(
			'info_content',
            [
				'label'         => __( 'Information', 'dilabs' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '25 February, 2022' , 'dilabs' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'informations',
			[
				'label' 	=> __( 'Icon List', 'dilabs' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $project_info->get_controls(),
				'default' 	=> [
					[
						'info_label' 	=> __( 'Client', 'dilabs' ),
					],
					[
						'info_label' 	=> __( 'Date', 'dilabs' ),
					],
					[
						'info_label' 	=> __( 'Address', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ info_label }}}',
			]
		);

		

        $this->end_controls_section();


       

        //-----------------------------------------Label styling-----------------------------------------//


        $this->start_controls_section(
			'label_styling',
			[
				'label' 	=> __( 'Label Styling', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'label_color',
			[
				'label' 		=> __( 'Label Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-info li'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'label_typography',
		 		'label' 		=> __( 'Label Typography', 'dilabs' ),
		 		'selector' 		=> '{{WRAPPER}} .project-info li',
			]
		);

        $this->add_responsive_control(
			'label_margin',
			[
				'label' 		=> __( 'Label Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );

        $this->add_responsive_control(
			'label_padding',
			[
				'label' 		=> __( 'Label Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->end_controls_section();
        //-----------------------------------------Value styling-----------------------------------------//


        $this->start_controls_section(
			'value_styling',
			[
				'label' 	=> __( 'Value Styling', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'value_color',
			[
				'label' 		=> __( 'Value Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-info li span'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'value_typography',
		 		'label' 		=> __( 'Value Typography', 'dilabs' ),
		 		'selector' 		=> '{{WRAPPER}} .project-info li span',
			]
		);

        $this->add_responsive_control(
			'value_margin',
			[
				'label' 		=> __( 'Value Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );

        $this->add_responsive_control(
			'value_padding',
			[
				'label' 		=> __( 'Value Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        echo '<!-----------------------Start Project Inforamtion Area----------------------->';


        echo '<div class="project-details-area">';
	        echo '<div class="container">';
	            echo '<div class="row">';
	                echo '<div class="col-lg-12">';
	                    echo '<div class="project-top-info">';
	                        echo '<div class="row">';
	                        	if(!empty($settings['p_image']['url'])){
		                            echo '<div class="col-xl-8 pr-50 pr-md-15 pr-xs-15">';
		                                echo '<div class="project-thumb">';
		                                    echo dilabs_img_tag( array(
												'url'	=> esc_url( $settings['p_image']['url'] ),
											) );
		                                echo '</div>';
		                            echo '</div>';
		                        }
	                            echo '<div class="col-xl-4">';
	                                echo '<ul class="gallery-project-basic-info" style="background-image: url('.esc_url( $settings['s_image']['url'] ).');">';
	                                   foreach( $settings['informations'] as $info ){
						            		if(!empty( $info['info_label'] && $info['info_content'] )){
								                echo'<li>'.esc_html($info['info_label']).' <span>'.esc_html($info['info_content']).'</span></li>';
								            }
							            }
	                                echo '</ul>';
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
        echo '</div>';

		echo '<!-----------------------Start Project Inforamtion Area----------------------->';

	}

}