<?php

class BT_Agent_Logs {

    public static function log($data) {
        $logs = get_option('bt_agent_logs', []);
        $logs[] = [
            'timestamp' => current_time('mysql'),
            'event'     => $data
        ];
        update_option('bt_agent_logs', $logs);
        return ['status' => 'logged'];
    }

    public static function store_memory($data) {
        $mem = get_option('bt_agent_memory', []);
        $mem[] = $data;
        update_option('bt_agent_memory', $mem);
        return ['status' => 'memory_saved'];
    }
}
