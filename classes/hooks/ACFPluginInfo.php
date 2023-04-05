<?php
declare (strict_types = 1);

namespace jamal\jamplugin\hooks;

defined('ABSPATH') || exit();


use jamal\wpmstructure\ACFFieldGroup;

class ACFPluginInfo implements ACFFieldGroup {
    public static function loadFields(){
        global $jampluginTwig;
        acf_add_local_field_group(array(
            'key' => 'group_623150db8247e',
            'title' => 'معرفی افزونه jamplugin',
            'fields' => array(
                array(
                    'key' => 'field_623150f74a1c6',
                    'label' => 'معرفی افزونه',
                    'name' => '',
                    'type' => 'message',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => $jampluginTwig->render('@views/info.html.twig'),
                    'new_lines' => 'wpautop',
                    'esc_html' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'jamplugin',
                    ),

                ),
                array(

                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'jamplugin2',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    }
}
