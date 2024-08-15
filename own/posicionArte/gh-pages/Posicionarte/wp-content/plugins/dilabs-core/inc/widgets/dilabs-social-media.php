<?php
/**
* dilabs Social Media widget
*
* Displays Social Media widget
*
* @author       validthemes
* @category     Widgets
* @package      Dilabs/widgets
* @version      1.0.0
* @extends      WP_Widget
*/
class Dilabs_Social_Media extends WP_Widget {

    // vars
    private $icons = array(
        'facebook'   => 'facebook-f',
        'twitter'    => 'twitter',
        'linkedin'   => 'linkedin-in',
        'pinterest'  => 'pinterest',
        'g-plus'     => 'google-plus-g'
    );

    /**
     * Sets up a new Recent Posts widget instance.
     */
    public function __construct() {
        $widget_ops = array(
            'classname'                   => 'social',
            'description'                 => esc_html__( 'A widget shows the social media icons.', 'dilabs'),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'social-media', esc_html__('Dilabs Social Media', 'dilabs'), $widget_ops );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $widget = $args['before_widget'];
                $widget .= '<ul>';

                    foreach ( $this->icons as $key => $icon ) :
                        $i = isset( $instance[ $key ] ) ? $instance[ $key ] : '';

                        if( ! empty( $i ) ) :
                            $widget .= '<li>';
                                $widget .= '<a href="'.esc_url($i).'"><i class="fab fa-'.esc_attr( $icon ).'"></i></a>';
                            $widget .= '</li>';
                        endif;

                    endforeach;

                $widget .= '</ul>';
        $widget .= $args['after_widget'];   
        print $widget;
    }
    
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        foreach ( $this->icons as $key => $icon ) {
            $instance[ $key ] = strip_tags( $new_instance[ $key ] );
        }
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        foreach ( $this->icons as $key => $icon ) {
            $defaults[ $key ] = '';
        }
        // prepare options
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>
        <!-- Title -->

        <?php
        foreach ( $this->icons as $key => $icon ) : ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"><?php echo esc_html( $key ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" type="text" value="<?php echo esc_attr( $instance[ $key ] ); ?>" />
            </p>
        <?php
        endforeach;
    }
}

function dilabs_register_social_media_widgets() {
    register_widget( 'Dilabs_Social_Media' );
}
add_action( 'widgets_init', 'dilabs_register_social_media_widgets' );