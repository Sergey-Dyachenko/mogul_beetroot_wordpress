<?php
/**
 * Created by PhpStorm.
 * User: it
 * Date: 3/13/18
 * Time: 6:32 PM
 */

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
//            'before_widget'  => '<div>',
//            'after_widget'  =>  '</div>',
//            'before_title'  =>  '<h3>',
//            'after_title'   =>  '</h3>'

        ));
    }



}

$mogul_enqueue_scripts = Mogul_Enqueue_Class::get_instance();