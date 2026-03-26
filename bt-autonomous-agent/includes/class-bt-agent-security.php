<?php

class BT_Agent_Security {

    public static function verify_request() {
        $key = get_option('bt_agent_api_key');
        $header = $_SERVER['HTTP_X_BT_AGENT_KEY'] ?? '';

        if (!$key || $header !== $key) {
            wp_send_json(['error' => 'Unauthorized'], 401);
        }
    }
}
