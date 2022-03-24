<?php

declare(strict_types=1);

namespace jamal\jamplugin\classes;

defined('ABSPATH') || exit();

class AutoInstance{
    public function __construct(){
        $classes=[
            'hooks'=>'jamal\jamplugin\hooks\hooks',
            'widgetInit'=>'widgets\widgetInit',
            'ADDCommands'=>'jamal\jamplugin\cli\ADDCommands',
        ];

        foreach($classes as $class){
            new $class;
        }

    }
}