<?php

declare(strict_types=1);

namespace jamal\jamplugin\hooks;

defined('ABSPATH') || exit();

use jamal\wpmstructure\ActionBodyDecorator;

class ACFImporter extends ActionBodyDecorator
{
    public function loadBody()
    {

        add_action('acf/init', array($this, 'registerAcfFields'));


        $this->actionBody->loadBody();
    }

    public function registerAcfFields()
    {
        if( function_exists('acf_add_local_field_group') ):

            //acf_add_local_field_group([]);
            
            endif;		
    }
}
