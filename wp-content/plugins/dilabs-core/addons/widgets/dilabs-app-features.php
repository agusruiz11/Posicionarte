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
class Dilabs_App_Features extends Widget_Base {

	public function get_name() {
		return 'dilabsappfeature';
	}

	public function get_title() {
		return __( 'Dilabs App Features', 'dilabs' );
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
			'process_con',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default' 		=> __( 'Customize templates and create unique campaigns ' , 'dilabs' ),
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

        	echo '<div class="overview-area">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-8 offset-lg-2">';
		                    echo '<div class="site-heading text-center">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		       	echo ' <div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-12">';
		                    echo '<div class="overview-items">';
		                        echo '<div class="overview-carousel swiper">';
		                            echo '<!-- Additional required wrapper -->';
		                            echo '<div class="swiper-wrapper">';
		                            	foreach( $settings['process2'] as $single_data ) { 
			                                echo '<!-- Single item -->';
			                                echo '<div class="swiper-slide">';
			                                    echo '<div class="overview-item">';
			                                    	if( ! empty( $single_data['img']['url'] ) ){
				                                        echo '<div class="overview-thumb">';
				                                            echo dilabs_img_tag( array(
																'url'	=> esc_url( $single_data['img']['url'] ),
															) );
				                                        echo '</div>';
				                                    }
			                                        echo '<div class="overview-content">';
			                                        	if(!empty( $single_data['process_title'] )){
						                                    echo '<h2>'.esc_html( $single_data['process_title'] ).'</h2>';
						                                }
						                                if(!empty( $single_data['process_con'] )){
						                                	echo wp_kses_post( $single_data['process_con'] );
						                                }
			                                        echo '</div>';
			                                    echo '</div>';
			                                echo '</div>';
			                                echo '<!-- Single item -->';
			                            }
		                            echo '</div>';

		                            echo '<!-- If we need pagination -->';
		                            echo '<div class="overview-pagination">';
		                                echo '<div class="swiper-pagination"></div>';
		                            echo '</div>';

		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}