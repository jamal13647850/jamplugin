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
use jamal\jamplugin\classes\loadAssets;
use widgets\widgetInit;



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
        $wgi=new widgetInit();
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
        $loadAssets=new loadAssets(
           self::getMode(),
        plugin_dir_url(__FILE__) . 'assets/dest/css/',
         plugin_dir_url(__FILE__) . 'assets/dest/js/');
         $loadAssets->LoadScripts();
         $loadAssets->LoadStyle();
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
