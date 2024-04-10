<?php

/*
 * Plugin Name: Github plugin update
 * Plugin URI: https://sentientbit.com/plugins/
 * Description:  Plugin update from github
 * Version: 1.0.0
 * Author: Sentient Bit
 * Author URI: https://sentientbit.com
 * Text Domain: GPU
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Don't load directly
 */
if (!defined('ABSPATH')) {
	die('<div style="height: 100%; display: flex; justify-content: center; align-items: center;"><h1 style="font-size: 100px;">NOT AUTHORIZED!<h1></div>');
}

/**
 * Plugin constants
 */
if (!defined('GPU_VERSION')) define('GPU_VERSION', '1.0.1');
if (!defined('GPU_DATABASE_VERSION')) define('GPU_DATABASE_VERSION', '1.0.0');

define('GPU_FOLDER', 'essential-settings-and-tools');
define('GPU_URL', trailingslashit(plugin_dir_url(__FILE__)));
define('GPU_DIR', plugin_dir_path(__FILE__));
define('GPU_BASENAME', plugin_basename(__FILE__));

if (is_admin()) {
    define('GH_REQUEST_URI', 'https://api.github.com/repos/%s/%s/releases');
    define('GHPU_USERNAME', 'YOUR_GITHUB_USERNAME');
    define('GHPU_REPOSITORY', 'YOUR_GITHUB_REPOSITORY_NAME');
    define('GHPU_AUTH_TOKEN', 'YOUR_GITHUB_ACCESS_TOKEN');

    include_once plugin_dir_path(__FILE__) . '/GhPluginUpdater.php';

    $updater = new GhPluginUpdater(__FILE__);
    $updater->init();
}
