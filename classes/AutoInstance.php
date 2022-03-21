<?php

declare(strict_types=1);

namespace jamal\jamplugin\classes;

defined('ABSPATH') || exit();

class AutoInstance{
    public function __construct(){
        $classes=[
            'hooks'=>'jamal\calinsms\hooks\hooks',
            'widgetInit'=>'widgets\widgetInit'
        ];

        foreach($classes as $class){
            new $class;
        }

    }
}