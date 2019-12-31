<?php // Simple Ajax Chat > Uninstall

if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) exit();

global $wpdb;

// delete sac table
$table_name = $wpdb->prefix .'ajax_chat';
$wpdb->query("DROP TABLE IF EXISTS {$table_name}");

// delete sac options
delete_option('sac_options');
delete_option('sac_censors');

// delete sac transients
delete_transient('sac_logged_users');