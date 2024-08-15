<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
/**
 *
 * Contact Form Widget .
 *
 */
class Dilabs_Portfolio_Hireme extends Widget_Base{

	public function get_name() {
		return 'dilabshireme';
	}

	public function get_title() {
		return __( 'Dilabs Contact us', 'dilabs' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'dilabs' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'hireme_section',
			[
				'label' 	=> __( 'Hire me', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Contact Form Title', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Lets talk?', 'dilabs' )
			]
        );
        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Button Text', 'dilabs' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'dilabs' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'dilabs' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'shape_image',
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
		$this->add_control(
			'shape_image2',
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

        
		$this->end_controls_section();
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Contact Form----------------------->';

		echo '<div class="project-deal-area text-center default-padding bg-gray">';
			if(!empty($settings['shape_image']['url'] )){
		        echo '<div class="deal-illustration">';
		            echo dilabs_img_tag( array(
						'url'	=> esc_url( $settings['shape_image']['url'] ),
					) );
		        echo '</div>';
		    }
		    if(!empty($settings['shape_image2']['url'] )){
		        echo '<div class="arrow-illustration">';
		            echo dilabs_img_tag( array(
						'url'	=> esc_url( $settings['shape_image2']['url'] ),
					) );
		        echo '</div>';
		    }
	        echo '<div class="container">';
	            echo '<div class="row">';
	                echo '<div class="col-lg-8 offset-lg-2">';
	                    echo '<div class="project-deal">';
	                        if( ! empty( $settings['title'] ) ){
		                        echo '<h2 class="title">'.wp_kses_post($settings['title']).'</h2>';
		                    }

		                    if( ! empty( $settings['button_text'] ) ) {
			                    $this->add_render_attribute( 'button', 'class', 'btn mt-30 btn-md circle btn-gradient animation' );
			                    if( ! empty( $settings['button_link']['url'] ) ) {
						            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
						        }

						        if( ! empty( $settings['button_link']['nofollow'] ) ) {
						            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
						        }

						        if( ! empty( $settings['button_link']['is_external'] ) ) {
						            $this->add_render_attribute( 'button', 'target', '_blank' );
						        }

		                        echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['button_text'] ).'</a>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
		echo '<!-----------------------End Contact Form----------------------->';
	}
}