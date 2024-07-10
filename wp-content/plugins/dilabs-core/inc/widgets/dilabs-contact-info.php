<?php
/**
 * @version  1.0
 * @package  dilabs
 *
 * Websites: https://themeforest.net/user/validthemes/portfolio
 *
 */

/**************************************
*Creating Contact Information Widget
***************************************/

class dilabs_contact_info_widget2 extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'dilabs_contact_info_widget2',
			// Widget name will appear in UI
			esc_html__( 'Dilabs :: Off Canvas Contact Info', 'dilabs' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Contact Info', 'dilabs' ),
				'classname'		 => 'address',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$address 	= apply_filters( 'widget_address', $instance['address'] );
	$mobile 		= apply_filters( 'widget_mobile', $instance['mobile'] );
	$email 			= apply_filters( 'widget_email', $instance['email'] );
	//Remove ' ' , '-', ' - ' from email
	$email 			= is_email( $email );
	$replace 		= array(' ','-',' - ');
	$with 			= array('','','');
	$emailurl 		= str_replace( $replace, $with, $email );

	$mobileurl 	    = str_replace( $replace, $with, $mobile );
	//before and after widget arguments are defined by themes
	echo $args['before_widget'];
    echo '<!-- About Widget Start -->';
    	if( !empty( $title ) || !empty( $address ) ||  !empty( $email ) || !empty( $mobile ) ):

            echo '<ul>';
            	if( !empty( $address ) ){
                    echo '<li>';
                        echo '<div class="content"><p>'.esc_html__('ADDRESS:','dilabs').'</p><strong>'.wp_kses_post( $address ).'</strong></div>';
                    echo '</li>';
                }
                if( !empty( $email ) ){
                    echo '<li>';
                        echo '<div class="content"><p>'.esc_html__('EMAIL:','dilabs').'</p>';
                            echo '<a href="'.esc_attr( 'mailto:'.$emailurl ).'"><strong>'.esc_html( $email ).'</strong></a>';
                        echo '</div>';
                    echo '</li>';
                }
                if( !empty( $mobile ) ){
                    echo '<li>';
                        echo '<div class="content"><p>'.esc_html__('PHONE:','dilabs').'</p>';
                            echo '<a href="'.esc_attr( 'tel:'.$mobileurl ).'"><strong>'.esc_html( $mobile ).'</strong></a>';
                        echo '</div>';
                    echo '</li>';
                }
            echo '</ul>';
    	endif;
	echo $args['after_widget'];
    echo '<!-- About Widget End -->';


}

// Widget Backend
public function form( $instance ) {

	// About Text
	if ( isset( $instance[ 'address' ] ) ) {
		$address = $instance[ 'address' ];
	}else {
		$address = '';
	}

	// E-mail one
	if ( isset( $instance[ 'email' ] ) ) {
		$email = $instance[ 'email' ];
	}else {
		$email = '';
	}
	// Mobile
    if ( isset( $instance[ 'mobile' ] ) ) {
        $mobile = $instance[ 'mobile' ];
    }else {
        $mobile = '';
    }
?>

	<p>
        <label for="<?php echo $this->get_field_id( 'address' ); ?>">
            <?php
                _e( 'Contact Info:' ,'dilabs');
            ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
    </p>
	<p>
		<label for="<?php echo $this->get_field_id( 'mobile' ); ?>">
			<?php
				_e( 'Mobile :' ,'dilabs');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" type="text" value="<?php echo esc_attr( $mobile ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>">
			<?php
				_e( 'Email :' ,'dilabs');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
	</p>
<?php
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();


	$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';

	$instance['email'] 		= ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

	$instance['mobile']  	= ( ! empty( $new_instance['mobile'] ) ) ? strip_tags( $new_instance['mobile'] ) : '';

	return $instance;
}
}
// Class dilabs_subscribe_widget ends here

// Register and load the widget
function dilabs_contact_info_load_widget2() {
	register_widget( 'dilabs_contact_info_widget2' );
}
add_action( 'widgets_init', 'dilabs_contact_info_load_widget2' );