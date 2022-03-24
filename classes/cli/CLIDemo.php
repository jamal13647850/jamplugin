<?php

namespace jamal\jamplugin\cli;

defined('ABSPATH') || die();
class CLIDemo extends \WP_CLI_Command
{
    

    /**
     * Show a cli demo
     *
     *
     *
     * ## OPTIONS
     *
     *  [--username=<username>]
     * : Demo user name.
     *  [--password=<password>]
     * : Demo password.
     *  [--from=<from>]
     * : Demo from number.
     *
     * ## EXAMPLES
     *
     *     $ wp jamplugin demo update --username=<username> --password=<password> --from=<from>
     *     Success: Username updated successfully.
     *     Success: Password updated successfully.
     *     Success: From updated successfully.
     */
    public function update($args, $assoc_args)
    {


        $jamplugin_username = !empty($assoc_args['username']) ? $assoc_args['username'] : null;
        $jamplugin_password = !empty($assoc_args['password']) ? $assoc_args['password'] : null;
        $jamplugin_from = !empty($assoc_args['from']) ? $assoc_args['from'] : null;

        if ($jamplugin_username != null) {
            \WP_CLI::success('Username updated successfully');
        }
        if ($jamplugin_password != null) {
            \WP_CLI::success('Password updated successfully');
        }
        if ($jamplugin_from != null) {
            \WP_CLI::success('From updated successfully');
        }
    }
}
