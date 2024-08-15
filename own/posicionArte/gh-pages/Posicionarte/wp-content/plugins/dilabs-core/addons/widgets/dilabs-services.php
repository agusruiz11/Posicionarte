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
 * WCU Box Widget .
 *
 */
class Dilabs_Services extends Widget_Base {

	public function get_name() {
		return 'dilabsservices';
	}

	public function get_title() {
		return __( 'Services', 'dilabs' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'services_section',
			[
				'label' 	=> __( 'Services', 'dilabs' ),
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
					'4' 			=> __( 'Style Four', 'dilabs' ),
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
			'btn_txt',
			[
				'label'     	=> __( 'Button Text', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'All Services', 'dilabs'),
                'condition'		=> [ 'show_section_heading' => 'yes', 'layout' => '2'  ],
			]
        );
        $this->add_control(
			'btn_url',
			[
				'label'     	=> __( 'Button url', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( '#', 'dilabs'),
                'condition'		=> [ 'show_section_heading' => 'yes', 'layout' => '2'  ],
			]
        );

		//-------------------------------------section heading end-------------------------------------//


        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'cat',
			[
				'label'     => __( 'Category', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'description'  => __( 'This field for only style 2', 'dilabs' ),
                'show_label' => true,

			]
        );
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'Details Page', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'icon',
			[
				'label' 		=> __( 'Icon', 'dilabs' ),
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
			'services_1',
			[
				'label' 		=> __( 'Services', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'layout' => ['1', '2']  ],
			]
		);

        //--------------------------------------for style 3--------------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
			]
        );
        $repeater->add_control(
			'btn_txt',
			[
				'label'     => __( 'Button Text', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'Details Page', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'icon_class',
			[
				'label'     => __( 'Icon Class', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=>  __( '<i class="flaticon-planning"></i>', 'dilabs'),
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' 		=> __( 'Icon', 'dilabs' ),
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
			'services_2',
			[
				'label' 		=> __( 'Services', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'layout' => ['3','4']  ],
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
				'condition'		=> [ 'layout' => ['2', '3']  ],
			]
		);

		$this->add_control(
			'colmn',
			[
				'label' 		=> __( 'Select Colmn Per row', 'dilabs' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( '4 Columns', 'dilabs' ),
					'2' 			=> __( '3 Columns', 'dilabs' ),
				],
				'condition'		=> [ 'layout' => '2'  ],
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







		/*-------------------------------------------------------------Feedback styling--------------------------------------------------------*/

		$this->start_controls_section(
			'service_styling',
			[
				'label' 	=> __( 'Service Style', 'dilabs' ),
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
					'{{WRAPPER}} a' => '--color-heading: {{VALUE}}!important;',
					'{{WRAPPER}} h4 a' => '--white: {{VALUE}}!important;',
                ],
			]
        );
        
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} a',
			]
		);

        $this->add_responsive_control(
			'service_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} p'	=> '--color-paragraph: {{VALUE}}!important;',
					'{{WRAPPER}} .services-five-item p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_subtitle_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'service_subtitle_margin',
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
			'service_subtitle_padding',
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

		/*--------------------------------------------------------end Feedback styling---------------------------------------------------*/


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout'] == '1' ){

        	if( $settings['show_section_heading'] == 'yes' ) {
	        	echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-8 offset-lg-2">';
		                    echo '<div class="site-heading text-center">';
		                    	if( ! empty( $settings['title'] ) ){
			                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    }

	        echo '<div class="container">';
	            echo '<div class="row">';
	            	foreach( $settings['services_1'] as $data ) {  
		                echo '<div class="col-xl-4 col-lg-6 col-md-6 mb-30">';
		                    echo '<div class="services-style-one">';
		                    	if( ! empty( $data['icon']['url'] ) ){
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $data['icon']['url'] ),
									) );
			                    }
		                        echo '<a href="'.esc_url( $data['url'] ).'" class="btn-arrow"><i class="fas fa-long-arrow-right"></i></a>';
		                        if( ! empty( $data['content'] ) ){
			                        echo '<p>'.esc_html( $data['content'] ).'</p>';
			                    }
			                    if( ! empty( $data['title'] ) ){
			                        echo '<h4><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h4>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            }
	            echo '</div>';
	        echo '</div>';
	    }elseif( $settings['layout'] == '2' ){
	    	$style = $settings['colmn'] == '1' ? '' : 'service-two-grid';
	    	echo '<div class="services-style-two-area '.esc_attr( $style ).'">';

		        echo '<div class="container">';
		            echo '<div class="row">';
		            	if( $settings['show_section_heading'] == 'yes' ) {
			                echo '<div class="col-xl-6 mb-30">';
			                    echo '<div class="service-style-two-heading bg-theme bg-cover text-light" style="background-image: url('.DILABS_PLUGDIRURI . 'assets/img/banner-3.webp);">';

			                        if( ! empty( $settings['title'] ) ){
				                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
				                    }
				                    if( ! empty( $settings['subtitle'] ) ){
				                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
				                    }
				                    if( ! empty( $settings['btn_txt'] ) ){
				                        echo '<div class="button-border-length mt-35">';
				                            echo '<a href="'.esc_url( $settings['btn_url'] ).'" class="btn-arrow-length">'.esc_html( $settings['btn_txt'] ).'</a>';
				                        echo '</div>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            }
			            foreach( $settings['services_1'] as $data ) {  
			                echo '<!-- Start Single Item -->';
			                if( $settings['colmn'] == '1' ){
				                echo '<div class="col-xl-3 col-lg-6 col-md-6 mb-30">';
				            }else{
				            	echo '<div class="col-xl-4 col-lg-6 col-md-6 mb-30">';
				            }
			                    echo '<div class="service-style-two">';
			                    	if( ! empty( $data['icon']['url'] ) ){
			                    		echo '<div class="icon">';
					                        echo dilabs_img_tag( array(
												'url'	=> esc_url( $data['icon']['url'] ),
											) );
										echo '</div>';
				                    }
			                        if( ! empty( $data['content'] ) ){
				                        echo '<p>'.esc_html( $data['content'] ).'</p>';
				                    }
			                        if( ! empty( $data['title'] ) ){
				                        echo '<h4><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h4>';
				                    }
				                    if( ! empty( $data['cat'] ) ){
				                        echo '<span>'.esc_html( $data['cat'] ).'</span>';
				                    }
			                        echo '<a href="'.esc_url( $data['url'] ).'" class="icon-btn"><i class="fas fa-arrow-right"></i></a>';
			                        if( ! empty( $settings['shape']['url'] ) ){
				                        echo '<div class="shape">';
				                            echo dilabs_img_tag( array(
												'url'	=> esc_url( $settings['shape']['url'] ),
											) );
				                        echo '</div>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            } 
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }elseif( $settings['layout'] == '3' ){
	    	echo '<div class="services-style-three-area">';
	    		if( $settings['show_section_heading'] == 'yes' ) {
			        echo '<div class="container">';
			            echo '<div class="row">';
			                echo '<div class="col-lg-8 offset-lg-2">';
			                    echo '<div class="site-heading text-center">';
			                        if( ! empty( $settings['title'] ) ){
				                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
				                    }
				                    if( ! empty( $settings['subtitle'] ) ){
				                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        echo '</div>';
			    }

		        echo '<div class="container">';
		            echo '<div class="row">';
		            	$shape = $settings['shape']['url'] ? $settings['shape']['url'] : '#';
		            	foreach( $settings['services_2'] as $data ) {  
			                echo '<div class="col-xl-4 col-lg-6 col-md-6 mb-30">';
			                    echo '<div class="services-style-three" style="background-image: url('.esc_url( $shape ).');">';
			                    	if( ! empty( $data['icon_class'] ) ){
				                        echo wp_kses_post( $data['icon_class'] );
				                    }
				                    if( ! empty( $data['title'] ) ){
				                        echo '<h4><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h4>';
				                    }
			                        if( ! empty( $data['content'] ) ){
				                        echo '<p>'.esc_html( $data['content'] ).'</p>';
				                    }
				                    if( ! empty( $data['btn_txt'] ) ){
				                        echo '<a href="'.esc_url( $data['url'] ).'" class="btn-service">'.esc_html( $data['btn_txt'] ).' <i class="fas fa-arrow-right"></i></a>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }else{
	    	echo '<div class="services-style-five-area default-padding bg-dark text-light">';
		        echo '<div class="container">';
		            echo '<div class="srevices-five-box">';
		                echo '<div class="row">';
		                    echo '<div class="col-lg-4">';
		                        echo '<div class="services-five-heading">';
		                            if( ! empty( $settings['title'] ) ){
				                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
				                    }
				                    if( ! empty( $settings['subtitle'] ) ){
				                        echo '<h2>'.wp_kses_post( $settings['subtitle'] ).'</h2>';
				                    }
		                        echo '</div>';
		                    echo '</div>';
		                   echo ' <div class="col-lg-7 offset-lg-1">';
		                        echo '<div class="services-style-five-items">';
		                            echo '<div class="row">';

		                                foreach( $settings['services_2'] as $data ) {  
			                                echo '<!-- Signle Item -->';
			                                echo '<div class="col-md-6 services-five-item">';
			                                	if( ! empty( $data['icon']['url'] ) ){
				                                    echo dilabs_img_tag( array(
														'url'	=> esc_url( $data['icon']['url'] )
													) );
				                                }
			                                    if( ! empty( $data['title'] ) ){
							                        echo '<h4><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h4>';
							                    }
			                                    if( ! empty( $data['content'] ) ){
							                        echo '<p>'.esc_html( $data['content'] ).'</p>';
							                    }
			                                    if( ! empty( $data['btn_txt'] ) ){
				                                    echo '<a href="'.esc_url( $data['url'] ).'" class="read-more">'.esc_html( $data['btn_txt'] ).' <i class="fas fa-arrow-right"></i></a>';
				                                }
			                                echo '</div>';
			                                echo '<!-- End Signle Item -->';
			                            }
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