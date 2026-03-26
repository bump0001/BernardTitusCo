<?php

class BT_Agent_API {

    public function __construct() {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function register_routes() {

        register_rest_route('bt-agent/v1', '/run', [
            'methods'  => 'POST',
            'callback' => [$this, 'run_task'],
            'permission_callback' => '__return_true'
        ]);

        register_rest_route('bt-agent/v1', '/memory', [
            'methods'  => 'POST',
            'callback' => [$this, 'store_memory'],
            'permission_callback' => '__return_true'
        ]);

        register_rest_route('bt-agent/v1', '/logs', [
            'methods'  => 'POST',
            'callback' => [$this, 'log_event'],
            'permission_callback' => '__return_true'
        ]);
    }

    public function run_task($request) {
        BT_Agent_Security::verify_request();
        $data = $request->get_json_params();
        return BT_Agent_Actions::execute($data);
    }

    public function store_memory($request) {
        BT_Agent_Security::verify_request();
        $data = $request->get_json_params();
        return BT_Agent_Logs::store_memory($data);
    }

    public function log_event($request) {
        BT_Agent_Security::verify_request();
        $data = $request->get_json_params();
        return BT_Agent_Logs::log($data);
    }
}
