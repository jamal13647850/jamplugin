<?php
declare (strict_types = 1);

namespace jamal\jamplugin\hooks;

defined('ABSPATH') || exit();


use jamal\wpmstructure\ActionBodyDecorator;
use jamal13647850\mycustomcodes\MonoLogFactory;

class LoadNajva extends ActionBodyDecorator {
    public function loadBody() {
        add_action( 'wp_head', [$this,'najvaScript'] );
        $this->actionBody->loadBody();
    }

    public function najvaScript( ) {
        $value = get_field( 'showNajva', "option" );
        if($value[0]==="Enable"){
            echo '        <link rel="manifest" href="/manifest.json">
            <!-- Najva Push Notification -->
              <script type="text/javascript">
                  (function(){
                      var now = new Date();
                      var version = now.getFullYear().toString() + "0" + now.getMonth() + "0" + now.getDate() +
                          "0" + now.getHours();
                      var head = document.getElementsByTagName("head")[0];
                      var link = document.createElement("link");
                      link.rel = "stylesheet";
                      link.href = "https://app.najva.com/static/css/local-messaging.css" + "?v=" + version;
                      head.appendChild(link);
                      var script = document.createElement("script");
                      script.type = "text/javascript";
                      script.async = true;
                      script.src = "https://app.najva.com/static/js/scripts/jamplugin-website-18767-309b7238-09ad-4c5b-87f7-ac449b70c172.js" + "?v=" + version;
                      head.appendChild(script);
                      })()
              </script>
              <!-- END NAJVA PUSH NOTIFICATION -->
            ';
        }
    }
}
