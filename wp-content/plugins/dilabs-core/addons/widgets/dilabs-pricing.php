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
 * pricing Plan Widget .
 *
 */
class Dilabs_Pricing_Plan extends Widget_Base {

	public function get_name() {
		return 'dilabspricingplan';
	}

	public function get_title() {
		return __( 'Pricing Table', 'dilabs' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'pricing_section',
			[
				'label' 	=> __( 'Pricing Table', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 	=> __( 'Pricing Style', 'dilabs' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'dilabs' ),
					'2' 		=> __( 'Style Two', 'dilabs' ),
				],
			]
		);

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
			'shape',
			[
				'label' 		=> __( 'shape', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => ['1']  ],
			]
		);

        $this->end_controls_section();

		//-----------------------------------MONTHLY PLAN-----------------------------------//

        $this->start_controls_section(
			'month_section',
			[
				'label' 	=> __( 'Monthly Plan', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'layout' => ['1']  ],
			]
        );
        $this->add_control(
			'm_label',
			[
				'label'     	=> __( 'Monthy Label', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'Monthly', 'dilabs'),
			]
        );
        $repeater = new Repeater();

		$repeater->add_control(
			'm_package', [
				'label' 		=> __( 'Package', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Trial Version' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'm_plan', [
				'label' 		=> __( 'Pricing Plan', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<sup>$</sup>0 <sub>/ Monthly</sub>' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'm_desc', [
				'label' 		=> __( 'Short Description', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Resolve parties but why shewing authentic sang know is minute. ' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater->add_control(
			'm_features', [
				'label' 		=> __( 'Feedback', 'dilabs' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'm_button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Button Text', 'dilabs' )
			]
        );
        $repeater->add_control(
			'm_button_link',
			[
				'label' 		=> __( 'Link', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
			]
		);
		$repeater->add_control(
			'm_make_it_active',
			[
				'label' 		=> __( 'Make it Active ?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$repeater->add_control(
			'm_s_r_b',
			[
				'label' 		=> __( 'Show regular button ?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'plans',
			[
				'label' 		=> __( 'Plans', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'package' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ package }}}',
				
			]
		);

		$this->end_controls_section();

		//-----------------------------------yearly PLAN-----------------------------------//

        $this->start_controls_section(
			'yearly_section',
			[
				'label' 	=> __( 'Yearly Plan', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'layout' => ['1']  ],
			]
        );
        $this->add_control(
			'y_label',
			[
				'label'     	=> __( 'Yearly Label', 'dilabs' ),
                'type'      	=> Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'default' 		=>  __( 'Yearly', 'dilabs'),
			]
        );
        $repeater = new Repeater();

		$repeater->add_control(
			'y_package', [
				'label' 		=> __( 'Package', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Trial Version' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'y_plan', [
				'label' 		=> __( 'Pricing Plan', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<sup>$</sup>0 <sub>/ Monthly</sub>' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'y_desc', [
				'label' 		=> __( 'Short Description', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Resolve parties but why shewing authentic sang know is minute. ' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater->add_control(
			'y_features', [
				'label' 		=> __( 'Feedback', 'dilabs' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'y_button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Button Text', 'dilabs' )
			]
        );
        $repeater->add_control(
			'y_button_link',
			[
				'label' 		=> __( 'Link', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
			]
		);
		$repeater->add_control(
			'y_make_it_active',
			[
				'label' 		=> __( 'Make it Active ?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$repeater->add_control(
			'y_s_r_b',
			[
				'label' 		=> __( 'Show regular button ?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'plans2',
			[
				'label' 		=> __( 'Plans', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'package' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ package }}}',
			]
		);

		$this->end_controls_section();


		//-----------------------------------single PLAN-----------------------------------//

        $this->start_controls_section(
			'p_plan',
			[
				'label' 	=> __( 'Pricing Plan', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'		=> [ 'layout' => ['2']  ],
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'package', [
				'label' 		=> __( 'Package', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Trial Version' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'plan', [
				'label' 		=> __( 'Pricing Plan', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<sup>$</sup>0 <sub>/ Monthly</sub>' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'desc', [
				'label' 		=> __( 'Short Description', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Resolve parties but why shewing authentic sang know is minute. ' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater->add_control(
			'features', [
				'label' 		=> __( 'Feedback', 'dilabs' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Rubaida Kanom' , 'dilabs' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Button Text', 'dilabs' )
			]
        );
        $repeater->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
			]
		);
		$repeater->add_control(
			'make_it_active',
			[
				'label' 		=> __( 'Make it Active ?', 'dilabs' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'dilabs' ),
				'label_off' 	=> __( 'Hide', 'dilabs' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'plans3',
			[
				'label' 		=> __( 'Plans', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'package' 		=> __( 'Marketing Strategy', 'dilabs' ),
					],
				],
				'title_field' 	=> '{{{ package }}}',
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
				'label' 		=> __( 'Gradient Color From', 'dilabs' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => '--color-primary: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_control(
			'header_to_color',
			[
				'label' 		=> __( 'Gradient Color To', 'dilabs' ),
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

        if( $settings['layout'] == '1' ){
	        echo '<div class="pricing-area">';
		        echo '<div class="container">';
		            echo '<div class="row align-center">';
		                echo '<div class="col-xl-5">';
		                    echo '<div class="mb-40">';
		                        if( ! empty( $settings['title'] ) ){
			                        echo '<h4 class="sub-title">'.esc_html( $settings['title'] ).'</h4>';
			                    }
			                    if( ! empty( $settings['subtitle'] ) ){
			                        echo '<h2 class="title">'.wp_kses_post( $settings['subtitle'] ).'</h2>';
			                    }
		                    echo '</div>';
		                    echo '<div class="pricing-tab">';
		                        echo '<nav>';
		                            echo '<div class="nav nav-tabs" id="nav-tab" role="tablist">';
		                            	if( !empty( $settings['m_label'] ) ){
			                                echo '<button class="nav-link active" id="price-montly-tab" data-bs-toggle="tab" data-bs-target="#price-montly" type="button" role="tab" aria-controls="price-montly" aria-selected="true">'.esc_html( $settings['m_label'] ).'</button>';
			                            }
			                            if( !empty( $settings['y_label'] ) ){
			                                echo '<button class="nav-link" id="price-yearly-tab" data-bs-toggle="tab" data-bs-target="#price-yearly" type="button" role="tab" aria-controls="price-yearly" aria-selected="false">'.esc_html( $settings['y_label'] ).'</button>';
			                            }

		                            echo '</div>';
		                        echo '</nav>';
		                        if( ! empty( $settings['shape']['url'] ) ){
			                        echo '<div class="shape-arrow">';
			                            echo dilabs_img_tag( array(
											'url'	=> esc_url( $settings['shape']['url'] ),
										) );
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-xl-7 mb-50 mb-xs-10 pl-50 pl-md-30 pr-md-0 pl-xs-15 mt-md-50 mt-xs-50">';
		                    echo '<div class="tab-content" id="nav-tabContent">';


		                        echo '<div class="tab-pane fade show active" id="price-montly" role="tabpanel" aria-labelledby="price-montly-tab">';
		                        	echo '<div class="row">';

		                        		foreach( $settings['plans'] as $data ) { 
		                        			if( $data['m_make_it_active'] == 'yes' ){
									    		$active_class = 'active';
									    		$r_active_class = '';
									    		if( $data['m_s_r_b'] == 'yes' ){
									    			$btn_class = 'btn btn-border dark btn-sm';
									    		}else{
									    			$btn_class = 'btn btn-gradient btn-sm';
									    		}
									    	}else{
									    		$active_class = '';
									    		$r_active_class = 'active';
									    		$btn_class = 'btn btn-border light btn-sm';
									    	}
			                                echo '<div class="pricing-style-one '.esc_attr( $r_active_class ).' col-md-6">';          
			                                    echo '<div class="item '.esc_attr( $active_class ).' ">';
			                                        echo '<div class="pricing-header">';
			                                            echo '<i class="flaticon-cleaning-6"></i>';
			                                            if(!empty($data['m_package'])){
							                                echo '<h4>'.wp_kses_post($data['m_package']).'</h4>';
							                            }
			                                            if(!empty($data['m_plan'])){
							                                echo '<h2>'.wp_kses_post($data['m_plan']).'</h2>';
							                            }
							                            if(!empty($data['m_desc'])){
				                                            echo '<p>'.esc_html( $data['m_desc'] ).'</p>';
				                                        }
				                                        if(!empty($data['m_button_text'])){
				                                            echo '<div class="button">';
				                                                echo '<a class="'.esc_attr( $btn_class ).'" href="'.esc_url( $data['m_button_link'] ).'">'.esc_html( $data['m_button_text'] ).'</a>';
				                                            echo '</div>';
				                                        }
			                                        echo '</div>';
			                                        echo '<div class="pricing-info">';
			                                            
			                                        	if(!empty($data['m_features'])){
							                                echo wp_kses_post($data['m_features']);
							                            }
			                                        echo '</div>';
			                                    echo '</div>';
			                                echo '</div>';
			                            }
		                            echo '</div>';
		                        echo '</div>';

		                        echo '<div class="tab-pane fade" id="price-yearly" role="tabpanel" aria-labelledby="price-yearly-tab">';
		                            echo '<div class="row">';
		                                foreach( $settings['plans2'] as $data ) { 
		                        			if( $data['y_make_it_active'] == 'yes' ){
									    		$active_class = 'active';
									    		$r_active_class = '';
									    		if( $data['y_s_r_b'] == 'yes' ){
									    			$btn_class = 'btn btn-border dark btn-sm';
									    		}else{
									    			$btn_class = 'btn btn-gradient btn-sm';
									    		}
									    	}else{
									    		$active_class = '';
									    		$r_active_class = 'active';
									    		$btn_class = 'btn btn-border light btn-sm';
									    	}
			                                echo '<div class="pricing-style-one '.esc_attr( $r_active_class ).' col-md-6">';          
			                                    echo '<div class="item '.esc_attr( $active_class ).' ">';
			                                        echo '<div class="pricing-header">';
			                                            echo '<i class="flaticon-cleaning-6"></i>';
			                                            if(!empty($data['y_package'])){
							                                echo '<h4>'.wp_kses_post($data['y_package']).'</h4>';
							                            }
			                                            if(!empty($data['y_plan'])){
							                                echo '<h2>'.wp_kses_post($data['y_plan']).'</h2>';
							                            }
							                            if(!empty($data['y_desc'])){
				                                            echo '<p>'.esc_html( $data['y_desc'] ).'</p>';
				                                        }
				                                        if(!empty($data['y_button_text'])){
				                                            echo '<div class="button">';
				                                                echo '<a class="'.esc_attr( $btn_class ).'" href="'.esc_url( $data['y_button_link'] ).'">'.esc_html( $data['y_button_text'] ).'</a>';
				                                            echo '</div>';
				                                        }
			                                        echo '</div>';
			                                        echo '<div class="pricing-info">';
			                                            
			                                        	if(!empty($data['y_features'])){
							                                echo wp_kses_post($data['y_features']);
							                            }
			                                        echo '</div>';
			                                    echo '</div>';
			                                echo '</div>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<div class="pricing-area pricing-gird">';
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
		            echo '<div class="pricing-style-two-items">';
		                echo '<div class="row">';
		                    foreach( $settings['plans3'] as $data ) { 
                    			if( $data['make_it_active'] == 'yes' ){
						    		$active_class = 'active';
						    		$btn_class = 'btn mt-30 btn-sm btn-light effect';
						    	}else{
						    		$active_class = '';
						    		$btn_class = 'btn mt-30 btn-sm btn-dark effect';
						    	}
			                    echo '<div class="col-xl-4 col-md-6 mb-30">';
			                        echo '<div class="pricing-style-two '.esc_attr( $active_class ).'">';
			                            echo '<div class="pricing-header">';
			                                if(!empty($data['package'])){
				                                echo '<h4>'.wp_kses_post($data['package']).'</h4>';
				                            }
			                                if(!empty($data['desc'])){
	                                            echo '<p>'.esc_html( $data['desc'] ).'</p>';
	                                        }
			                           echo '</div>';
			                            echo '<div class="pricing-content">';
			                                echo '<div class="price">';
			                                    if(!empty($data['plan'])){
					                                echo '<h2>'.wp_kses_post($data['plan']).'</h2>';
					                            }
			                                echo '</div>';
			                                if(!empty($data['features'])){
				                                echo wp_kses_post($data['features']);
				                            }
				                            if(!empty($data['button_text'])){
				                                echo '<a class="'.esc_attr( $btn_class ).'" href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['button_text'] ).'</a>';
				                            }
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                    echo '<!-- End Single Itme -->';
			                }
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}