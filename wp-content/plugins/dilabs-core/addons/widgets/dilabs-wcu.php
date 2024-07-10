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
 * wcu Widget .
 *
 */
class Dilabs_Wcu extends Widget_Base {

	public function get_name() {
		return 'dilabswcu';
	}

	public function get_title() {
		return __( 'Dilabs WCU', 'dilabs' );
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
				'label' 	=> __( 'Why chose us', 'dilabs' ),
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
					'4' 			=> __( 'Style Three', 'dilabs' ),
					'5' 			=> __( 'Style Five', 'dilabs' ),
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
                'condition'		=> [ 'layout' => ['1','2', '3','5'] , 'show_section_heading' => 'yes' ],
			]
        );
        $this->add_control(
			'desc',
			[
				'label'     	=> __( 'Description', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 4,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'layout' => ['1'] , 'show_section_heading' => 'yes' ],
			]
        );
        $this->add_control(
			'desc2',
			[
				'label'     	=> __( 'Description', 'dilabs' ),
                'type'      	=> Controls_Manager::WYSIWYG,
                'rows' 			=> 4,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'layout' => ['5'] , 'show_section_heading' => 'yes' ],
			]
        );
        $this->add_control(
			'list',
			[
				'label'     	=> __( 'Features', 'dilabs' ),
                'type'      	=> Controls_Manager::WYSIWYG,
                'default' 		=>  __( 'This is features area', 'dilabs'),
                'condition'		=> [ 'layout' => ['1'] ],
			]
        );
        $this->add_control(
			'slogan',
			[
				'label'     	=> __( 'Slogan', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'layout' => ['4'] ],
			]
        );
        $this->add_control(
			'years',
			[
				'label'     	=> __( 'Years', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'This is subtitle area', 'dilabs'),
                'condition'		=> [ 'layout' => ['4'] ],
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
			'process_content',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'chose_icon_style',
			[
				'label' 		=> __( 'Icon Type', 'dilabs' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'class',
				'options' 		=> [
					'class'  	=> __( 'Class', 'dilabs' ),
					'img' 		=> __( 'Image', 'dilabs' ),
				],
			]
		);
        $repeater->add_control(
			'icon_class', [
				'label' 		=> __( 'Icon Class', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="flaticon-bullhorn"></i>' , 'dilabs' ),
				'label_block' 	=> true,
				'condition'		=> [ 'chose_icon_style' => [ 'class' ] ],
			]
        );
        $repeater->add_control(
			'icon_image',
			[
				'label' 		=> __( 'Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'chose_icon_style' => [ 'img' ] ],
			]
		);
        

        $this->add_control(
			'values',
			[
				'label' 		=> __( 'items', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ process_title }}}',
				'condition'		=> [ 'layout' => ['1'] ],
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
				'condition'		=> [ 'layout' => ['1'] ],
			]
		);
		$this->add_control(
			'img_title', [
				'label' 		=> __( 'Image Title', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '100% Campaign transparency' , 'dilabs' ),
				'label_block' 	=> true,
				'condition'		=> [ 'layout' => ['5'] ],
			]
        );


		$this->add_control(
			'img1',
			[
				'label' 		=> __( 'Image 1', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['2','3', '4','5'] ],
			]
		);
		$this->add_control(
			'img2',
			[
				'label' 		=> __( 'Image 2', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['2'] ],
			]
		);
		$this->add_control(
			'img3',
			[
				'label' 		=> __( 'Image 3', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['2'] ],
			]
		);

		$this->add_control(
			'circle_text',
			[
				'label'     => __( 'Circle text', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'play' , 'dilabs' ),
                'condition'		=> [ 'layout' => ['4'] ],
			]
        );
        $this->add_control(
			'v_btn_txt',
			[
				'label'     => __( 'video button text', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'play' , 'dilabs' ),
                'condition'		=> [ 'layout' => ['2'] ],
			]
        );
        $this->add_control(
			'v_url',
			[
				'label'     => __( 'video url', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
                'condition'		=> [ 'layout' => ['2'] ],
			]
        );

		//-------------------------style 2-------------------------//


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
			'url',
			[
				'label'     => __( 'Details Page', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'process_content',
			[
				'label'     => __( 'Content', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'dilabs' ),
			]
        );
        

        $this->add_control(
			'values2',
			[
				'label' 		=> __( 'items', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ process_title }}}',
				'condition'		=> [ 'layout' => ['2','4'] ],
			]
		);

		//-------------------------style 3-------------------------//


		$repeater2 = new Repeater();

		
		$repeater2->add_control(
			'progressbar_title',
			[
				'label'     => __( 'Progressbar Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Business Idea' , 'dilabs' ),
			]
        );
        
        $repeater2->add_control(
			'progressbar_number',
			[
				'label'     => __( 'Progressbar Number', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '88' , 'dilabs' ),
			]
        );
        

        $this->add_control(
			'values3',
			[
				'label' 		=> __( 'items', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ progressbar_title }}}',
				'condition'		=> [ 'layout' => ['3'] ],
			]
		);

		//-------------------------style 3-------------------------//


		$repeater = new Repeater();

		
		$repeater->add_control(
			'cat_title',
			[
				'label'     => __( 'Features Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Business Idea' , 'dilabs' ),
			]
        );
        
        $repeater->add_control(
			'cat_url',
			[
				'label'     => __( 'Features url', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '#' , 'dilabs' ),
			]
        );
        

        $this->add_control(
			'values4',
			[
				'label' 		=> __( 'items', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ cat_title }}}',
				'condition'		=> [ 'layout' => ['3'] ],
			]
		);

        $this->end_controls_section();

       //--------------------first tab start--------------------//

        $this->start_controls_section(
			'service_heading',
			[
				'label' 	=> __( 'Heading Style', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'header_tabs1'
		);

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
					'{{WRAPPER}} .title.mb-50' => 'color: {{VALUE}}!important;',
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
				'condition'		=> [ 'layout' => ['1', '2', '3'] , 'show_section_heading' => 'yes' ],
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
				'condition'		=> [ 'layout' => ['1'] , 'show_section_heading' => 'yes' ],
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
				'condition'		=> [ 'layout' => ['1','2'] ],
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
					'{{WRAPPER}} .achivement-counter .fun-fact .counter' => '--white: {{VALUE}}!important;',
					'{{WRAPPER}} ul.feature-process li .info a' => '--color-heading: {{VALUE}}!important;',
                ],
			]
        );
        
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_title_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .achivement-counter .fun-fact .counter, {{WRAPPER}} ul.feature-process li .info a',
			]
		);

        $this->add_responsive_control(
			'service_title_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .achivement-counter .fun-fact .counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} ul.feature-process li .info a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .achivement-counter .fun-fact .counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} ul.feature-process li .info a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .achivement-counter .fun-fact .medium'	=> '--white: {{VALUE}}!important;',
					'{{WRAPPER}} ul.feature-process li .info p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'service_subtitle_typography',
		 		'label' 		=> __( 'Typography', 'dilabs' ),
		 		'selector' 	=> '{{WRAPPER}} .achivement-counter .fun-fact .medium, {{WRAPPER}} ul.feature-process li .info p',
			]
		);

        $this->add_responsive_control(
			'service_subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'dilabs' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .achivement-counter .fun-fact .medium' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} ul.feature-process li .info p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .achivement-counter .fun-fact .medium' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} ul.feature-process li .info p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout'] == '1' ){
	        echo '<div class="choose-us-style-one-area">';
		        echo '<div class="container">';
		            echo '<div class="row align-center">';
		                
		                echo '<div class="col-xl-5">';
		                    echo '<div class="achivement-counter" style="background-image: url('.DILABS_PLUGDIRURI . 'assets/img/banner-4.png);">';
		                    	if(!empty($settings['shape']['url'])){
			                        echo '<div class="shape-animated-left-bottom">';
			                            echo dilabs_img_tag( array(
											'url'	=> esc_url( $settings['shape']['url'] ),
										) );
			                        echo '</div>';
			                    }

		                        echo '<ul>';

		                        	foreach( $settings['values'] as $single_data ) { 
			                            echo '<li>';
			                                if($single_data['chose_icon_style'] == 'class' ){
				                            	echo '<div class="icon">';
				                            		echo wp_kses_post($single_data['icon_class']);
				                            	echo '</div>';
				                            }else{
				                            	echo '<div class="icon">';
				                                	echo dilabs_img_tag( array(
														'url'	=> esc_url( $single_data['icon_image']['url'] ),
													) );
												echo '</div>';
				                            }
			                                echo '<div class="fun-fact">';
			                                    echo '<div class="counter">';
			                                    	if(!empty($single_data['process_title'])){
				                                        echo '<div class="timer" data-to="'.esc_attr( $single_data['process_title'] ).'" data-speed="2000">'.esc_html( $single_data['process_title'] ).'</div>';
				                                        echo '<div class="operator">+</div>';
				                                    }
			                                    echo '</div>';
			                                    if(!empty($single_data['process_content'])){
				                                    echo '<span class="medium">'.wp_kses_post( $single_data['process_content'] ).'</span>';
				                                }
			                                echo '</div>';
			                            echo '</li>';
			                        } 
		                        echo '</ul>';
		                    echo '</div>';
		                echo '</div>';

		                echo '<div class="col-xl-6 offset-xl-1 mt-md-50 mt-xs-40">';
		                    echo '<div class="choose-us-card">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h5 class="sub-title">'.esc_html( $settings['title'] ).'</h5>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
			                    if( ! empty( $settings['desc'] ) ){
			                        echo '<p>'.wp_kses_post( $settings['desc'] ).'</p>';
			                    }

			                    if( ! empty( $settings['list'] ) ){
			                        echo wp_kses_post( $settings['list'] );
			                    }

		                    echo '</div>';
		                echo '</div>';

		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout'] == '2' ){
			echo '<div class="choose-us-style-one-area">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-7 choose-us-style-one">';

		                    if( ! empty( $settings['title'] ) ){
		                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
		                    }
		                    if( ! empty( $settings['subtitle'] ) ){
		                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
		                    }

		                    echo '<div class="choose-us-thumb mt-50 mt-xs-40">';
		                    	if(!empty($settings['img1']['url'])){
			                        echo '<img class="wow fadeInUp" src="'.esc_url( $settings['img1']['url'] ).'" alt="Image Not Found">';
			                    }
			                    if(!empty($settings['img2']['url'])){
			                        echo '<img class="wow fadeInDown" src="'.esc_url( $settings['img2']['url'] ).'" alt="Image Not Found">';
			                    }
			                    if(!empty($settings['img3']['url'])){
			                        echo '<img class="wow fadeInRight" src="'.esc_url( $settings['img3']['url'] ).'" alt="Image Not Found">';
			                    }
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-lg-5 pl-70 pl-md-15 pl-xs-15 choose-us-style-one">';
		                	if( ! empty( $settings['v_btn_txt'] ) ){
			                    echo '<div class="curve-text">';
			                        echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" version="1.1"><path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path><text><textPath href="#textPath">'.esc_html( $settings['v_btn_txt'] ).'</textPath></text></svg>';
			                        echo '<a href="'.esc_url( $settings['v_url'] ).'" class="popup-youtube"><i class="fas fa-play"></i></a>';
			                    echo '</div>';
			                }

		                    echo '<ul class="feature-process mt-75 mt-xs-0">';

		                    	foreach( $settings['values2'] as $single_data ) { 
		                    		$url = $single_data['url'] ;
					        		if(!empty($url)){
					        			$url_start_tag 	= '<a href="'.esc_url($url).'">';
					        			$url_end_tag 	= '</a>';
					        		}else{
					        			$url_start_tag 	= '';
					        			$url_end_tag 	= '';
					        		}
			                        echo '<li class="wow fadeInLeft">';
			                            echo '<div class="info">';
			                            	if(!empty($single_data['process_title'])){
				                                echo $url_start_tag.esc_html($single_data['process_title']).$url_end_tag;
				                            }
				                            if(!empty($single_data['process_content'])){
				                                echo '<p>'.esc_html($single_data['process_content']).'</p>';
				                            }
			                            echo '</div>';
			                            if(!empty($url)){
				                            echo '<div class="link">';
				                                echo '<a href="'.esc_url($url).'"><i class="fas fa-long-arrow-right"></i></a>';
				                            echo '</div>';
				                        }
			                        echo '</li>';
			                    }
		                    echo '</ul>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout'] == '3' ){
			echo '<div class="choose-us-style-three-area text-light">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-5">';
		                	if(!empty($settings['img1']['url'])){
			                    echo '<div class="video-thumb mb-30">';
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['img1']['url'] ),
									) );
			                    echo '</div>';
			                }

		                   	echo ' <ul class="list-info-item">';
		                   		foreach( $settings['values4'] as $single_data ) { 
		                   			if(!empty( $single_data['cat_title'] )){
				                        echo '<li>';
				                            echo '<h4><a href="'.esc_url( $single_data['cat_url'] ).'">'.esc_html( $single_data['cat_title'] ).' <i class="fas fa-angle-right"></i></a></h4>';
				                        echo '</li>';
				                    }
			                    }
		                    echo '</ul>';
		                echo '</div>';
		                echo '<div class="col-lg-6 offset-lg-1 mt-md-50 mt-xs-50">';
		                    echo '<div class="choose-us-syle-three">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
		                        echo '<div class="skill-items mt-40">';
		                            foreach( $settings['values3'] as $single_data ) { 
			                            echo '<!-- Progress Bar Start -->';
			                            echo '<div class="progress-box">';
			                            	if(!empty( $single_data['progressbar_title'] )){
				                                echo '<h5>'.esc_html( $single_data['progressbar_title'] ).'</h5>';
				                            }
				                            if(!empty( $single_data['progressbar_number'] )){
				                                echo '<div class="progress">';
				                                    echo '<div class="progress-bar" role="progressbar" data-width="'.esc_attr( $single_data['progressbar_number'] ).'">';
				                                         echo '<span>'.esc_html( $single_data['progressbar_number'] ).'%</span>';
				                                    echo '</div>';
				                                echo '</div>';
				                            }
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout'] == '4' ){
			echo '<div class="choose-us-style-two-area text-light">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-xl-4">';
		                    echo '<div class="choose-us-style-two">';
		                    	if( ! empty( $settings['title'] ) ){
			                        echo '<h2 class="title mb-50">'.esc_html( $settings['title'] ).'</h2>';
			                    }

		                        echo '<ul class="check-list-item">';
		                        	foreach( $settings['values2'] as $single_data ) { 
			                            echo '<li>';
			                            	if( ! empty( $single_data['process_title'] ) ){
				                                echo '<h4>'.esc_html( $single_data['process_title'] ).'</h4>';
				                            }
				                            if( ! empty( $single_data['process_content'] ) ){
				                                echo '<p>'.esc_html( $single_data['process_content'] ).'</p>';
				                            }
			                            echo '</li>';
			                        }
		                        echo '</ul>';
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-xl-7 offset-xl-1 text-end">';
		                    echo '<div class="choose-us-style-two-thumb">';
		                    	if( ! empty( $settings['circle_text'] ) ){
			                        echo '<div class="curve-text">';
			                            echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" version="1.1"><path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path><text><textPath href="#textPath">'.esc_html( $settings['circle_text'] ).'</textPath></text></svg>';
			                        echo '</div>';
			                    }
			                    if( ! empty( $settings['slogan'] ) ){
			                        echo '<h4>'.esc_html( $settings['slogan'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['years'] ) ){
			                        echo '<h2 class="text-path">'.esc_html( $settings['years'] ).'</h2>';
			                    }
			                    if(!empty($settings['img1']['url'])){
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['img1']['url'] ),
									) );
				                }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<div class="choose-us-style-four-area default-padding">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-6">';
		                    echo '<div class="choose-us-four-thumb">';
		                        if( ! empty( $settings['img_title'] ) ){
			                        echo '<h3>'.esc_html( $settings['img_title'] ).'</h3>';
			                    }
		                        if(!empty($settings['img1']['url'])){
			                        echo dilabs_img_tag( array(
										'url'	=> esc_url( $settings['img1']['url'] ),
									) );
				                }
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-lg-5 offset-lg-1">';
		                    echo '<div class="choose-us-four-info">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
			                    if( ! empty( $settings['desc2'] ) ){
			                    	echo wp_kses_post( $settings['desc2'] );
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}