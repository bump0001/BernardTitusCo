<?php

class BT_Agent_Settings {

    public function __construct() {
        add_action('admin_menu', [$this, 'menu']);
        add_action('admin_init', [$this, 'settings']);
    }

    public function menu() {
        add_options_page(
            'BT Autonomous Agent',
            'BT Agent',
            'manage_options',
            'bt-agent-settings',
            [$this, 'page']
        );
    }

    public function settings() {
        register_setting('bt_agent_settings', 'bt_agent_api_key');
        register_setting('bt_agent_settings', 'bt_agent_python_url');
    }

    public function page() {
        ?>
        <div class="wrap">
            <h1>BernardTitus&Co Autonomous Agent</h1>

            <form method="post" action="options.php">
                <?php settings_fields('bt_agent_settings'); ?>
                <?php do_settings_sections('bt_agent_settings'); ?>

                <label>Python Agent URL</label>
                <input type="text" name="bt_agent_python_url" value="<?php echo esc_attr(get_option('bt_agent_python_url')); ?>" class="regular-text">

                <label>API Key</label>
                <input type="text" name="bt_agent_api_key" value="<?php echo esc_attr(get_option('bt_agent_api_key')); ?>" class="regular-text">

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}
