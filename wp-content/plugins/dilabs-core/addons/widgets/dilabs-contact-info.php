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
 * Contact Tab Widget .
 *
 */
class Dilabs_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'dilabscontactinfo';
	}

	public function get_title() {
		return __( 'Dilabs Contact Info', 'dilabs' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'dilabs' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'contact_information',
			[
				'label' 	=> __( 'Contact Information', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
            'layout',
            [
                'label'     => __( 'Style', 'dilabs' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => [
                    '1'         => __( 'Style One', 'dilabs' ),
                    '2'         => __( 'Style Two', 'dilabs' ),
                ],
            ]
        );
        $this->add_control(
			'section_title',
			[
				'label'     => __( 'Section Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Contact Information', 'dilabs' )
			]
        );
        $this->add_control(
			'section_desc',
			[
				'label'     => __( 'Section Description', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> __( 'Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. ', 'dilabs' )
			]
        );
        $this->add_control(
            'bg_image',
            [
                'label'         => __( 'Background Image', 'dilabs' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'        => true,
                ],
                'default'       => [
                    'url'           => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'shape_image',
            [
                'label'         => __( 'Shape Image', 'dilabs' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'        => true,
                ],
                'default'       => [
                    'url'           => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
			'phone_section',
			[
				'label' 	=> __( 'Phone Info', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'phone_contact_label',
			[
				'label'     => __( 'Phone Label', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Call Now:', 'dilabs' )
			]
        );
        $this->add_control(
			'phone_contact_info',
			[
				'label'     => __( 'Phone Info', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '+1 504-899-8221', 'dilabs' )
			]
        );
        
        $this->end_controls_section();


        $this->start_controls_section(
			'email_section',
			[
				'label' 	=> __( 'Email Info', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'email_contact_label',
			[
				'label'     => __( 'Email Label', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Email Now:', 'dilabs' )
			]
        );
        $this->add_control(
			'email_contact_info',
			[
				'label'     => __( 'Email Info', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'info@dilabs.com', 'dilabs' )
			]
        );
       
        $this->end_controls_section();
        

        $this->start_controls_section(
			'address_section',
			[
				'label' 	=> __( 'Adress Info', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'address_contact_label',
			[
				'label'     => __( 'Address Label', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Location:', 'dilabs' )
			]
        );
        $this->add_control(
			'address_contact_info',
			[
				'label'     => __( 'Address Info', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '1403 Washington Ave, New Orlea <br> ns, LA 70130 United States', 'dilabs' )
			]
        );
        
        $this->end_controls_section();


         //---------------------------------------Social Media---------------------------------------//


        $this->start_controls_section(
            'social_section',
            [
                'label'     => __( 'Social Media', 'dilabs' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'social_label',
            [
                'label'     => __( 'Social Label', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 2,
                'default'   => __( 'Follow Us:', 'dilabs' )
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label'     => __( 'Social Icon', 'dilabs' ),
                'type'      => Controls_Manager::ICONS,
                'default'   => [
                    'value'     => 'fab fa-facebook-f',
                    'library'   => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'icon_link',
            [
                'label'         => __( 'Link', 'dilabs' ),
                'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'dilabs' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->add_control(

            'social_icon_list',
            [
                'label'         => __( 'Social Icon', 'dilabs' ),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'default'       => [
                    [
                        'social_icon' => __( 'Add Social Icon','dilabs' ),
                    ],
                ],
                'title_field'   => '{{{ social_icon.value }}}',
            ]
        );

        $this->end_controls_section();


        //---------------------------------------Contact Form Media---------------------------------------//


        $this->start_controls_section(
            'contact_section',
            [
                'label'     => __( 'Contact Form', 'dilabs' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'form_title',
            [
                'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 2,
                'default'   => __( 'Have Questions?', 'dilabs' )
            ]
        );
        $this->add_control(
            'form_subtitle',
            [
                'label'     => __( 'Subtitle', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 2,
                'default'   => __( 'Send us a Massage', 'dilabs' )
            ]
        );
        $this->add_control(
            'shortcode',
            [
                'label'     => __( 'Shortcode', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows'      => 2,
            ]
        );

        $this->end_controls_section();

        //---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Section Title', 'appku' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'appku' ),
                'selector' 	=> '{{WRAPPER}} h2',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Number Style---------------------------------------//

		$this->start_controls_section(
			'con_style',
			[
				'label' 	=> __( 'Section Description', 'appku' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'number_typography',
				'label' 	=> __( 'Typography', 'appku' ),
                'selector' 	=> '{{WRAPPER}} p',
			]
        );
        $this->add_responsive_control(
			'number_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'number_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

        /*-----------------------------------------section Content styling------------------------------------*/

        $this->start_controls_section(
            'section_con_styling',
            [
                'label'     => __( 'Content Style', 'dilabs' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs1'
        );


        $this->start_controls_tab(
            'style_normal_tab1',
            [
                'label' => esc_html__( 'Label', 'dilabs' ),
            ]
        );
        $this->add_control(
            's_title_color',
            [
                'label'         => __( 'Color', 'dilabs' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} h6, {{WRAPPER}} h4'    => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 's_title_typography',
                'label'         => __( 'Typography', 'dilabs' ),
                'selector'  => '{{WRAPPER}} h6 ,{{WRAPPER}} h4',
            ]
        );

        $this->add_responsive_control(
            's_title_margin',
            [
                'label'         => __( 'Margin', 'dilabs' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} h6, {{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            's_title_padding',
            [
                'label'         => __( 'Padding', 'dilabs' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} h6, {{WRAPPER}} h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'

                ],
            ]
        );
        $this->end_controls_tab();

        //--------------------secound--------------------//

        $this->start_controls_tab(
            'style_hover_tab2',
            [
                'label' => esc_html__( 'Info', 'dilabs' ),
            ]
        );
        $this->add_control(
            's_content_color',
            [
                'label'         => __( 'Color', 'dilabs' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} a, {{WRAPPER}} p'    => 'color: {{VALUE}}!important;',
                ]
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 's_content_typography',
                'label'         => __( 'Typography', 'dilabs' ),
                'selector'  => '{{WRAPPER}} a, {{WRAPPER}} p',
            ]
        );

        $this->add_responsive_control(
            's_content_margin',
            [
                'label'         => __( 'Margin', 'dilabs' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} a, {{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            's_content_padding',
            [
                'label'         => __( 'Padding', 'dilabs' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} a, {{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $bg = $settings['bg_image']['url'];

        if( $settings['layout'] == '1' ){
            echo '<div class="contact-area overflow-hidden default-padding" style="background-image: url('.esc_url($bg).');">';
                echo '<div class="shape-right-bottom">';
                    echo '<img src="'.esc_url($settings['shape_image']['url']).'" alt="Shape">';
                echo '</div>';
                echo '<div class="container">';
                    echo '<div class="row align-center">';
                        echo '<div class="col-tact-stye-one col-lg-5">';
                            echo '<div class="contact-style-one-info">';
                                echo '<div class="mb-40">';
                                    if(!empty($settings['section_title'])){
                                        echo '<h2>'.esc_html($settings['section_title']).'</h2>';
                                    }
                                    if(!empty($settings['section_desc'])){
                                        echo '<p>'.wp_kses_post($settings['section_desc']).'</p>';
                                    }
                                echo '</div>';
                                echo '<ul class="contact-address">';


                                    if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] )){

                                        $phone      = $settings['phone_contact_info'];
                                        $replace        = array(' ','-',' - ');
                                        $with           = array('','','');
                                        $phonelurl       = str_replace( $replace, $with, $phone );
                                        echo '<li class="wow fadeInUp">';
                                            echo '<div class="content">';
                                                echo '<h4 class="title">'.esc_html($settings['phone_contact_label']).'</h4>';
                                                echo '<a href="'.esc_attr( 'tel:'.$phonelurl ).'">'.esc_html($settings['phone_contact_info']).'</a>';
                                            echo '</div>';
                                        echo '</li>';
                                    }

                                    if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] )){
                                        echo '<li class="wow fadeInUp" data-wow-delay="300ms">';
                                            echo '<div class="info">';
                                                echo '<h4 class="title">'.esc_html($settings['address_contact_label']).'</h4>';
                                                echo '<p>'.wp_kses_post($settings['address_contact_info']).'</p>';
                                            echo '</div>';
                                        echo '</li>';
                                    }

                                    if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] )){
                                        $email      = $settings['email_contact_info'];
                                        $email          = is_email( $email );
                                        $replace        = array(' ','-',' - ');
                                        $with           = array('','','');
                                        $emaillurl       = str_replace( $replace, $with, $email );
                                        echo '<li class="wow fadeInUp" data-wow-delay="500ms">';
                                            echo '<div class="info">';
                                                echo '<h4 class="title">'.esc_html($settings['email_contact_label']).'</h4>';
                                                echo '<a href="'.esc_attr( 'mailto:'.$emaillurl ).'">'.esc_html($settings['email_contact_info']).'</a>';
                                            echo '</div>';
                                        echo '</li>';
                                    }

                                    echo '<li class="wow fadeInUp" data-wow-delay="700ms">';
                                        echo '<div class="info">';
                                            if(!empty($settings['social_label'])){
                                                echo ' <h4 class="title">'.esc_html($settings['social_label']).'</h4>';
                                            }

                                            echo '<ul class="social-link">';
                                                foreach( $settings['social_icon_list'] as $social_icon ){
                                                    $social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
                                                    $social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

                                                    echo ' <li>';
                                                        echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

                                                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

                                                        echo '</a> ';
                                                    echo ' </li>';
                                                }
                                                
                                            echo '</ul>';
                                        echo '</div>';
                                    echo '</li>';
                                    
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-tact-stye-one col-lg-6 offset-lg-1">';
                            echo '<div class="contact-form-style-one">';
                                if( !empty( $settings['form_title']) ){
                                    echo '<h4 class="sub-title">'.esc_html($settings['form_title']).'</h4>';
                                }
                                if( !empty( $settings['form_subtitle']) ){
                                    echo ' <h2 class="title">'.esc_html($settings['form_subtitle']).'</h2>';
                                }

                                if( !empty( $settings['shortcode']) ){
                                    echo do_shortcode( $settings['shortcode'] );
                                }  
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }else{
           echo '<div class="contact-area overflow-hidden default-padding" style="background-image: url('.esc_url($bg).');">';
                echo '<div class="shape-right-bottom">';
                    echo '<img src="'.esc_url($settings['shape_image']['url']).'" alt="Shape">';
                echo '</div>';
                echo '<div class="container">';
                    echo '<div class="row align-center">';
                        echo '<div class="col-tact-stye-one col-lg-6">';
                            echo '<div class="contact-form-style-one">';
                                if( !empty( $settings['form_title']) ){
                                    echo '<h4 class="sub-title">'.esc_html($settings['form_title']).'</h4>';
                                }
                                if( !empty( $settings['form_subtitle']) ){
                                    echo ' <h2 class="title">'.esc_html($settings['form_subtitle']).'</h2>';
                                }

                                if( !empty( $settings['shortcode']) ){
                                    echo do_shortcode( $settings['shortcode'] );
                                }  
                            echo '</div>';
                        echo '</div>';
                        
                        echo '<div class="col-tact-stye-one col-lg-5 offset-lg-1 mt--80 mt-md-50 mt-xs-50">';
                            echo '<div class="contact-style-one-info">';
                                echo '<div class="mb-40">';
                                    if(!empty($settings['section_title'])){
                                        echo '<h2>'.esc_html($settings['section_title']).'</h2>';
                                    }
                                    if(!empty($settings['section_desc'])){
                                        echo '<p>'.wp_kses_post($settings['section_desc']).'</p>';
                                    }
                                echo '</div>';
                                echo '<ul class="contact-address">';


                                    if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] )){

                                        $phone      = $settings['phone_contact_info'];
                                        $replace        = array(' ','-',' - ');
                                        $with           = array('','','');
                                        $phonelurl       = str_replace( $replace, $with, $phone );
                                        echo '<li class="wow fadeInUp">';
                                            echo '<div class="content">';
                                                echo '<h4 class="title">'.esc_html($settings['phone_contact_label']).'</h4>';
                                                echo '<a href="'.esc_attr( 'tel:'.$phonelurl ).'">'.esc_html($settings['phone_contact_info']).'</a>';
                                            echo '</div>';
                                        echo '</li>';
                                    }

                                    if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] )){
                                        echo '<li class="wow fadeInUp" data-wow-delay="300ms">';
                                            echo '<div class="info">';
                                                echo '<h4 class="title">'.esc_html($settings['address_contact_label']).'</h4>';
                                                echo '<p>'.wp_kses_post($settings['address_contact_info']).'</p>';
                                            echo '</div>';
                                        echo '</li>';
                                    }

                                    if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] )){
                                        $email      = $settings['email_contact_info'];
                                        $email          = is_email( $email );
                                        $replace        = array(' ','-',' - ');
                                        $with           = array('','','');
                                        $emaillurl       = str_replace( $replace, $with, $email );
                                        echo '<li class="wow fadeInUp" data-wow-delay="500ms">';
                                            echo '<div class="info">';
                                                echo '<h4 class="title">'.esc_html($settings['email_contact_label']).'</h4>';
                                                echo '<a href="'.esc_attr( 'mailto:'.$emaillurl ).'">'.esc_html($settings['email_contact_info']).'</a>';
                                            echo '</div>';
                                        echo '</li>';
                                    }

                                    echo '<li class="wow fadeInUp" data-wow-delay="700ms">';
                                        echo '<div class="info">';
                                            if(!empty($settings['social_label'])){
                                                echo ' <h4 class="title">'.esc_html($settings['social_label']).'</h4>';
                                            }

                                            echo '<ul class="social-link">';
                                                foreach( $settings['social_icon_list'] as $social_icon ){
                                                    $social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
                                                    $social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

                                                    echo ' <li>';
                                                        echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

                                                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

                                                        echo '</a> ';
                                                    echo ' </li>';
                                                }
                                                
                                            echo '</ul>';
                                        echo '</div>';
                                    echo '</li>';
                                    
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                        
                    echo '</div>';
                echo '</div>';
            echo '</div>'; 
        }
	}
}