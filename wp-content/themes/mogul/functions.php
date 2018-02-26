<?php


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

        add_theme_support('custom-logo');
        add_theme_support( 'title-tag' );
        add_action('wp_enqueue_scripts',  array($this, 'enqueue_scripts_styles'));
        add_action('after_theme_setup', 'mogul_custom_header_setup');

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

}

    $mogul_enqueue_scripts = Mogul_Enqueue_Class::get_instance();


