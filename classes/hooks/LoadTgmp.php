<?php
declare (strict_types = 1);

namespace jamal\jamplugin\hooks;

defined('ABSPATH') || exit();


use jamal\wpmstructure\ActionBodyDecorator;
use jamal13647850\mycustomcodes\MonoLogFactory;

class LoadTgmp extends ActionBodyDecorator {
    public function loadBody() {
        add_action( 'tgmpa_register', [$this,'myPluginRegisterRequiredPlugins'] );
        $this->actionBody->loadBody();
    }

    
    /**
     * Register the required plugins for this plugin.
     *
     *  <snip />
     *
     * This function is hooked into tgmpa_init, which is fired within the
     * TGM_Plugin_Activation class constructor.
     */
    function myPluginRegisterRequiredPlugins() {
        /*
        * Array of plugin arrays. Required keys are name and slug.
        * If the source is NOT from the .org repo, then source is also required.
        */
        $plugins = array(

            // This is an example of how to include a plugin bundled with a plugin.
            array(
                'name'               => 'Advanced custom fields pro', // The plugin name.
                'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
                'source'             => ABSPATH . 'wp-content/plugins/jamplugin/plugins/advanced-custom-fields-pro.zip', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation'   => false, // If true, plugin is activated upon plugin activation and cannot be deactivated until plugin switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon plugin switch, useful for plugin-specific plugins.
                'external_url'       => '', // If set, overrides default API URL and points to an external URL.
                'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
            ),

            // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'      => 'BuddyPress',
                'slug'      => 'buddypress',
                'required'  => false,
            ),
            
            // <snip />
        );

        /*
        * Array of configuration settings. Amend each line as needed.
        *
        * TGMPA will start providing localized text strings soon. If you already have translations of our standard
        * strings available, please help us make TGMPA even better by giving us access to these translations or by
        * sending in a pull-request with .po file(s) with the translations.
        *
        * Only uncomment the strings in the config array if you want to customize the strings.
        */
        $config = array(
            'id'           => 'tgmpajamplugin',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins-jamplugin', // Menu slug.
            'parent_slug'  => 'plugins.php',            // Parent menu slug.
            'capability'   => 'install_plugins',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
            
            'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'jamplugin' ),
				'menu_title'                      => __( 'Install Plugins', 'jamplugin' ),
				/* translators: %s: plugin name. */
				'installing'                      => __( 'Installing Plugin: %s', 'jamplugin' ),
				/* translators: %s: plugin name. */
				'updating'                        => __( 'Updating Plugin: %s', 'jamplugin' ),
				'oops'                            => __( 'Something went wrong with the plugin API.', 'jamplugin' ),
				'notice_can_install_required'     => _n_noop(
					/* translators: 1: plugin name(s). */
					'This plugin requires the following plugin: %1$s.',
					'This plugin requires the following plugins: %1$s.',
					'jamplugin'
				),
				'notice_can_install_recommended'  => _n_noop(
					/* translators: 1: plugin name(s). */
					'This plugin recommends the following plugin: %1$s.',
					'This plugin recommends the following plugins: %1$s.',
					'jamplugin'
				),
				'notice_ask_to_update'            => _n_noop(
					/* translators: 1: plugin name(s). */
					'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this plugin: %1$s.',
					'The following plugins need to be updated to their latest version to ensure maximum compatibility with this plugin: %1$s.',
					'jamplugin'
				),
				'notice_ask_to_update_maybe'      => _n_noop(
					/* translators: 1: plugin name(s). */
					'There is an update available for: %1$s.',
					'There are updates available for the following plugins: %1$s.',
					'jamplugin'
				),
				'notice_can_activate_required'    => _n_noop(
					/* translators: 1: plugin name(s). */
					'The following required plugin is currently inactive: %1$s.',
					'The following required plugins are currently inactive: %1$s.',
					'jamplugin'
				),
				'notice_can_activate_recommended' => _n_noop(
					/* translators: 1: plugin name(s). */
					'The following recommended plugin is currently inactive: %1$s.',
					'The following recommended plugins are currently inactive: %1$s.',
					'jamplugin'
				),
				'install_link'                    => _n_noop(
					'Begin installing plugin',
					'Begin installing plugins',
					'jamplugin'
				),
				'update_link'                     => _n_noop(
					'Begin updating plugin',
					'Begin updating plugins',
					'jamplugin'
				),
				'activate_link'                   => _n_noop(
					'Begin activating plugin',
					'Begin activating plugins',
					'jamplugin'
				),
				'return'                          => __( 'Return to Required Plugins Installer', 'jamplugin' ),
				'dashboard'                       => __( 'Return to the Dashboard', 'jamplugin' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'jamplugin' ),
				'activated_successfully'          => __( 'The following plugin was activated successfully:', 'jamplugin' ),
				/* translators: 1: plugin name. */
				'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'jamplugin' ),
				/* translators: 1: plugin name. */
				'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this plugin. Please update the plugin.', 'jamplugin' ),
				/* translators: 1: dashboard link. */
				'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'jamplugin' ),
				'dismiss'                         => __( 'Dismiss this notice', 'jamplugin' ),
				'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'jamplugin' ),
				'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'jamplugin' ),
			)
            
        );

        tgmpa( $plugins, $config );

    }
}