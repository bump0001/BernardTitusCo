<?php
/**
 * Plugin Name: BernardTitus&Co Autonomous Agent
 * Description: Connects WordPress to the external AI agent for autonomous content and site management.
 * Version: 1.0.0
 * Author: Bernard Titus & Co
 */

if (!defined('ABSPATH')) exit;

define('BT_AGENT_PATH', plugin_dir_path(__FILE__));
define('BT_AGENT_URL', plugin_dir_url(__FILE__));

require_once BT_AGENT_PATH . 'includes/class-bt-agent-api.php';
require_once BT_AGENT_PATH . 'includes/class-bt-agent-actions.php';
require_once BT_AGENT_PATH . 'includes/class-bt-agent-logs.php';
require_once BT_AGENT_PATH . 'includes/class-bt-agent-settings.php';
require_once BT_AGENT_PATH . 'includes/class-bt-agent-admin-ui.php';
require_once BT_AGENT_PATH . 'includes/class-bt-agent-security.php';

add_action('plugins_loaded', function () {
    new BT_Agent_API();
    new BT_Agent_Actions();
    new BT_Agent_Logs();
    new BT_Agent_Settings();
    new BT_Agent_Admin_UI();
});
