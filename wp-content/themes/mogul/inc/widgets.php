<?php
/**
 * Created by PhpStorm.
 * User: it
 * Date: 3/13/18
 * Time: 6:26 PM
 */

class Contact_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'contact_widget', // Base ID
            esc_html__( 'Widget Title', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'A Contact Widget', 'text_domain' ), ) // Args
        );
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

        $title = apply_filters( 'widget_title', $instance['title'] );


        $name = apply_filters( 'widget_title', $instance['name'] );

        $location_title = apply_filters( 'widget_title', $instance['location_title'] );


        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $title . $name .$location_title;
        }

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        $name = ! empty( $instance['name'] ) ? $instance['name'] : esc_html__( 'New title', 'text_domain' );
        $location_title = ! empty( $instance['location_title'] ) ? $instance['location_title'] : esc_html__( 'New title', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_attr_e( 'Name:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'location_title' ) ); ?>"><?php esc_attr_e( 'Location Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'location_title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'location_title' ) ); ?>" type="text" value="<?php echo esc_attr( $location_title); ?>">
        </p>
        <?php
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
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
        $instance['location_title'] = ( ! empty( $new_instance['location_title'] ) ) ? strip_tags( $new_instance['location_title'] ) : '';
        return $instance;
    }

} // class Contact_Widget

// register Contact_Widget widget
function register_contact_widget() {
    register_widget( 'Contact_Widget' );
}
add_action( 'widgets_init', 'register_contact_widget' );

add_filter('widget_title', 'mogul_change_widget_title_headname');

function    mogul_change_widget_title_headname($title){
    return  $title ;
}

add_filter('widget_title', 'mogul_change_widget_name_markup');

function    mogul_change_widget_name_markup($name){
    return '<div><p>' . $name . '</p>';
}

add_filter('widget_title', 'mogul_change_location_title_markup');

function    mogul_change_location_title_markup($location_title){
    return '<p>' . $location_title . '</p></div>';
}