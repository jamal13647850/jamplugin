<?php
namespace jamal\jamplugin\cli;

defined( 'ABSPATH' ) || die();

class ADDCommands{

    function __construct(){
        add_action( 'init', [$this,'loadCLI']);

    }
    public function loadCLI(){
        if ( defined( 'WP_CLI' ) && WP_CLI ) {
            \WP_CLI::add_command( 'jamplugin demo', 'jamal\jamplugin\cli\CLIDemo' );
        }
    }
}