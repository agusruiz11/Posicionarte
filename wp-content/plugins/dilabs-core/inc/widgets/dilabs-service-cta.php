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

class dilabs_service_cta_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'dilabs_service_cta_widget', 
            
                // Widget name will appear in UI
                esc_html__( 'Dilabs :: Service CTA', 'dilabs' ),
            
                // Widget description
                array( 
                    'customize_selective_refresh' 	=> true,  
                    'description' 					=> esc_html__( 'Add CTA Widget', 'dilabs' ),   
                    'classname'   					=> '',
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $title  	= ( !empty( $instance['title'] ) ) ? $instance['title'] : "";  
            $subtitle  	= ( !empty( $instance['subtitle'] ) ) ? $instance['subtitle'] : "";  
            $phone  	= ( !empty( $instance['phone'] ) ) ? $instance['phone'] : "";  
            $thumb      = ( !empty( $instance['thumb'] ) ) ? $instance['thumb'] : "";   
            $email      = ( !empty( $instance['email'] ) ) ? $instance['email'] : "";   
            $btn_txt    = ( !empty( $instance['btn_txt'] ) ) ? $instance['btn_txt'] : "";   
            $btn_url  	= ( !empty( $instance['btn_url'] ) ) ? $instance['btn_url'] : "";   
            
            //before and after widget arguments are defined by themes
            echo $args['before_widget']; 

                echo '<div class="single-widget quick-contact-widget text-light" style="background-image: url('.esc_url( $thumb ).');">';
                    echo '<div class="content">';
                        if( !empty( $title ) ){
                            echo '<h3>'.esc_html( $title ).'</h3>';
                        }
                        if( !empty( $subtitle ) ){
                            echo '<p>'.esc_html( $subtitle ).'</p>';
                        }
                        if( !empty( $phone ) ){
                            echo '<h2>'.esc_html( $phone ).'</h2>';
                        }
                        if( !empty( $email ) ){
                            echo '<h4><a href="mailto:'.esc_url($email).'">'.esc_html( $email ).'</a></h4>';
                        }
                        if( !empty( $btn_txt ) ){
                            echo '<a class="btn mt-30 circle btn-sm btn-gradient" href="'.esc_url( $btn_url ).'">'.esc_html( $btn_txt ).'</a>';
                        }
                    echo '</div>';
                echo '</div>';
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
            //phone 
            if ( isset( $instance[ 'phone' ] ) ) {
                $phone = $instance[ 'phone' ];
            }else {
                $phone = '';
            }

            //email 
            if ( isset( $instance[ 'email' ] ) ) {
                $email = $instance[ 'email' ];
            }else {
                $email = '';
            }

            //btn_txt   
            if ( isset( $instance[ 'btn_txt' ] ) ) {
                $btn_txt = $instance[ 'btn_txt' ];
            }else {
                $btn_txt = '';
            }

            //btn_url	
            if ( isset( $instance[ 'btn_url' ] ) ) {
                $btn_url = $instance[ 'btn_url' ];
            }else {
                $btn_url = '';
            }

            if ( isset( $instance[ 'thumb' ] ) ) {
                $thumb = $instance[ 'thumb' ];
            }else {
                $thumb = __( '#','dilabs' );
            }
			
            
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
                <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:' ,'dilabs'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'thumb' ); ?>"><?php _e( 'Thumbnail Url:' ,'dilabs'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" type="text" value="<?php echo esc_attr( $thumb ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:' ,'dilabs'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'btn_txt' ); ?>"><?php _e( 'Button Text:' ,'dilabs'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'btn_txt' ); ?>" name="<?php echo $this->get_field_name( 'btn_txt' ); ?>" type="text" value="<?php echo esc_attr( $btn_txt ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'btn_url' ); ?>"><?php _e( 'Button Url:' ,'dilabs'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'btn_url' ); ?>" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" type="text" value="<?php echo esc_attr( $btn_url ); ?>" />
            </p>
			
            <?php 
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();
            $instance['title'] 	        		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';      
            $instance['subtitle'] 	        	= ( ! empty( $new_instance['subtitle'] ) ) ? strip_tags( $new_instance['subtitle'] ) : '';      
            $instance['phone'] 	        		= ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';      
            $instance['thumb']                  = ( ! empty( $new_instance['thumb'] ) ) ? strip_tags( $new_instance['thumb'] ) : '';      
            $instance['email']                  = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';      
            $instance['btn_txt']                = ( ! empty( $new_instance['btn_txt'] ) ) ? strip_tags( $new_instance['btn_txt'] ) : '';      
            $instance['btn_url'] 	            = ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';      
            return $instance;
        }
    } // Class dilabs_service_cta_widget ends here
    

    // Register and load the widget
    function dilabs_service_cta_widget() {
        register_widget( 'dilabs_service_cta_widget' );
    }
    add_action( 'widgets_init', 'dilabs_service_cta_widget' );