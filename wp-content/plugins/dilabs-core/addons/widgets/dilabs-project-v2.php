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
 * Project Box Widget .
 *
 */
class Dilabs_Project_V2 extends Widget_Base {

	public function get_name() {
		return 'dilabsproject2';
	}

	public function get_title() {
		return __( 'Dilabs Project V2', 'dilabs' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'dilabs' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'project_section',
			[
				'label' 	=> __( 'Project', 'dilabs' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'style',
			[
				'label' 	=> __( 'Feature Style', 'dilabs' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'dilabs' ),
					// '2' 		=> __( 'Style Two', 'dilabs' ),
				],
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'dilabs' ),
			]
        );
        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Subitle', 'dilabs' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subitle', 'dilabs' ),
			]
        );
		$this->add_control(
			'all_text', [
				'label' 		=> __( 'All filter label', 'dilabs' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'All' , 'dilabs' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'		=> [ 'style' => ['1' ] ],
			]
		);		
        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Title' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'cats',
			[
				'label'     => __( 'Category', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'CONSTRUCTION' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'tags',
			[
				'label'     => __( 'Tags', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Marketing, Sales' , 'dilabs' ),
                'description' 		=> __( 'Use (,) for separate categories' , 'dilabs' ),
			]
        );
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'dilabs' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'details_page',
			[
				'label'     => __( 'Single Page URL', 'dilabs' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'projects',
			[
				'label' 		=> __( 'Projects', 'dilabs' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'dilabs' ),
					],
				],
			]
		);
		
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        if( $settings['style'] == '1' ){

        	echo '<div class="projects-style-four-area default-padding">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-6">';
		                    echo '<div class="left-heading mb-50 mb-md-30 mb-xs-30">';
		                        if( ! empty( $settings['section_title'] ) ){
			                        echo '<h4 class="sub-title">' .esc_html( $settings['section_title'] ). '</h4>';
			                    }
			                    if( ! empty( $settings['section_subtitle'] ) ){
			                        echo '<h2 class="title">' .esc_html( $settings['section_subtitle'] ). '</h2>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-lg-12">';
		                    echo '<div class="mix-item-menu">';
		                    	$text = !empty( $settings['all_text'] ) ? $settings['all_text'] : esc_html__( 'All', 'dilabs' );
			                	$filters = array();
				            	foreach( $settings['projects'] as $project ) {
				            		$temp_filters = explode (",", $project['cats']);
				            		foreach( $temp_filters as $temp_filter ) {
				            			$filters[strtolower(trim($temp_filter))] = $temp_filter;
				            		}
				            	}
	                            echo '<button class="active" data-filter="*">' .esc_html( $text ). '</button>';
	                            foreach( $filters as $filter ) {
				                    echo '<button data-filter=".'.esc_attr( strtolower($filter) ).'">'.esc_html( $filter ).'</button>';
				                }  
		                    echo '</div>';
		                    echo '<!-- End Mixitup Nav-->';

		                    echo '<div class="magnific-mix-gallery">';
		                        echo '<div id="gallery-masonary" class="gallery-items gallery-style-four colums-3">';
		                        	foreach( $settings['projects'] as $project ) {
				        				$filter_slug = strtolower(str_replace(',', ' ', $project['cats']));
			                            echo '<!-- Single Item -->';
			                            echo '<div class="gallery-item '.esc_attr( $filter_slug ).'">';
			                                echo '<div class="portfolio-style-four-single">';
			                                	if( ! empty( $project['image']['url'] ) ){
				                                   	echo ' <a class="item popup-link" href="'.esc_url( $project['image']['url'] ).'" class=""><img src="'.esc_url( $project['image']['url'] ).'" alt="thumb"></a>';
				                                    echo '<div class="info">';
				                                        if( ! empty( $project['title'] ) ){
						                                    echo '<h4><a href="'.esc_url($project['details_page']).'">'.esc_html( $project['title'] ).'</a></h4>';
						                                }
				                                        echo '<div class="cat">';
				                                            $str = $project['tags'];
															$delimiter = ',';
															$words = explode($delimiter, $str);
										                    foreach ($words as $word) {
										                    	echo '<span>'.esc_html($word).'</span> ';
										                    }
				                                        echo '</div>';
				                                    echo '</div>';
				                                }
			                                echo '</div>';
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
	}
}