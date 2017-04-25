<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Sage
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once VENDOR_PATH . 'tgm_plugin_activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'sage_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function sage_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		/*
		*		ACF plugins
		*/

		array(
			'name'					=> 'Advanced Custom Fields', // The plugin name.
			'slug'					=> 'advanced-custom-fields', // The plugin slug (typically the folder name).
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		// array(
		// 	'name'					=> 'ACF Options Page', // The plugin name.
		// 	'slug'					=> 'acf-options-page', // The plugin slug (typically the folder name).
		// 	'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/acf-options-page.1.2.0.zip', // The plugin source.
		// 	'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
		// 	'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		// 	'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		// 	),

		// array(
		// 	'name'					=> 'ACF Gallery', // The plugin name.
		// 	'slug'					=> 'acf-gallery', // The plugin slug (typically the folder name).
		// 	'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/acf-gallery.1.1.0.zip', // The plugin source.
		// 	'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
		// 	'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		// 	'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		// 	),

		// array(
		// 	'name'					=> 'ACF Repeater', // The plugin name.
		// 	'slug'					=> 'acf-repeater', // The plugin slug (typically the folder name).
		// 	'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/acf-repeater.1.1.0.zip', // The plugin source.
		// 	'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
		// 	'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		// 	'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		// 	),

		// array(
		// 	'name'					=> 'ACF Video', // The plugin name.
		// 	'slug'					=> 'acf-video', // The plugin slug (typically the folder name).
		// 	'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/acf-video.zip', // The plugin source.
		// 	'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
		// 	'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		// 	'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		// 	),

		/*
		*		End ACF plugins
		*/

		/*
		*		SEO plugins
		*/

		array(
			'name'					=> 'WordPress SEO by Yoast', // The plugin name.
			'slug'					=> 'wordpress-seo', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		/*
		*		End seo plugins
		*/

		/*
		*		Media and content plugins
		*/

		array(
			'name'					=> 'Fly Dynamic Image Resizer', // The plugin name.
			'slug'					=> 'fly-dynamic-image-resizer', // The plugin slug (typically the folder name).
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'SEO Friendly Images', // The plugin name.
			'slug'					=> 'seo-image', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Smush Image Compression and Optimization', // The plugin name.
			'slug'					=> 'wp-smushit', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'WP Mail SMTP', // The plugin name.
			'slug'					=> 'wp-mail-smtp', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Sierotki', // The plugin name.
			'slug'					=> 'sierotki', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Simple Share Buttons Adder', // The plugin name.
			'slug'					=> 'simple-share-buttons-adder', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Cookie Consent', // The plugin name.
			'slug'					=> 'uk-cookie-consent', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		/*
		*		End media and content plugins
		*/

		/*
		*		Security plugins
		*/

		array(
			'name'					=> 'Two Factor Authentication', // The plugin name.
			'slug'					=> 'two-factor-authentication', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Wordfence Security', // The plugin name.
			'slug'					=> 'wordfence', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Disable Comments', // The plugin name.
			'slug'					=> 'disable-comments', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Disable XML-RPC', // The plugin name.
			'slug'					=> 'disable-xml-rpc', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Disable XML-RPC Pingback', // The plugin name.
			'slug'					=> 'disable-xml-rpc-pingback', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'WPS Hide Login', // The plugin name.
			'slug'					=> 'wps-hide-login', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Two Factor Authentication', // The plugin name.
			'slug'					=> 'two-factor-authentication', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		/*
		*		End security plugins
		*/

		/*
		*		Performance plugins
		*/

		array(
			'name'					=> 'WP Super Cache', // The plugin name.
			'slug'					=> 'wp-super-cache', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Query Monitor', // The plugin name.
			'slug'					=> 'query-monitor', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Google Analytics for WordPress by MonsterInsights', // The plugin name.
			'slug'					=> 'google-analytics-for-wordpress', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Remove Query Strings From Static Resources', // The plugin name.
			'slug'					=> 'remove-query-strings-from-static-resources', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Disable Emojis', // The plugin name.
			'slug'					=> 'disable-emojis', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'WP-Optimize', // The plugin name.
			'slug'					=> 'wp-optimize', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Optimize Database after Deleting Revisions', // The plugin name.
			'slug'					=> 'rvg-optimize-database', // The plugin slug (typically the folder name).
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		/*
		*		End performance plugins
		*/

		/*
		*		Uncomment section above for multilangual WMPL plugins
		*/

		array(
			'name'					=> 'WPML Multilingual CMS', // The plugin name.
			'slug'					=> 'wpml', // The plugin slug (typically the folder name).
			'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/sitepress-multilingual-cms.3.6.3.zip', // The plugin source.
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'WPML String Translation', // The plugin name.
			'slug'					=> 'wpml-string-translation', // The plugin slug (typically the folder name).
			'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/wpml-string-translation.2.5.2.zip', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'WPML Media', // The plugin name.
			'slug'					=> 'wpml-media', // The plugin slug (typically the folder name).
			'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/wpml-media-translation.2.1.24.zip', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'WPML Translation Management', // The plugin name.
			'slug'					=> 'wpml-translation-management', // The plugin slug (typically the folder name).
			'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/wpml-translation-management.2.2.7.zip', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		array(
			'name'					=> 'Advanced Custom Fields Multilingual', // The plugin name.
			'slug'					=> 'wpml-acf', // The plugin slug (typically the folder name).
			'source'				=> get_template_directory() . '/lib/tgm_plugin_activation/plugins/acfml.0.4.zip', // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),

		/*
		*		End multilangual WMPL plugins
		*/

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
		'id'           => 'sage',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'sage' ),
			'menu_title'                      => __( 'Install Plugins', 'sage' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'sage' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'sage' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'sage' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'sage'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'sage'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'sage'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'sage'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'sage'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'sage'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'sage'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'sage'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'sage'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'sage' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'sage' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'sage' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'sage' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'sage' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'sage' ),
			'dismiss'                         => __( 'Dismiss this notice', 'sage' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'sage' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'sage' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
		);

tgmpa( $plugins, $config );
}
