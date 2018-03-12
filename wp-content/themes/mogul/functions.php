<?php

require get_template_directory(). '/inc/template-tags.php';


class Mogul_Enqueue_Class
{
    private static $instance;

    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        //add lang translation directory
        load_theme_textdomain('mogul', get_template_directory().'/languages');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        $this->mogul_load_dependencies();
        $this->mogul_enqueue_menu();
        add_theme_support('custom-logo');
        add_theme_support( 'custom-header' );
        add_filter('get_custom_logo', array($this ,'mogul_change_logo_class'));
        add_theme_support( 'title-tag' );
        add_action('wp_enqueue_scripts',  array($this, 'enqueue_scripts_styles'));
        add_action('after_theme_setup', 'mogul_custom_header_setup');
        //load contact info widget
        add_action('widgets_init', array($this , 'socials_footer_area_init'));


    }




    //load dependecies
    private function mogul_load_dependencies()
    {
        require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    }

    //add custom class to custom logo

    function mogul_change_logo_class($html)
    {
        $html = str_replace('custom-logo', 'logo-block__img', $html); // change class
        $html = preg_replace('/(width|height)="\d*"/', '', $html);
        return $html;
    }

    //load the menu
   private function mogul_enqueue_menu()
   {
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'mogul'),
            )
        );
   }

    //enqueue scripts and styles
    public function enqueue_scripts_styles()
    {
        wp_deregister_script('jquery');
        wp_register_script('jquery', "https://code.jquery.com/jquery-3.2.1.slim.min.js", false, null);
        wp_enqueue_script('jquery');
        wp_register_script('mogul_bootstrap_js',
            'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js');
        wp_enqueue_script('mogul_bootstrap_js');
        wp_register_style( 'mogul_bootstrap_style', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
        wp_enqueue_style( 'mogul_bootstrap_style' );
        wp_register_style( 'mogul_style', get_template_directory_uri(). '/assets/css/style.css');
        wp_enqueue_style( 'mogul_style' );
    }
    //add custom header support

  public function mogul_custom_header_setup()
  {
        $args = array(
            'default-image' =>  get_template_directory_uri() . 'assets/img/header-main-bg',
            'default-text-color' => '000',
            'width'             => 1000,
            'height'            =>  250,
            'flex-width'        =>  true,
            'flex-height'       =>  true,
        );
            add_theme_support('custom-header', $args);

    }


    //add social icons footer area

    public function socials_footer_area_init()
    {
        register_sidebar(array(
            'name'          =>  __('Footer Social Area', 'mogul'),
            'id'            =>  'footer_info_widget_area',
            'class'         =>  'footer-side-block__social',
            'before_widget'  => '<div>',
            'after_widget'  =>  '</div>',
            'before_title'  =>  '<h1>',
            'after_title'   =>  '</h1>'

    ));
    }



}

$mogul_enqueue_scripts = Mogul_Enqueue_Class::get_instance();

/**
 * Adds Foo_Widget widget.
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
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ).$instance['name'] . $args['after_title'];
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
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_attr_e( 'Name:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
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
    return '<h3>' . $title . '</h3>';
}

add_filter('widget_title', 'mogul_change_widget_title_headname');

function    mogul_change_widget_name_markup($name){
    return '<div><p>' . $name . '</p>';
}