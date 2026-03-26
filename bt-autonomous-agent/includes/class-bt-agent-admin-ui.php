<?php

class BT_Agent_Admin_UI {

    public function __construct() {
        add_action('admin_menu', [$this, 'menu']);
        add_action('admin_enqueue_scripts', [$this, 'assets']);
    }

    public function menu() {
        add_menu_page(
            'BT Autonomous Agent',
            'BT Agent',
            'manage_options',
            'bt-agent',
            [$this, 'dashboard'],
            'dashicons-robot',
            3
        );
    }

    public function assets() {
        wp_enqueue_style('bt-agent-admin', BT_AGENT_URL . 'assets/admin.css');
        wp_enqueue_script('bt-agent-admin', BT_AGENT_URL . 'assets/admin.js', ['jquery'], null, true);
    }

    public function dashboard() {
        ?>
        <div class="bt-dashboard">
            <h1>#BernardTitus&Co Autonomous Agent</h1>
            <p>Connected to your external AI system.</p>

            <div class="bt-section">
                <h2>Task Logs</h2>
                <pre><?php print_r(get_option('bt_agent_logs')); ?></pre>
            </div>

            <div class="bt-section">
                <h2>Memory</h2>
                <pre><?php print_r(get_option('bt_agent_memory')); ?></pre>
            </div>
        </div>
        <?php
    }
}
