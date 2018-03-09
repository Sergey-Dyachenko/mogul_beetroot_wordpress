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
        add_action('widgets_init', array($this ,'mogul_load_widget_contact_info'));
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


    //add Contact Info footer widget
    function mogul_load_widget_contact_info(){
        register_widget('Mogul_Widget_Contact');
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
class Mogul_Widget_Contact extends WP_Widget
{
    //init widget
    function __construct()
    {
        parent::__construct(
            'widget__contact_info',
            __('Mogul Make Up Artistry', 'mogul'),
            array('description' => __('Widget for echo contact information', 'mogul'),)
        );
    }


//create widget frontend

    public function widget($args, $instance)
    {
        $title = appply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_titile'];
        echo __('Hello World', 'mogul');
        echo $args['after_widget'];
    }
//crate widget backend

    public function form($instance){
        if (isset($instance['title'])){
            $title = $instance['title'];
        }
        else{
            $title = __('New title','mogul' );
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

//updating widget
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;

    }
}
$mogul_enqueue_scripts = Mogul_Enqueue_Class::get_instance();