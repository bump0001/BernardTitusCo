<?php

class BT_Agent_Actions {

    public static function execute($data) {
        $action = $data['action'] ?? '';

        switch ($action) {

            case 'create_post':
                return wp_insert_post([
                    'post_title'   => $data['title'],
                    'post_content' => $data['content'],
                    'post_status'  => 'draft'
                ]);

            case 'update_post':
                return wp_update_post([
                    'ID'           => $data['id'],
                    'post_title'   => $data['title'],
                    'post_content' => $data['content']
                ]);

            case 'create_category':
                return wp_insert_term($data['name'], 'category');

            default:
                return ['error' => 'Unknown action'];
        }
    }
}
