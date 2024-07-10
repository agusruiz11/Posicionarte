<?php
/**
* @version  1.0
* @package  dilabs
*
* Websites: https://themeforest.net/user/validthemes/portfolio
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class dilabs_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'dilabs_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Dilabs :: About Us Widget', 'dilabs' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'dilabs' ),
                    'classname'		                => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $about_us       = apply_filters( 'widget_about_us', $instance['about_us'] );

            $f_url          = apply_filters( 'widget_f_url', $instance['f_url'] );
            $t_url          = apply_filters( 'widget_t_url', $instance['t_url'] );
			$l_url 	        = apply_filters( 'widget_l_url', $instance['l_url'] );

            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '#';
            }

            if ( isset( $instance[ 'aboutus_shape_img_url' ] ) ) {
                $aboutus_shape_img_url = $instance[ 'aboutus_shape_img_url' ];
            }else {
                $aboutus_shape_img_url = '#';
            }

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                if ( isset( $instance[ 'aboutus_shape_img_url' ] ) ) {
                    $aboutus_shape_img_url = $instance[ 'aboutus_shape_img_url' ];

                    echo '<div class="footer-animated-shape">';
                        echo dilabs_img_tag( array(
                            'url'   => esc_url( $aboutus_shape_img_url ),
                        ) );
                    echo '</div>';
                }
                echo '<div class="f-item about pr-50 pr-xs-0 pr-md-0">';
                    if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                        $aboutus_img_url = $instance[ 'aboutus_img_url' ];

                        echo dilabs_img_tag( array(
                            'url'   => esc_url( $aboutus_img_url ),
                            'class' => 'logo'
                        ) );
                    }
                    if( !empty( $about_us ) ){
                        echo '<p>'.wp_kses_post( $about_us ).'</p>';
                    }
                    echo '<div class="footer-social mt-30">';
                        echo '<ul>';
                            if( !empty( $f_url ) ) {
                                echo '<li><a href="'.esc_url( $instance[ 'f_url' ] ).'"><i class="fab fa-facebook-f"></i></a></li>';
                            }
                            if( !empty( $t_url ) ) {
                                echo '<li><a href="'.esc_url( $instance[ 't_url' ] ).'"><i class="fab fa-twitter"></i></a></li>';
                            }
                            if( !empty( $l_url ) ) {
                                echo '<li><a href="'.esc_url( $instance[ 'l_url' ] ).'"><i class="fab fa-linkedin-in"></i></a></li>';
                            }
                        echo '</ul>';
                    echo '</div>';
                echo '</div>';
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Image Url
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '';
            }

            // shape Image Url
            if ( isset( $instance[ 'aboutus_shape_img_url' ] ) ) {
                $aboutus_shape_img_url = $instance[ 'aboutus_shape_img_url' ];
            }else {
                $aboutus_shape_img_url = '';
            }

            // about us //
            if ( isset( $instance[ 'about_us' ] ) ) {
                $about_us = $instance[ 'about_us' ];
            }else {
                $about_us = '';
            }

            // facebook url //
            if ( isset( $instance[ 'f_url' ] ) ) {
                $f_url = $instance[ 'f_url' ];
            }else {
                $f_url = '';
            }

            // twitter url //
            if ( isset( $instance[ 't_url' ] ) ) {
                $t_url = $instance[ 't_url' ];
            }else {
                $t_url = '';
            }

            // linkedin url //
			if ( isset( $instance[ 'l_url' ] ) ) {
				$l_url = $instance[ 'l_url' ];
			}else {
				$l_url = '';
			}
			
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>"><?php _e( 'Image URL:' ,'dilabs'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>" name="<?php echo $this->get_field_name( 'aboutus_img_url' ); ?>" type="text" value="<?php echo esc_attr( $aboutus_img_url ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'aboutus_shape_img_url' ); ?>"><?php _e( 'Shape Image URL:' ,'dilabs'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'aboutus_shape_img_url' ); ?>" name="<?php echo $this->get_field_name( 'aboutus_shape_img_url' ); ?>" type="text" value="<?php echo esc_attr( $aboutus_shape_img_url ); ?>" />
            </p>


			<p>
                <label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
                    <?php
                        _e( 'About Us:' ,'dvpn');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'f_url' ); ?>">
                    <?php
                        _e( 'Facebook URL :' ,'dilabs');
                    ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'f_url' ); ?>" name="<?php echo $this->get_field_name( 'f_url' ); ?>" type="text" value="<?php echo esc_attr( $f_url ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 't_url' ); ?>">
                    <?php
                        _e( 'Twitter URL :' ,'dilabs');
                    ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 't_url' ); ?>" name="<?php echo $this->get_field_name( 't_url' ); ?>" type="text" value="<?php echo esc_attr( $t_url ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'l_url' ); ?>">
                    <?php
                        _e( 'Linkedin URL :' ,'dilabs');
                    ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'l_url' ); ?>" name="<?php echo $this->get_field_name( 'l_url' ); ?>" type="text" value="<?php echo esc_attr( $l_url ); ?>" />
            </p>
            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['aboutus_img_url']      = ( ! empty( $new_instance['aboutus_img_url'] ) ) ? strip_tags( $new_instance['aboutus_img_url'] ) : '';
            $instance['aboutus_shape_img_url'] 	  = ( ! empty( $new_instance['aboutus_shape_img_url'] ) ) ? strip_tags( $new_instance['aboutus_shape_img_url'] ) : '';
            $instance['about_us']             = ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';
            $instance['f_url']                = ( ! empty( $new_instance['f_url'] ) ) ? strip_tags( $new_instance['f_url'] ) : '';
            $instance['t_url']                = ( ! empty( $new_instance['t_url'] ) ) ? strip_tags( $new_instance['t_url'] ) : '';
            $instance['l_url'] 			      = ( ! empty( $new_instance['l_url'] ) ) ? strip_tags( $new_instance['l_url'] ) : '';
            
			return $instance;
        }
    } // Class dilabs_aboutus_widget ends here


    // Register and load the widget
    function dilabs_aboutus_load_widget() {
        register_widget( 'dilabs_aboutus_widget' );
    }
    add_action( 'widgets_init', 'dilabs_aboutus_load_widget' );