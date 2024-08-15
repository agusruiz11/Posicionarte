<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Client Logo Widget .
 *
 */
class Dilabs_Client_Logo extends Widget_Base {

	public function get_name() {
		return 'dilabsclientlogo';
	}

	public function get_title() {
		return __( 'Dilabs Client Logo', 'dilabs' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Client Logo', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout',
			[
				'label' 		=> __( 'Style', 'dilabs' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'dilabs' ),
					'2' 		=> __( 'Style Two', 'dilabs' ),
				]
			]
		);
        $this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Planning' , 'dilabs' ),
			]
        );
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Logo', 'dilabs' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		$this->add_control(
			'img',
			[
				'label' 		=> __( 'Background Image', 'dilabs' ),
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
        $this->end_controls_section();

       

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!-----------------------Start partner Logo Slider----------------------->';
        if( $settings['layout'] == '1' ){
	        if( ! empty( $settings['img']['url'] ) ){
		        echo '<div class="brand-area relative overflow-hidden bg-fixed" style="background-image: url( '.esc_url( $settings['img']['url'] ).' );">';
		    }else{
		    	echo '<div class="brand-area relative overflow-hidden bg-fixed">';
		    }
		        echo '<div class="video-bg-live">'; ?>
		            <div class="player" data-property="{videoURL:'gOqlwlQjVis',containment:'.video-bg-live', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:3, opacity:1, quality:'default'}"></div> <?php 

		        echo '</div>';
		        echo '<div class="shadow dark-hard"></div>';
		        echo '<div class="brand-style-one-info text-center">';
		            echo '<div class="container">';
		                echo '<div class="row">';
		                	if(!empty($settings['title'])){
			                    echo '<div class="col-lg-8 offset-lg-2">';
			                        echo '<h2>'.wp_kses_post($settings['title']).'</h2>';
			                    echo '</div>';
			                }
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="brand-style-one bg-gradient text-light">';
		            echo '<div class="container-fill">';
		                echo '<div class="row">';
		                    echo '<div class="col-lg-12">';
		                        echo '<div class="brand-carousel">';
		                            echo '<!-- Additional required wrapper -->';
		                            echo '<div class="swiper-wrapper">';
		                               	foreach( $settings['gallery'] as $singlelogo ) { 
			                                echo '<div class="swiper-slide">';
			                                    echo dilabs_img_tag( array(
						                            'url'   => esc_url( $singlelogo['url'] )
						                        ) );
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
			echo '<div class="clients-area default-padding overflow-hidden">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		            	if(!empty($settings['title'])){
		                    echo '<div class="col-lg-8 offset-lg-2 text-center mb-15">';
		                    	echo '<div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>';
		                        echo '<h2>'.wp_kses_post($settings['title']).'</h2>';
		                    echo '</div>';
		                }
		                echo '<div class="col-lg-10 offset-lg-1">';
		                    echo '<div class="brand-two-carousel">';
		                        echo '<!-- Additional required wrapper -->';
		                       echo '<div class="swiper-wrapper">';
		                            foreach( $settings['gallery'] as $singlelogo ) { 
			                            echo '<!-- Single Item -->';
			                            echo '<div class="swiper-slide">';
			                                echo dilabs_img_tag( array(
					                            'url'   => esc_url( $singlelogo['url'] )
					                        ) );
			                            echo '</div>';
			                            
			                            echo '<!-- End Single Item -->';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
        echo '<!-----------------------End partner Logo Slider----------------------->';
	}
}