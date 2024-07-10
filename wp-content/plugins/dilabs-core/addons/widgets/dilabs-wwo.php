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
class Dilabs_Features_Ww0 extends Widget_Base {

	public function get_name() {
		return 'dilabswwo';
	}

	public function get_title() {
		return __( 'Dilabs What we offer', 'dilabs' );
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
					// '2' 			=> __( 'Style Two', 'dilabs' ),
					// '3' 			=> __( 'Style Three', 'dilabs' ),
					// '4' 			=> __( 'Style Four', 'dilabs' ),
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
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
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
				// 'condition'		=> [ 'layout' => ['2','3'] ],
			]
		);
        $repeater2 = new Repeater();

		
		$repeater2->add_control(
			's_title',
			[
				'label'     => __( 'Tag', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Global Reach' , 'dilabs' ),
			]
        );
        $this->add_control(
			'tags',
			[
				'label' 		=> __( 'Tags', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						's_title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ s_title }}}',
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
			'process_subtitle',
			[
				'label'     => __( 'Subtitle', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Subtitle' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'process_con',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default' 		=> __( 'Customize templates and create unique campaigns ' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'icon',
			[
				'label'     => __( 'Icon', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Subtitle' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'skill_title',
			[
				'label'     => __( 'Skill Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Speed Increase' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'skill',
			[
				'label'     => __( 'Skill', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '95' , 'dilabs' ),
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
			]
		);

        $this->end_controls_section();


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

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if($settings['layout'] == 1) {
        	$shape = $settings['bg']['url'] ? $settings['bg']['url'] : '#';
        	
        	echo '<div class="services-style-four-area default-padding bg-dark text-light bg-cover" style="background-image: url('.esc_url( $shape ).');">';

		        echo '<div class="container">';
		            echo '<div class="left-heading mb-50 mb-xs-30">';
		                echo '<div class="row">';
		                    echo '<div class="col-lg-6">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
		                    echo '</div>';
		                    echo '<div class="col-lg-5 offset-lg-1">';
		                        echo '<div class="service-tags">';
		                            echo '<ul>';
		                            	foreach( $settings['tags'] as $single_data ) { 
			                                echo '<li>'.esc_html( $single_data['s_title'] ).'</li>';
			                            }
		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';

		        echo '<div class="container">';
		           echo '<div class="service-four-tabs">';
		                echo '<div class="row">';
		                    echo '<div class="col-lg-4">';
		                        echo '<div class="nav nav-tabs service-four-nav" id="nav-tab" role="tablist">';
		                        	$i = 0;
		                        	foreach( $settings['process2'] as $single_data ) { 
		                        		$i++;

		                        		$is_active = ( $i == 1 ) ? 'active' : '';
		                        		$is_true = ( $i == 1 ) ? 'true' : 'false';

			                            echo '<button class="nav-link '.esc_attr( $is_active ).'" id="nav-id-'.esc_attr( $i ).'" data-bs-toggle="tab" data-bs-target="#tab'.esc_attr( $i ).'" type="button" role="tab" aria-controls="tab'.esc_attr( $i ).'" aria-selected="'.esc_attr( $is_true ).'">';
			                                if(!empty( $single_data['icon'] )){
			                                    echo wp_kses_post( $single_data['icon'] );
			                                }
			                                echo '<div class="info">';
			                                	if(!empty( $single_data['process_title'] )){
				                                    echo esc_html( $single_data['process_title'] );
				                                }
				                                if(!empty( $single_data['process_subtitle'] )){
				                                    echo '<span>'.esc_html( $single_data['process_subtitle'] ).'</span>';
				                                }
			                                echo '</div>';
			                            echo '</button>';
			                        }
		                            

		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="col-lg-8 pl-80 pl-md-15 pl-xs-15">';
		                        echo '<div class="tab-content service-four-items" id="nav-tabContent">';
		                        	$i = 0;
		                        	foreach( $settings['process2'] as $single_data ) { 
		                        		$i++;

		                        		$is_active = ( $i == 1 ) ? 'show active' : '';

			                            echo '<!-- Tab Single Item -->';
			                            echo '<div class="tab-pane fade '.esc_attr( $is_active ).'" id="tab'.esc_attr( $i ).'" role="tabpanel" aria-labelledby="nav-id-'.esc_attr( $i ).'">';
			                                
			                            	if(!empty( $single_data['process_con'] )){
			                                    echo wp_kses_post( $single_data['process_con'] );
			                                }

			                                echo '<div class="progress-box">';
			                                	if(!empty( $single_data['skill_title'] )){
				                                    echo '<h5>'.esc_html( $single_data['skill_title'] ).'</h5>';
				                                }
				                                if(!empty( $single_data['skill'] )){
				                                    echo '<div class="progress">';
				                                        echo '<div class="progress-bar" role="progressbar" data-width="'.esc_attr( $single_data['skill'] ).'"><span>'.esc_html( $single_data['skill'] ).'%</span></div>';
				                                    echo '</div>';
				                                }
			                                echo '</div>';
			                            echo '</div>';
			                            echo '<!-- End Tab Single Item -->';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		           echo '</div>';
		        echo '</div>';

		    echo '</div>';     
		}
	}
}