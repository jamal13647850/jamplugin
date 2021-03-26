<?php
declare (strict_types = 1);

namespace jamal\jamplugin\admin;

defined('ABSPATH') || exit();


use jamal\wpmstructure\ActionBodyDecorator;
use jamal13647850\mycustomcodes\MonoLogFactory;
use jamal\jamplugin\jamplugin;

class Menu extends ActionBodyDecorator {
    public function loadBody() {
        add_action('acf/init', [$this,'myACFOptionInit']);


        $this->actionBody->loadBody();
    }


    public function myACFOptionInit() {

        // Check function exists.
        if( function_exists('acf_add_options_page') ) {

            // Add parent.
            $parent = acf_add_options_page(array(
                'page_title'  => __('jamplugin',jamplugin::getDomain()),
                'menu_title'  => __('jamplugin',jamplugin::getDomain()),
                'menu_slug'   => "jamplugin",
                'redirect'    => false,
                'capability' => 'manage_academy_options',
                'position' => '3.33',
                'icon_url' => plugin_dir_url(__FILE__) . '../../assets/dest/images/logo 32.png'
            ));

            // Add sub page.
            $child = acf_add_options_page(array(
                'page_title'  => __('Settings',jamplugin::getDomain()),
                'menu_title'  => __('Settings',jamplugin::getDomain()),
                'menu_slug'   => "jampluginsettings",
                'parent_slug' => $parent['menu_slug'],
                'capability' => 'manage_academy_options',
            ));
        }
    }

}
