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
class Dilabs_About_Us extends Widget_Base {

	public function get_name() {
		return 'dilabsaboutus';
	}

	public function get_title() {
		return __( 'About Us', 'dilabs' );
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
				'label' 	=> __( 'About Us', 'dilabs' ),
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
                'condition'		=> [ 'show_section_heading' => 'yes' ],
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     	=> __( 'Subtitle', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'layout' => ['2', '3','4'] , 'show_section_heading' => 'yes' ],
			]
        );
        $this->add_control(
			'desc',
			[
				'label'     	=> __( 'Description', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 6,
                'default' 		=>  __( 'This is description area', 'dilabs'),
                'condition'		=> [ 'layout' => ['2', '3'] , 'show_section_heading' => 'yes' ],
			]
        );
        $this->add_control(
			'desc2',
			[
				'label'     	=> __( 'Description', 'dilabs' ),
                'type'      	=> Controls_Manager::WYSIWYG,
                'default' 		=>  __( 'This is description area', 'dilabs'),
                'condition'		=> [ 'layout' => ['4'] , 'show_section_heading' => 'yes' ],
			]
        );
        $this->add_control(
			'btn_txt',
			[
				'label'     	=> __( 'Button Text', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'All About Us', 'dilabs'),
                'condition'		=> [ 'layout' => '2'  ],
			]
        );
        $this->add_control(
			'btn_url',
			[
				'label'     	=> __( 'Button url', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( '#', 'dilabs'),
                'condition'		=> [ 'layout' => '2'  ],
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
			'content',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
			]
        );
        $this->add_control(
			'stored_data',
			[
				'label' 		=> __( 'What we do', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'layout' => '1'  ],
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'item',
			[
				'label'     => __( 'Item', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'item_url',
			[
				'label'     => __( 'URL', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'items',
			[
				'label' 		=> __( 'iTEMS', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'item' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ item }}}',
				'condition'		=> [ 'layout' => '2'  ],
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
				'condition'		=> [ 'layout' => '1'  ],
			]
		);
		$this->add_control(
			'vdo_btn_txt',
			[
				'label'     => __( 'Video Button Text', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'layout' => '1'  ],
			]
        );
        $this->add_control(
			'vdo_url',
			[
				'label'     => __( 'Video url', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'layout' => '1'  ],
			]
        );
        $this->add_control(
			'video_thumb',
			[
				'label' 		=> __( 'Thumb', 'dilabs' ),
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
			'video_thumb2',
			[
				'label' 		=> __( 'Thumb 2', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => '3'  ],
			]
		);
		$this->add_control(
			'video_thumb3',
			[
				'label' 		=> __( 'Thumb 3', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => '3'  ],
			]
		);
		$this->add_control(
			'experience',
			[
				'label'     => __( 'Years of experience', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'layout' => ['2', '3','4']  ],
			]
        );
        $this->add_control(
			'item_list',
			[
				'label'     => __( 'Item List', 'dilabs' ),
                'type'      => Controls_Manager::WYSIWYG,
                'condition'		=> [ 'layout' => '3'  ],
			]
        );
        $this->add_control(
			'author_thumb',
			[
				'label' 		=> __( 'Author Thumb', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => '3'  ],
			]
		);
		$this->add_control(
			'author_name',
			[
				'label'     => __( 'Author Name', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'layout' => '3'  ],
			]
        );
        $this->add_control(
			'author_desig',
			[
				'label'     => __( 'Author Designation', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'layout' => '3'  ],
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
				'condition'		=> [ 'layout' => ['2', '3'] , 'show_section_heading' => 'yes' ],
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
                'condition'		=> [ 'layout' => ['2', '3'] ],
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
                'condition'		=> [ 'layout' => ['2', '3'] ],
			]
        );

		$this->add_control(
			'header_subtitle_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h4'	=> 'color: {{VALUE}}!important;',
				],
				'condition'		=> [ 'layout' => '1' ],
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
				'condition'		=> [ 'layout' => ['2', '3'] , 'show_section_heading' => 'yes' ],
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
				'condition'		=> [ 'layout' => ['2', '1'] ],
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
					'{{WRAPPER}} h5' => '--white: {{VALUE}}!important;',
					'{{WRAPPER}} h4' => '--color-heading: {{VALUE}}!important;',
                ],
			]
        );
        
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} h5, {{WRAPPER}} h4',
			]
		);

        $this->add_responsive_control(
			'service_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h5, {{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h5, {{WRAPPER}} h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'condition'		=> [ 'layout' => '1'  ],
			]
		);
		$this->add_control(
			'service_subtitle_color',
			[
				'label' 		=> __( 'Color', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> '--white: {{VALUE}}!important;',
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

        	echo '<div class="about-style-one-area">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		            	if( ! empty( $settings['shape']['url'] ) ){
			                echo '<div class="col-xl-4 col-lg-12">';
			                    echo '<div class="about-style-one bg-dark text-light" style="background-image: url('.esc_url( $settings['shape']['url'] ).');">';
			                        echo '<ul class="check-list-item">';
			                        	foreach( $settings['stored_data'] as $data ) {  
				                            echo '<li>';
				                            	if( ! empty( $data['title'] ) ){
					                                echo '<h5>'.esc_html( $data['title'] ).'</h5>';
					                            }
					                            if( ! empty( $data['content'] ) ){
					                                echo '<p>'.esc_html( $data['content'] ).'</p>';
					                            }
				                            echo '</li>';
				                        }
			                            
			                        echo '</ul>';
			                    echo '</div>';
			                echo '</div>';
			            }
		                echo '<div class="col-xl-8 col-lg-12">';
		                    echo '<div class="about-style-one">';
		                    	if( $settings['show_section_heading'] == 'yes' ) {
			                    	if( ! empty( $settings['title'] ) ){
				                        echo '<h2 class="title pl-120 pl-md-0 pl-xs-0 mb-70 mb-md-40 mb-xs-30 mt-md-50 mt-xs-30">'.wp_kses_post( $settings['title'] ).'</h2>';
				                    }
				                }
			                    if( ! empty( $settings['video_thumb']['url'] ) ){
			                        echo '<div class="thumb bg-cover" style="background-image: url('.esc_url( $settings['video_thumb']['url'] ).');">';
			                            echo '<div class="video-bg-live">'; ?>
			                                <div class="player" data-property="{videoURL:'zwUsFN__jtE',containment:'.video-bg-live', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:105, opacity:1, quality:'default'}"></div>
			                                <?php
			                            echo '</div>';
			                            if( ! empty( $settings['vdo_url'] ) ){
				                            echo '<a href="'.esc_url( $settings['vdo_url'] ).'" class="popup-youtube video-play-button with-text mt-20">';
				                                echo '<div class="effect"></div>';
				                                if( ! empty( $settings['vdo_btn_txt'] ) ){
					                                echo '<span><i class="fas fa-play"></i> '.esc_html( $settings['vdo_btn_txt'] ).'</span>';
					                            }
				                            echo '</a>';
			                        	}
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }elseif( $settings['layout'] == '2' ){
	    	echo '<div class="about-style-two-area">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		            	if( ! empty( $settings['video_thumb']['url'] ) ){
			                echo '<div class="col-lg-6 about-style-two">';
			                    echo '<div class="about-two-thumb">';
			                        echo '<img src="'.esc_url( $settings['video_thumb']['url'] ).'" alt="Image Not Found">';
			                        if( ! empty( $settings['experience'] ) ){
				                        echo '<div class="experience">';
				                            echo '<h2>'.wp_kses_post($settings['experience']  ).'</h2>';
				                        echo '</div>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            }

		                echo '<div class="col-lg-6 about-style-two pl-50 pl-md-15 pl-xs-15 mt-60 mt-xs-40">';
		                    echo '<div class="about-two-info">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
			                    if( ! empty( $settings['desc'] ) ){
			                        echo '<p>'.wp_kses_post( $settings['desc'] ).'</p>';
			                    }
		                        echo '<div class="about-grid-info">';
		                        	if( ! empty( $settings['btn_txt'] ) ) {
					                    	if( ! empty( $settings['btn_url'] ) ) {
									            $this->add_render_attribute( 'button', 'href', esc_url( $settings['btn_url'] ) );
									        }
						            		if( ! empty( $settings['btn_url']['nofollow'] ) ) {
									            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
									        }
									        if( ! empty( $settings['btn_url']['is_external'] ) ) {
									            $this->add_render_attribute( 'button', 'target', '_blank' );
									        }
									        $this->add_render_attribute( 'button', 'class', 'btn-round-animation' );

			                            echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['btn_txt'] ).' <i class="fas fa-arrow-right"></i></a>';
			                        }
		                            echo '<ul class="list-info-item">';
		                                foreach( $settings['items'] as $data ) { 
		                                	if( ! empty( $data['item'] ) ){
				                                echo '<li><h4><a href="'.esc_url( $data['item_url'] ).'">'.esc_html( $data['item'] ).' <i class="fas fa-angle-right"></i></a></h4></li>';
				                            }
			                            }
		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		       echo ' </div>';
		    echo '</div>';
	    }elseif( $settings['layout'] == '3' ){
	    	echo '<div class="about-style-three-area">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-6 about-style-three">';
		                    echo '<div class="about-three-thumb">';
		                    	if( ! empty( $settings['video_thumb']['url'] ) ){
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['video_thumb']['url'] )
									) );
			                    }
			                    if( ! empty( $settings['video_thumb2']['url'] ) ){
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['video_thumb2']['url'] )
									) );
			                    }
			                    if( ! empty( $settings['experience'] ) ){
			                        echo '<div class="experience"><h2>'.wp_kses_post($settings['experience']  ).'</h2></div>';
			                    }
		                        if( ! empty( $settings['video_thumb3']['url'] ) ){
			                        echo '<div class="animated-shape">';
			                            echo dilabs_img_tag( array(
											'url'	=> esc_url( $settings['video_thumb3']['url'] )
										) );
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-lg-5 offset-lg-1 about-style-three">';
		                    echo '<div class="about-three-info">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
			                    if( ! empty( $settings['desc'] ) ){
			                        echo '<p>'.wp_kses_post( $settings['desc'] ).'</p>';
			                    }
			                    if(!empty( $settings['item_list'] )){
			                        echo wp_kses_post( $settings['item_list'] );
			                    }
		                       	echo ' <div class="about-author">';
		                       		if( ! empty( $settings['author_thumb']['url'] ) ){
			                            echo '<div class="thumb">';
			                                echo dilabs_img_tag( array(
												'url'	=> esc_url( $settings['author_thumb']['url'] )
											) );
			                            echo '</div>';
			                        }

		                            echo '<div class="info">';
		                            	if( ! empty( $settings['author_name'] ) ){
			                                echo '<h4>'.esc_html( $settings['author_name'] ).'</h4>';
			                            }
			                            if( ! empty( $settings['author_desig'] ) ){
			                                echo '<span>'.esc_html( $settings['author_desig'] ).'</span>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }else{
	    	echo '<div class="about-style-four-area default-padding">';
		        echo '<div class="container">';
		            echo '<div class="row align-center">';
		            	if( ! empty( $settings['video_thumb']['url'] ) ){
			                echo '<div class="col-lg-6">';
			                    echo '<div class="about-style-four-thumb">';
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['video_thumb']['url'] )
									) );
									if( ! empty( $settings['experience'] ) ){
				                        echo '<div class="experience">';
				                            echo '<h2>'.wp_kses_post($settings['experience']  ).'</h2>';
				                        echo '</div>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            }
		                echo '<div class="col-lg-6">';
		                    echo '<div class="about-style-four-info">';
		                    	if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
			                    if( ! empty( $settings['desc2'] ) ){
			                        echo '<div class="content">'.wp_kses_post( $settings['desc2'] ).'</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }
	}
}