<?php
declare (strict_types = 1);

namespace jamal\jamplugin\hooks;

defined('ABSPATH') || exit();


use jamal\wpmstructure\ActionBodyDecorator;
use jamal13647850\mycustomcodes\MonoLogFactory;

class LoadCrisp extends ActionBodyDecorator {
    public function loadBody() {
        add_action( 'wp_head', [$this,'crispScript'] );
        $this->actionBody->loadBody();
    }

    public function crispScript( ) {
        $value = get_field( 'showCrisp', "option" );
        if($value[0]==="show"){
            echo '<script>
            function loadCrisp() {
              window.$crisp=[];window.CRISP_WEBSITE_ID="ea0fdba0-17fe-4d87-9699-db2d2bc85ce5";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
            }
          
            document.addEventListener("DOMContentLoaded", loadCrisp);
          </script>';
        }
    }
}
