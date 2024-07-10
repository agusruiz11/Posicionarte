<?php
/**
* @version  1.0
* @package  dilabs
*
* Websites: https://themeforest.net/user/validthemes/portfolio
*
*/

/**************************************
* Creating CTA Widget
***************************************/

class dilabs_cta_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'dilabs_cta_widget', 
            
                // Widget name will appear in UI
                esc_html__( 'Dilabs :: CTA', 'dilabs' ),
            
                // Widget description
                array( 
                    'customize_selective_refresh'   => true,  
                    'description'                   => esc_html__( 'Add Subscribed Widget', 'dilabs' ),   
                    'classname'                     => 'no-class',
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $title      = ( !empty( $instance['title'] ) ) ? $instance['title'] : "";  
            $subtitle   = ( !empty( $instance['subtitle'] ) ) ? $instance['subtitle'] : ""; 
            $widget_style  = empty( $instance['widget_style'] ) ? $instance['widget_style'] : 'style_one';
            
            //before and after widget arguments are defined by themes
            echo $args['before_widget']; 
                if( $widget_style == 'style_one' ){
                    if( !empty( $title ) ){
                        echo '<h4 class="widget-title">'.esc_html( $title ).'</h4>';
                    }
                    if( !empty( $subtitle ) ){
                        echo '<p>'.esc_html( $subtitle ).'</p>';
                    }
                    echo '<div class="f-item newsletter">';
                        echo '<form class="newsletter-form">';
                            echo '<input type="email" placeholder="'.esc_attr__('Your Email', 'dilabs').'" class="form-control" name="email">';
                            echo '<button type="submit"> <i class="fa fa-paper-plane"></i></button>  ';
                        echo '</form>';
                    echo '</div>';
                }else{
                    echo '<div class="newsletter newsletter-for-offcanvas">';
                        echo '<h4 class="title">'.esc_html( $title ).'</h4>';
                        echo '<form class="newsletter-form">';
                            echo '<div class="input-group stylish-input-group">';
                                echo '<input type="email" placeholder="'.esc_attr__('Enter your e-mail', 'dilabs').'" class="form-control" name="email">';
                                echo '<span class="input-group-addon">';
                                    echo '<button type="submit">';
                                        echo '<i class="arrow_right"></i></button>';
                                echo '</span>';
                            echo '</div>';
                        echo '</form>';
                    echo '</div>';
                }

            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }
            
        // Widget Backend 
        public function form( $instance ) {
    
            //Title 
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }
            //subtitle  
            if ( isset( $instance[ 'subtitle' ] ) ) {
                $subtitle = $instance[ 'subtitle' ];
            }else {
                $subtitle = '';
            }
            $instance = wp_parse_args(
                (array) $instance,
                array(
                    'widget_style'   => 'style_one'
                )
            );
            $instance = wp_parse_args(
                (array) $instance,
                array(
                    'widget_style'   => 'style_two'
                )
            );
        
            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'dilabs'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ,'dilabs'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'widget_style' ) ); ?>"><?php _e( 'Choose Style:' ); ?></label>
                <select name="<?php echo esc_attr( $this->get_field_name( 'widget_style' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'widget_style' ) ); ?>" class="widefat">
                    <option value="style_one"<?php selected( $instance['widget_style'], 'style_one' ); ?>><?php _e( 'Style One' ); ?></option>
                    <option value="style_two"<?php selected( $instance['widget_style'], 'style_two' ); ?>><?php _e( 'Style Two' ); ?></option>
                </select>
            </p>
            
            <?php 
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();
            $instance['title']                  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';      
            $instance['subtitle']               = ( ! empty( $new_instance['subtitle'] ) ) ? strip_tags( $new_instance['subtitle'] ) : '';
            if ( in_array( $new_instance['widget_style'], array( 'style_one', 'style_two', 'ID' ) ) ) {
                $instance['widget_style'] = $new_instance['widget_style'];
            } else {
                $instance['widget_style'] = 'style_one';
            }     
            return $instance;
        }
    } // Class dilabs_cta_widget ends here
    

    // Register and load the widget
    function dilabs_cta_widget() {
        register_widget( 'dilabs_cta_widget' );
    }
    add_action( 'widgets_init', 'dilabs_cta_widget' );