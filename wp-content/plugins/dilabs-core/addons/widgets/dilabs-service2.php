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
 * service Widget .
 *
 */
class Dilabs_Offer extends Widget_Base {

	public function get_name() {
		return 'dilabsoffer';
	}

	public function get_title() {
		return __( 'Dilabs Service Offer', 'dilabs' );
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
				'label' 	=> __( 'Service Offer', 'dilabs' ),
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
					'2' 			=> __( 'Style Two', 'dilabs' ),
					'3' 			=> __( 'Style Three', 'dilabs' ),
				],
			]
		);
        //-------------------------------------section heading start-------------------------------------//

		$this->add_control(
			'show_section_heading',
			[
				'label' 		=> __( 'Show SSection Header?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'title',
			[
				'label'     	=> __( 'Title', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is title area', 'dilabs'),
                'condition'		=> [ 'show_section_heading' => 'yes'  ],
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     	=> __( 'Subtitle', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'show_section_heading' => 'yes'  ],
			]
        );
        $this->add_control(
			'desc',
			[
				'label'     	=> __( 'Description', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 4,
                'default' 		=>  __( 'This is description area', 'dilabs'),
                'condition'		=> [ 'show_section_heading' => 'yes' ],
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
				'condition'		=> [ 'layout' => ['2','3'] ],
			]
		);
        
		
        $repeater = new Repeater();

		
		$repeater->add_control(
			's_title',
			[
				'label'     => __( 'Service Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Global Reach' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			's_subtitle',
			[
				'label'     => __( 'Service Subtitle', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Upto 100%' , 'dilabs' ),
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
						's_title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ s_title }}}',
			]
		);
        $this->end_controls_section();


        $this->start_controls_section(
			'progressbar_section',
			[
				'label' 	=> __( 'Progressbar Area', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'layout' => ['1'] ],
			]
        );

        $this->add_control(
			'prog_title',
			[
				'label'     => __( 'Progressbar title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'rogressbar title' , 'dilabs' ),
			]
        );
        $this->add_control(
			'prog_number',
			[
				'label'     => __( 'Progressbar Number', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '58' , 'dilabs' ),
			]
        );
        $this->add_control(
			'features',
			[
				'label'     => __( 'Features', 'dilabs' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default' 		=> __( 'rogressbar title' , 'dilabs' ),
			]
        );

        $this->end_controls_section();

         /*-------------------------------------------------------------Feedback styling--------------------------------------------------------*/

		$this->start_controls_section(
			'Section_header_styling',
			[
				'label' 	=> __( 'Header Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_section_heading' => 'yes'  ]
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
			'header_from_color_3',
			[
				'label' 		=> __( 'Color', 'digalu' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2' => '--color-heading: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'header_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} h2',
			]
		);

        $this->add_responsive_control(
			'header_title_margin',
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
			'header_title_padding',
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

		//--------------------first tab end--------------------//


		// //--------------------2nd tab start--------------------//

		$this->start_controls_tab(
			'header_tabs2',
			[
				'label' => esc_html__( 'subtitle', 'dilabs' ),
				'condition'		=> [ 'show_section_heading' => 'yes' ],
			]
		);

		$this->add_control(
			'header_from_color_2',
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
				'name' 			=> 'header_subtitle_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} h4',
			]
		);

        $this->add_responsive_control(
			'header_subtitle_margin',
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
			'header_subtitle_padding',
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

		// //--------------------3rd tab start--------------------//

		$this->start_controls_tab(
			'header_tabs3',
			[
				'label' => esc_html__( 'Descriptoin', 'dilabs' ),
			]
		);
		$this->add_control(
			'header_desc_color',
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
				'name' 			=> 'header_desc_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'header_desc_margin',
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
			'header_desc_padding',
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


		/*-------------------------------------------------------------Feedback styling--------------------------------------------------------*/

		$this->start_controls_section(
			'service_styling',
			[
				'label' 	=> __( 'List Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'service_tabs1'
		);

		//--------------------first tab start--------------------//

		$this->start_controls_tab(
			'service_title',
			[
				'label' => esc_html__( 'Title', 'dilabs' ),
			]
		);
        $this->add_control(
			'service_fcolor',
			[
				'label' 		=> __( 'Color', 'digalu' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h5' => '--color-heading: {{VALUE}}!important;',
                ],
			]
        );
        
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} h5',
			]
		);

        $this->add_responsive_control(
			'service_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_title_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------first tab end--------------------//


		//--------------------2nd tab start--------------------//

		$this->start_controls_tab(
			'service_tabs2',
			[
				'label' => esc_html__( 'Content', 'dilabs' ),
			]
		);
		$this->add_control(
			'service_subtitle_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} ul.list-double li p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_subtitle_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} ul.list-double li p',
			]
		);

        $this->add_responsive_control(
			'service_subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} ul.list-double li p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'service_subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} ul.list-double li p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	        echo '<div class="service-range-area">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-xl-6 col-lg-5">';
		                	if( ! empty( $settings['title'] ) ){
		                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
		                    }
		                    if( ! empty( $settings['subtitle'] ) ){
		                        echo '<h2 class="title mb-30">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
		                    }
		                    if( ! empty( $settings['desc'] ) ){
		                        echo '<p>'.wp_kses_post( $settings['desc'] ).'</p>';
		                    }
		                    echo '<ul class="list-double mt-40">';
		                    	foreach( $settings['process2'] as $single_data ) { 
			                        echo '<li>';
			                        	if(!empty($single_data['s_title'])){
				                            echo '<h5>'.esc_html( $single_data['s_title'] ).'</h5>';
				                        }
				                        if(!empty($single_data['s_subtitle'])){
				                            echo '<p>'.esc_html( $single_data['s_subtitle'] ).'</p>';
				                        }
			                        echo '</li>';
			                    }
		                    echo '</ul>';
		                echo '</div>';
		                echo '<div class="col-lg-6 offset-lg-1 col-xl-5 offset-xl-1">';
		                    echo '<div class="seo-progress text-center">';
		                    	if(!empty( $settings['prog_title'] )){
			                        echo '<div class="circle-progress">';
			                        	if(!empty( $settings['prog_number'] )){
				                            echo '<div class="seo-progressbar">';
				                                echo '<div class="circle" data-percent="'.esc_attr( $settings['prog_number'] ).'">';
				                                    echo '<strong>'.esc_html( $settings['prog_number'] ).'%</strong>';
				                                echo '</div>';
				                            echo '</div>';
				                        }
			                            echo '<h4>'.esc_html( $settings['prog_title'] ).'</h4>';
			                        echo '</div>';
			                    }
		                        
		                        echo '<div class="seo-progess-items">';
		                        	if(!empty( $settings['features'] )){
			                            echo wp_kses_post( $settings['features'] );
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif($settings['layout'] == 2) {

			echo '<div class="about-style-three-area default-padding-bottom">';
		        echo '<div class="container">';
		            echo '<div class="row align-center">';
		                echo '<div class="col-lg-6">';
		                	if( ! empty( $settings['bg']['url'] ) ){
			                    echo '<div class="about-style-three-thumb">';
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['bg']['url'] )
									) );
			                        echo '<i class="fas fa-cog"></i>';
			                    echo '</div>';
			                }
		                echo '</div>';
		                echo '<div class="col-lg-5 offset-lg-1">';
		                    echo '<div class="about-style-three-info">';
		                    	if( ! empty( $settings['title'] ) ){
			                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
			                    if( ! empty( $settings['desc'] ) ){
			                        echo '<p>'.wp_kses_post( $settings['desc'] ).'</p>';
			                    }
		                        echo '<ul class="list-double mt-40">';
		                            foreach( $settings['process2'] as $single_data ) { 
				                        echo '<li>';
				                        	if(!empty($single_data['s_title'])){
					                            echo '<h5>'.esc_html( $single_data['s_title'] ).'</h5>';
					                        }
					                        if(!empty($single_data['s_subtitle'])){
					                            echo '<p>'.esc_html( $single_data['s_subtitle'] ).'</p>';
					                        }
				                        echo '</li>';
				                    }
		                        echo '</ul>';
		                    echo '</div>';
		               echo ' </div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<div class="software-benifits-area overflow-hidden default-padding">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-xl-6 col-lg-5">';
		                    if( ! empty( $settings['title'] ) ){
		                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
		                    }
		                    if( ! empty( $settings['subtitle'] ) ){
		                        echo '<h2 class="title mb-30">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
		                    }
		                    if( ! empty( $settings['desc'] ) ){
		                        echo '<p>'.wp_kses_post( $settings['desc'] ).'</p>';
		                    }
		                    echo '<ul class="list-double mt-40">';

		                        foreach( $settings['process2'] as $single_data ) { 
			                        echo '<li>';
			                        	if(!empty($single_data['s_title'])){
				                            echo '<h5>'.esc_html( $single_data['s_title'] ).'</h5>';
				                        }
				                        if(!empty($single_data['s_subtitle'])){
				                            echo '<p>'.esc_html( $single_data['s_subtitle'] ).'</p>';
				                        }
			                        echo '</li>';
			                    }
		                        
		                    echo '</ul>';
		                echo '</div>';
		                echo '<div class="col-lg-6 offset-lg-1 col-xl-5 offset-xl-1">';
		                	if( ! empty( $settings['bg']['url'] ) ){
			                    echo '<div class="soft-illustration">';
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['bg']['url'] )
									) );
			                    echo '</div>';
			                }
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}