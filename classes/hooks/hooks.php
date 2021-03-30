<?php
declare (strict_types = 1);

namespace jamal\jamplugin\hooks;

defined('ABSPATH') || exit();

use jamal\wpmstructure\wphooks;
use jamal\wpmstructure\Action;
use jamal\jamplugin\admin\Menu;
class hooks extends wphooks
{

    function registerHooks()
    {
        $action = new Action();
        $action = new LoadTgmp($action);
        $action = new Menu($action);
        $action->loadBody();
    }
}
