<?php
/*
Plugin Name: jamplugin
Plugin URI: https://jamplugin.com
Description: A special wordpress plugin for jamplugin.com
Version: 1.0.0
Author: Sayyed Jamal Ghasemi
Author URI: https://jamalghasemi.com
License: paid
*/
declare (strict_types = 1);

namespace jamal\jamplugin;

defined('ABSPATH') || exit();
require_once trailingslashit(plugin_dir_path(__FILE__)) . '/vendor/autoload.php';
use jamal\wpmstructure\wpplugin;
use jamal\jamplugin\classes\AutoInstance;
use jamal\jamplugin\shortcodes\shortcodes;
use jamal\wpmstructure\loadAssets;




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

        new AutoInstance();
        new shortcodes("lng");
        if($mode=="development"){
            //add_action('phpmailer_init', [$bot,'mailtrap']);
        }

        $jampluginUpdateChecker = \Puc_v4_Factory::buildUpdateChecker(
            'https://dl.jamalghasemi.com/plugins/my/jamplugin/jamplugin.json',
            __FILE__, //Full path to the main plugin file or functions.php.
            'jamplugin'
        );
    }


    private function __clone()
    { }

    
    function loginStylesheet()
    {
        // TODO: Implement loginStylesheet() method.
    }

    function registerScriptsAndStyles()
    {
        $loadAssets=new loadAssets(
           self::getMode(),
        plugin_dir_url(__FILE__) . 'assets/dest/css/',
         plugin_dir_url(__FILE__) . 'assets/dest/js/',$this->getDomain());
         
         //$loadAssets->addCSS('home-core');
         //$loadAssets->addJS('home-core');
         //$loadAssets->addCSSForSpecificPage('home-page',33);
         //$loadAssets->addJSForSpecificPage('home-page',33);
         //$loadAssets->LoadScripts()->LoadStyle();
      

         
       
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
