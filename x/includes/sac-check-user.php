<?php // Simple Ajax Chat > Check User

define('WP_USE_THEMES', false);
require(dirname(dirname(dirname(dirname(dirname(__FILE__))))) .'/wp-config.php');
require(ABSPATH .'/wp-load.php');

if (!defined('ABSPATH')) exit;

$sac_die = esc_html__('Please do not load this page directly. Thanks!', 'simple-ajax-chat');

if (isset($_COOKIE['PHPSESSID']) && $_COOKIE['PHPSESSID'] !== session_id()) {
	
	session_unset();
	wp_die($sac_die);
	
}

$chat_name = isset($_POST['sac_user']) ? sanitize_text_field($_POST['sac_user']) : false;
echo sac_get_logged_class($chat_name);

exit();