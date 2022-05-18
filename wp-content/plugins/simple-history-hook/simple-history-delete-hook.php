<?php
/**
 * Plugin Name: Simple History Field Delete Hook
 * Description: Trigger delete hook based on Simply History log entry
 * Version: 1.0.0
 * Author: Trushita Aranya
 * Text Domain: simple-history-delete-hook
 */

add_action( 'simple_history/log/inserted', 'simple_history_delete_hook', 10 );

function simple_history_delete_hook( $context ) {
    $data    = (object) $context;
    global $wpdb;
    $row= $wpdb->get_row("SELECT id FROM `wp_simple_history` ORDER BY id DESC LIMIT 0 , 1" );
    $simpleHistoryId = $row->id;
    $table = 'wp_simple_history_contexts';
    $wpdb->delete( $table, array( 'history_id' => $simpleHistoryId, 'key' => '_server_remote_addr' ) );
    $wpdb->delete( $table, array( 'history_id' => $simpleHistoryId, 'key' => '_user_login' ) );
    $wpdb->delete( $table, array( 'history_id' => $simpleHistoryId, 'key' => '_user_email' ) );
}