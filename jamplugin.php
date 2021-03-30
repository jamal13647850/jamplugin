<?php
/*
Plugin Name: jamplugin
Plugin URI: https://jamplugin.com
Description: A special wordpress plugin for jamplugin.com
Version: 1.0.0
Author: Sayyed Jamal Ghasemi
Author URI: https://www.linkedin.com/in/jamal1364/
License: paid
*/
declare (strict_types = 1);

namespace jamal\jamplugin;

defined('ABSPATH') || exit();
require_once trailingslashit(plugin_dir_path(__FILE__)) . '/vendor/autoload.php';
use jamal\wpmstructure\wpplugin;
use jamal\jamplugin\hooks\hooks;
use jamal\jamplugin\shortcodes\shortcodes;



final class jamplugin extends wpplugin
{


    private static $instance = null;

    public static function getInstance($mode): jamplugin
    {
        if (null === static::$instance) {
            static::$instance =  new static($mode);
        }
        return static::$instance;
    }

    protected function __construct($mode)
    {
        parent::__construct("jamplugin", __FILE__,$mode);
        global $jampluginTwig;
        $jampluginTwig = $this->initTwig(['views'], $this->getPluginPath("template")['dir']);

        new hooks();
        new shortcodes("lng");
        if($mode=="development"){
            //add_action('phpmailer_init', [$bot,'mailtrap']);
        }
    }


    private function __clone()
    { }

    private function __wakeup()
    { }

    function loginStylesheet()
    {
        // TODO: Implement loginStylesheet() method.
    }

    function registerScriptsAndStyles()
    {
        switch (self::getMode()) {
            case "development":
                if ( is_rtl() ) {
                    wp_register_style('home-rtl.css', plugin_dir_url(__FILE__) . 'assets/dest/css/home-rtl.css');
                    wp_enqueue_style('home-rtl.css');
    
                    wp_enqueue_script('home-rtl.js', plugin_dir_url(__FILE__) . 'assets/dest/js/home-rtl.js', [], '', true);
                }
                else{
                    wp_register_style('home.css', plugin_dir_url(__FILE__) . 'assets/dest/css/home.css');
                    wp_enqueue_style('home.css');
    
                    wp_enqueue_script('home.js', plugin_dir_url(__FILE__) . 'assets/dest/js/home.js', [], '', true);
                }
                
                break;
            case "production":
                if ( is_rtl() ) {
                    wp_register_style('home-rtl.min.css', plugin_dir_url(__FILE__) . 'assets/dest/css/home-rtl.min.css');
                    wp_enqueue_style('home-rtl.min.css');
    
                    wp_enqueue_script('home-rtl.min.js', plugin_dir_url(__FILE__) . 'assets/dest/js/home-rtl.min.js', [], '', true);
                }
                else{
                    wp_register_style('home.min.css', plugin_dir_url(__FILE__) . 'assets/dest/css/home.min.css');
                    wp_enqueue_style('home.min.css');
    
                    wp_enqueue_script('home.min.js', plugin_dir_url(__FILE__) . 'assets/dest/js/home.min.js', [], '', true);
                }

                break;
        }
    }

    function registerAdminScriptsAndStyles()
    {
        // TODO: Implement registerAdminScriptsAndStyles() method.
    }

    function activation()
    {
        // TODO: Implement activation() method.
    }

    function deactivation()
    {
        // TODO: Implement deactivation() method.
    }

    function getPluginPath($dirName)
    {
        $dir = trailingslashit(plugin_dir_path(__FILE__) . "/"  . $dirName);
        $url = trailingslashit(plugin_dir_url(__FILE__) . "/" . $dirName);
        return [
            'dir' => $dir,
            'url' => $url
        ];
    }
}

jamplugin::getInstance("development");
