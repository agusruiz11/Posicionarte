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
 * qualifications Widget .
 *
 */
class Dilabs_Qualifications extends Widget_Base {

	public function get_name() {
		return 'dilabsqualifications';
	}

	public function get_title() {
		return __( 'Dilabs Team Details', 'dilabs' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_list_section',
			[
				'label' 	=> __( 'Qualifications List', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'p_title', [
				'label' 		=> __( 'Title', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'process_title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Database Integration' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'process_class',
			[
				'label'     => __( 'Icon Class', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '<i class="flaticon-data-management"></i>' , 'dilabs' ),
			]
        );
        
        $this->add_control(
			'processs',
			[
				'label' 		=> __( 'Qualifications', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ process_title }}}',
			]
		);

        $this->end_controls_section();

        //-----------------------progressbar-----------------------//

        $this->start_controls_section(
			'p_list_section',
			[
				'label' 	=> __( 'Progressbar', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'q_title', [
				'label' 		=> __( 'Title', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );

        $repeater2 = new Repeater();

		$repeater2->add_control(
			'pb_title',
			[
				'label'     => __( 'Progressbar Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater2->add_control(
			'pb_number',
			[
				'label'     => __( 'Progressbar Number', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '87' , 'dilabs' ),
			]
        );
        
        $this->add_control(
			'progressbars',
			[
				'label' 		=> __( 'Progressbar', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ pb_title }}}',
			]
		);

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
				'label' 		=> __( 'Title Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'appku' ),
                'selector' 	=> '{{WRAPPER}} h4',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        echo '<div class="team-single-area">';
	        echo '<div class="bottom-info">';
	            echo '<div class="container">';
	                echo '<div class="row">';
	                    echo '<div class="col-xl-6">';
	                    	if(!empty($settings['p_title'])){
		                        echo '<h2>'.esc_html($settings['p_title']).'</h2>';
		                    }

	                        echo '<div class="qualification-grid">';
	                        	foreach( $settings['processs'] as $single_data ) {
		                            echo '<div class="qualification-item">';
		                            	if(!empty( $single_data['process_class'] )){
			                                echo wp_kses_post( $single_data['process_class'] );
			                            }
			                            if(!empty( $single_data['process_title'] )){
			                                echo '<h4>'.esc_html($single_data['process_title']).'</h4>';
			                            }
		                            echo '</div>';
		                        }
	                            
	                        echo '</div>';
	                    echo '</div>';
	                    echo '<div class="col-xl-6">';
	                        echo '<div class="skill-items pl-50 pl-md-0 pl-xs-0 mt-md-50 mt-xs-30">';
	                            if(!empty($settings['q_title'])){
			                        echo '<h2>'.esc_html($settings['q_title']).'</h2>';
			                    }

	                            foreach( $settings['progressbars'] as $single_data ) {
		                            echo '<div class="progress-box">';
		                                if(!empty( $single_data['pb_title'] )){
			                                echo '<h5>'.esc_html($single_data['pb_title']).'</h5>';
			                            }
			                            if(!empty( $single_data['pb_number'] )){
			                                echo '<div class="progress">';
			                                    echo '<div class="progress-bar" role="progressbar" data-width="'.esc_attr($single_data['pb_number']).'">';
			                                         echo '<span>'.esc_html($single_data['pb_number']).'%</span>';
			                                    echo '</div>';
			                                echo '</div>';
			                            }
		                            echo '</div>';
		                        }
	                            echo '<!-- End Progressbar -->';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
        echo '</div>';
	}
}