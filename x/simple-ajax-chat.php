<?php 
/*
	Plugin Name: Simple Ajax Chat
	Plugin URI: https://perishablepress.com/simple-ajax-chat/
	Description: Displays a fully customizable Ajax-powered chat box anywhere on your site.
	Tags: ajax, chat, chatbox, forum, messaging,  html5, im, instant message
	Author: Jeff Starr
	Author URI: https://plugin-planet.com/
	Donate link: https://monzillamedia.com/donate.html
	Contributors: specialk
	Requires at least: 4.1
	Tested up to: 5.3
	Stable tag: 20191105
	Version: 20191105
	Requires PHP: 5.6.20
	Text Domain: simple-ajax-chat
	Domain Path: /languages
	License: GPL v2 or later
*/

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 
	2 of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	with this program. If not, visit: https://www.gnu.org/licenses/
	
	Copyright 2019 Monzilla Media. All rights reserved.
*/

if (!defined('ABSPATH')) exit;

$sac_wp_vers   = '4.1';
$sac_version   = '20191105';
$sac_plugin    = 'Simple Ajax Chat';
$sac_homeurl   = 'https://perishablepress.com/simple-ajax-chat/';

$sac_lastID    = isset($_GET['sac_lastID'])  ? $_GET['sac_lastID']  : '';
$sacGetChat    = isset($_GET['sacGetChat'])  ? $_GET['sacGetChat']  : '';
$sacSendChat   = isset($_GET['sacSendChat']) ? $_GET['sacSendChat'] : '';

$sac_user_name = isset($_POST['n']) ? $_POST['n'] : '';
$sac_user_text = isset($_POST['c']) ? $_POST['c'] : '';
$sac_user_url  = isset($_POST['u']) ? $_POST['u'] : '';

require_once(dirname(__FILE__) .'/simple-ajax-chat-admin.php');
require_once(dirname(__FILE__) .'/simple-ajax-chat-form.php');

$sac_options = get_option('sac_options', sac_default_options());



// i18n
function sac_i18n_init() {
	
	load_plugin_textdomain('simple-ajax-chat', false, dirname(plugin_basename(__FILE__)) .'/languages/');
	
}
add_action('plugins_loaded', 'sac_i18n_init');



// check WP version
function sac_require_wp_version() {
	
	global $sac_plugin, $sac_wp_vers;
	
	$wp_version = get_bloginfo('version');
	
	if (isset($_GET['activate']) && $_GET['activate'] === 'true') {
		
		$plugin = plugin_basename(__FILE__);
		
		if (version_compare($wp_version, $sac_wp_vers, '<')) {
			
			if (is_plugin_active($plugin)) {
				
				deactivate_plugins($plugin);
				
				$msg  = '<strong>'. $sac_plugin .'</strong> '. esc_html__('requires WordPress ', 'simple-ajax-chat');
				$msg .= $sac_wp_vers . esc_html__(' or higher, and has been deactivated! ', 'simple-ajax-chat');
				$msg .= esc_html__('Please return to the', 'simple-ajax-chat') .' <a href="'. admin_url('update-core.php') .'">';
				$msg .= esc_html__('WordPress Admin area', 'simple-ajax-chat') .'</a> '. esc_html__('to upgrade WordPress and try again.', 'simple-ajax-chat');
				
				wp_die($msg);
				
			}
			
		}
		
	}
	
}
add_action('admin_init', 'sac_require_wp_version');



// install DB table
function sac_create_table() {
	
	global $wpdb;
	
	if (!current_user_can('activate_plugins')) return;
	
	if (isset($_GET['activate']) && $_GET['activate'] === 'true') {
		
		$table_name  = $wpdb->prefix .'ajax_chat';
		$check_table = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
		
		if ($check_table !== $table_name) {
			
			$charset_collate = $wpdb->get_charset_collate();
			
			$sql = "CREATE TABLE ". $table_name ." (
				id   mediumint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				time varchar(200)  NOT NULL DEFAULT '',
				name varchar(200)  NOT NULL DEFAULT '',
				text varchar(1000) NOT NULL DEFAULT '',
				url  varchar(200)  NOT NULL DEFAULT '',
				ip   varchar(200)  NOT NULL DEFAULT '',
				PRIMARY KEY (id)
			) ". $charset_collate .";";
			
			require_once(ABSPATH .'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			
			$wpdb->insert($table_name, array(
				
				'time' => current_time('timestamp'), 
				'name' => esc_html__('The Admin', 'simple-ajax-chat'), 
				'text' => esc_html__('High five! You&rsquo;ve successfully installed Simple Ajax Chat.', 'simple-ajax-chat'), 
				'url'  => get_home_url(),
				'ip'   => sac_get_ip_address()
				
			), array('%s', '%s', '%s', '%s', '%s'));
			
		}
		
	}
	
}
add_action('admin_init', 'sac_create_table');



// get chats
function sac_getData($sac_lastID) {
	
	global $wpdb, $table_prefix, $sac_lastID, $sacGetChat;
	
	$loop = ''; 
	
	if (isset($_GET['sac_nonce_receive']) && wp_verify_nonce($_GET['sac_nonce_receive'], 'sac_nonce_receive')) {
		
		if ((isset($sacGetChat) && $sacGetChat === 'yes') && (!empty($sac_lastID) && is_numeric($sac_lastID))) {
			
			$query = $wpdb->get_results("SELECT * FROM ". $table_prefix ."ajax_chat WHERE id > ". $sac_lastID ." ORDER BY id DESC", ARRAY_A);
			
			for ($row = 0; $row < 1; $row++) {
				
				if (isset($query[$row]) && !empty($query[$row]) && is_array($query[$row])) {
					
					$id   = isset($query[$row]['id'])   ? $query[$row]['id']   : '';
					$time = isset($query[$row]['time']) ? $query[$row]['time'] : '';
					$name = isset($query[$row]['name']) ? $query[$row]['name'] : '';
					$text = isset($query[$row]['text']) ? $query[$row]['text'] : '';
					$url  = isset($query[$row]['url'])  ? $query[$row]['url']  : '';
					
					$time = sac_time_since($time);
					
					$loop = $id .'---'. $name .'---'. $text .'---'. $time .' '. esc_html__('ago', 'simple-ajax-chat') .'---'. $url .'---';
					
				}
				
			}
			
		}
		
	}
	
	echo $loop;
	
}
add_action('init', 'sac_getData');



// edit chats
function sac_shout_edit() {
	
	global $wpdb, $table_prefix;
	
	if (!current_user_can('manage_options')) return;
	
	if (isset($_GET['sac_edit']) && isset($_GET['sac_comment_id']) && is_numeric($_GET['sac_comment_id'])) {
		
		$comment_id = $_GET['sac_comment_id'];
		
		$comment_text = isset($_GET['sac_text']) ? stripslashes($_GET['sac_text']) : '';
		
		$wpdb->query($wpdb->prepare("UPDATE ". $table_prefix ."ajax_chat SET text = %s WHERE id = %d", $comment_text, $comment_id));
		
		$url = admin_url('options-general.php?page=simple_ajax_chat');
		$query = array('sac_edit' => 'true');
		$redirect = add_query_arg($query, $url);
		wp_redirect(esc_url_raw($redirect));
		
	}
	
}
add_action('admin_init', 'sac_shout_edit');



// delete chats
function sac_shout_delete() {
	
	global $wpdb, $table_prefix;
	
	if (!current_user_can('manage_options')) return;
	
	if (isset($_GET['sac_delete']) && isset($_GET['sac_comment_id']) && is_numeric($_GET['sac_comment_id'])) {
		
		$comment_id = $_GET['sac_comment_id'];
		
		$wpdb->query($wpdb->prepare("DELETE FROM ". $table_prefix ."ajax_chat WHERE id = %d", $comment_id));
		
		$url = admin_url('options-general.php?page=simple_ajax_chat');
		$query = array('sac_delete' => 'true');
		$redirect = add_query_arg($query, $url);
		wp_redirect(esc_url_raw($redirect));
		
	}
	
}
add_action('admin_init', 'sac_shout_delete');



// truncate chats
function sac_shout_truncate() {
	
	global $wpdb, $table_prefix, $sac_options;
	
	if (!current_user_can('manage_options')) return;
	
	if (isset($_GET['sac_truncate'])) {
		
		$ip = sac_get_ip_address();
		$default_message = $sac_options['sac_default_message'];
		$default_handle  = $sac_options['sac_default_handle'];
		$sac_script_url  = $sac_options['sac_script_url'];
		if ($sac_script_url === '') $sac_script_url = site_url();
		
		$wpdb->query('TRUNCATE TABLE '. $table_prefix .'ajax_chat');
		
		$wpdb->insert($table_prefix .'ajax_chat', array(
			
			'time' => current_time('timestamp'), 
			'name' => $default_handle, 
			'text' => $default_message, 
			'url'  => $sac_script_url, 
			'ip'   => $ip
			
		), array('%s', '%s', '%s', '%s', '%s'));
		
		$url = admin_url('options-general.php?page=simple_ajax_chat');
		$query = array('sac_truncate_success' => 'true');
		$redirect = add_query_arg($query, $url);
		wp_redirect(esc_url_raw($redirect));
		
	}
	
}
add_action('admin_init', 'sac_shout_truncate');



// insert data
function sac_addData($sac_user_name, $sac_user_text, $sac_user_url) {
	
	global $wpdb, $table_prefix, $sac_options;
	
	$ip = sac_get_ip_address();
	
	$sac_user_text = substr(trim($sac_user_text), 0, $sac_options['max_chars']);
	$sac_user_text = (empty($sac_user_text)) ? '' : sac_special_chars($sac_user_text);
	
	$sac_user_name = substr(trim($sac_user_name), 0, $sac_options['max_uname']);
	$sac_user_name = (empty($sac_user_name)) ? esc_html__('Anonymous', 'simple-ajax-chat') : sanitize_text_field($sac_user_name);
	
	$use_username  = $sac_options['sac_logged_name'];
	
	$current_user  = wp_get_current_user();
	$logged_name   = sanitize_text_field($current_user->display_name);
	$logged_name   = apply_filters('sac_logged_username', $logged_name, $current_user);
	
	if ($use_username && !empty($logged_name)) $sac_user_name = $logged_name;
	
	if (empty($sac_user_url) || $sac_user_url == 'http://' || $sac_user_url == 'https://') {
		
		$sac_user_url = '';
		
	} else {
		
		$sac_user_url = esc_url($sac_user_url);
		
	}
	
	$sac_censors = get_option('sac_censors', sac_default_censors());
	
	$censors    = explode(',', strval($sac_censors));
	$censors    = array_map('trim', $censors);
	$censored   = apply_filters('sac_censor_replace', '');
	$filter_url = apply_filters('sac_filter_user_url', false);
	
	if (!empty($censors)) {
		
		foreach ($censors as $censor) {
			
			if (!empty($censor)) {
				
				if (stristr($sac_user_text, $censor)) {
					
					$sac_user_text = str_ireplace($censor, $censored, $sac_user_text);
					
				}
				
				if (stristr($sac_user_name, $censor)) {
					
					$sac_user_name = str_ireplace($censor, $censored, $sac_user_name);
					
				}
				
				if (stristr($sac_user_url, $censor) && $filter_url) {
					
					$sac_user_url = str_ireplace($censor, $censored, $sac_user_url);
					
				}
				
			}
			
		}
		
	}
	
	$wpdb->insert($table_prefix .'ajax_chat', array(
		
		'time' => current_time('timestamp'), 
		'name' => stripslashes($sac_user_name), 
		'text' => stripslashes($sac_user_text), 
		'url'  => $sac_user_url, 
		'ip'   => $ip
		
	), array('%s', '%s', '%s', '%s', '%s'));
	
}



// clean up database
function sac_deleteOld() {
	
	global $wpdb, $table_prefix, $sac_options;
	
	$a = intval($wpdb->insert_id);
	$b = intval($sac_options['max_chats']);
	
	if (($a - $b) > $b) {
		
		$c = intval($a - $b);
		
		$wpdb->query($wpdb->prepare("DELETE FROM ". $table_prefix ."ajax_chat WHERE id < %d", $c));
		
	}
	
}



// cron sixty minute interval
function sac_cron_sixty_minutes($schedules) {
	$schedules['sixty_minutes'] = array('interval' => 3600, 'display' => esc_html__('Sixty minutes'));
	return $schedules;
}
add_filter('cron_schedules', 'sac_cron_sixty_minutes');



// cron thirty minute interval
function sac_cron_thirty_minutes($schedules) {
	$schedules['thirty_minutes'] = array('interval' => 1800, 'display' => esc_html__('Thirty minutes'));
	return $schedules;
}
add_filter('cron_schedules', 'sac_cron_thirty_minutes');



// cron three minute interval
function sac_cron_three_minutes($schedules) {
	$schedules['three_minutes'] = array('interval' => 180, 'display' => esc_html__('Three minutes'));
	return $schedules;
}
add_filter('cron_schedules', 'sac_cron_three_minutes');



// cron thirty second interval
function sac_cron_thirty_seconds($schedules) {
	$schedules['thirty_seconds'] = array('interval' => 30, 'display' => esc_html__('Thirty Seconds'));
	return $schedules;
}
add_filter('cron_schedules', 'sac_cron_thirty_seconds');



// cron activate truncate
function sac_cron_activation() {
	if (!wp_next_scheduled('sac_cron_truncate')) {
		$interval = apply_filters('sac_truncate_chats_interval_filter', null);
		wp_schedule_event(time(), $interval, 'sac_cron_truncate'); // hourly, daily, twicedaily, thirty_minutes, three_minutes, thirty_seconds
	}
}
register_activation_hook(__FILE__, 'sac_cron_activation');



// cron deactivate truncate
function sac_cron_deactivation() {
	wp_clear_scheduled_hook('sac_cron_truncate');
}
register_deactivation_hook(__FILE__, 'sac_cron_deactivation');



// cron truncate chats
function sac_cron_truncate_chats() {
	
	global $wpdb, $table_prefix, $sac_options;
	
	if (!defined('DOING_CRON')) return;
	
	$default_message = isset($sac_options['sac_default_message']) ? $sac_options['sac_default_message'] : esc_html__('Welcome to the Chat Forum', 'simple-ajax-chat');
	$default_handle  = isset($sac_options['sac_default_handle'])  ? $sac_options['sac_default_handle']  : esc_html__('Simple Ajax Chat', 'simple-ajax-chat');
	
	$time = current_time('mysql');
	
	$truncate = $wpdb->query('TRUNCATE TABLE '. $table_prefix .'ajax_chat');
	
	$insert = 0;
	if ($truncate) {
		$insert = $wpdb->insert($table_prefix .'ajax_chat', array(
			
			'time' => current_time('timestamp'), 
			'name' => $default_handle, 
			'text' => $default_message, 
			'url'  => get_home_url(), 
			'ip'   => sac_get_ip_address()
					
		), array('%s', '%s', '%s', '%s', '%s'));
	}
	
	$truncate_result = esc_html__('Successfully truncated SAC table.', 'simple-ajax-chat');
	if ($truncate === false) $truncate_result = esc_html__('Unable to truncate SAC table.', 'simple-ajax-chat');
	elseif ($truncate === 0) $truncate_result = esc_html__('Truncate not needed, zero rows affected.', 'simple-ajax-chat');
	
	$insert_result = esc_html__('Successfully inserted default message.', 'simple-ajax-chat');
	if ($insert === false) $insert_result = esc_html__('Unable to insert default message.', 'simple-ajax-chat');
	elseif ($insert === 0) $insert_result = esc_html__('Default message not inserted.', 'simple-ajax-chat');
	
	do_action('sac_truncate_chats_action', $time, $truncate_result, $insert_result);
	
}
add_action('sac_cron_truncate', 'sac_cron_truncate_chats');



// display settings link on plugin page
function sac_plugin_action_links($links, $file) {
	
	$path = plugin_basename(__FILE__); // = 'simple-ajax-chat/simple-ajax-chat.php';
	
	$href = admin_url('options-general.php?page=simple_ajax_chat');
	
	if ($file == $path && current_user_can('manage_options')) {
		
		$sac_link = '<a href="'. $href .'" title="'. esc_attr__('Visit Plugin Settings', 'simple-ajax-chat') .'">'. esc_html__('Settings', 'simple-ajax-chat') .'</a>';
		
		array_unshift($links, $sac_link);
		
	}
	
	return $links;
	
}
add_filter ('plugin_action_links', 'sac_plugin_action_links', 10, 2);



// rate plugin link
function add_sac_links($links, $file) {
	
	if ($file == plugin_basename(__FILE__)) {
		
		$home_href  = 'https://perishablepress.com/simple-ajax-chat/';
		$home_title = esc_attr__('Plugin Homepage', 'simple-ajax-chat');
		$home_text  = esc_html__('Homepage', 'simple-ajax-chat');
		
		$links[] = '<a target="_blank" rel="noopener noreferrer" href="'. $home_href .'" title="'. $home_title .'">'. $home_text .'</a>';
		
		$rate_href  = 'https://wordpress.org/support/plugin/simple-ajax-chat/reviews/?rate=5#new-post';
		$rate_title = esc_attr__('Give us a 5-star rating at WordPress.org', 'simple-ajax-chat');
		$rate_text  = esc_html__('Rate this plugin', 'simple-ajax-chat') .'&nbsp;&raquo;';
		
		$links[] = '<a target="_blank" rel="noopener noreferrer" href="'. $rate_href .'" title="'. $rate_title .'">'. $rate_text .'</a>';
		
	}
	
	return $links;
	
}
add_filter('plugin_row_meta', 'add_sac_links', 10, 2);



// enqueue scripts frontend
function sac_enqueue_scripts() {
	
	global $sac_version, $sac_options;
	
	$protocol = is_ssl() ? 'https://' : 'http://';
	
	$script_url = isset($sac_options['sac_script_url']) ? $sac_options['sac_script_url'] : '';
	
	$current_url = esc_url_raw($protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	
	$resource_url = plugin_dir_url(__FILE__) .'resources/sac.php';
	
	if (!empty($script_url)) {
		
		$script_urls = explode(',', $script_url);
		
		foreach ($script_urls as $url) {
			
			$url = esc_url_raw(trim($url));
			
			if ($url === $current_url) {
				
				// wp_register_script($handle, $file, $deps, $ver, $footer);
				
				wp_register_script('sac', $resource_url, array('jquery'), null, true);
				wp_enqueue_script('sac');
				
			}
			
		}
		
	} else {
		
		wp_register_script('sac', $resource_url, array('jquery'), null, true);
		wp_enqueue_script('sac');
		
	}
	
}
add_action('wp_enqueue_scripts', 'sac_enqueue_scripts');



// sac shortcode
function sac_happens() {
	
	ob_start();
	simple_ajax_chat();
	$sac_happens = ob_get_contents();
	ob_end_clean();
	
	return $sac_happens;
	
}
add_shortcode('sac_happens','sac_happens');



// replace characters
function sac_special_chars($s) {
	
	$s = wp_strip_all_tags($s, true);
	$s = sanitize_text_field($s);
	$s = str_replace('---', '&minus;-&minus;', $s);
	
	return $s;
	
}



// get IP address
function sac_get_ip_address() {
	
	global $sac_options;
	
	$disable = isset($sac_options['disable_ip']) ? $sac_options['disable_ip'] : 0;
	
	if (isset($_SERVER)) {
		
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			
		} elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
			
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			
		} else {
			
			$ip_address = $_SERVER['REMOTE_ADDR'];
			
		}
		
	} else {
		
		if(getenv('HTTP_X_FORWARDED_FOR')) {
			
			$ip_address = getenv('HTTP_X_FORWARDED_FOR');
			
		} elseif(getenv('HTTP_CLIENT_IP')) {
			
			$ip_address = getenv('HTTP_CLIENT_IP');
			
		} else {
			
			$ip_address = getenv('REMOTE_ADDR');
			
		}
		
	}
	
	$ip_address = $disable ? esc_html__('IP collection disabled', 'scf') : $ip_address;
	
	return sanitize_text_field($ip_address);
	
}



// time since entry
function sac_time_since($original) {
	
	$chunks = array( // unix time (seconds)
		array(60 * 60 * 24 * 365 , esc_html__('year',   'simple-ajax-chat')), 
		array(60 * 60 * 24 * 30 ,  esc_html__('month',  'simple-ajax-chat')), 
		array(60 * 60 * 24 * 7,    esc_html__('week',   'simple-ajax-chat')), 
		array(60 * 60 * 24 ,       esc_html__('day',    'simple-ajax-chat')), 
		array(60 * 60 ,            esc_html__('hour',   'simple-ajax-chat')), 
		array(60 ,                 esc_html__('minute', 'simple-ajax-chat')), 
	);
	
	$original = $original - 10; // fixes bug where $time & $original match
	$today = current_time('timestamp'); // current unix time
	$since = $today - $original;
	
	for ($i = 0, $j = count($chunks); $i < $j; $i++) {
		
		$seconds = $chunks[$i][0];
		$name    = $chunks[$i][1];
		
		if (($count = floor($since / $seconds)) != 0) {
			
			break;
			
		}
		
	}
	
	$print = ($count == 1) ? '1 ' . $name : "$count {$name}" . esc_html__('s', 'simple-ajax-chat');
	
	if ($i + 1 < $j) {
		
		$seconds2 = $chunks[$i + 1][0];
		$name2    = $chunks[$i + 1][1];
		
		if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
			
			$print .= ($count2 == 1) ? ', 1 ' . $name2 : ", $count2 {$name2}" . esc_html__('s', 'simple-ajax-chat');
			
		}
		
	}
	
	return apply_filters('sac_time_since', $print);
	
}



// prevent caching
if ($sacGetChat === 'yes' || $sacSendChat === 'yes') {
	
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
	header("Last-Modified: ". gmdate("D, d M Y H:i:s") ."GMT"); 
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Pragma: no-cache");
	header("Content-Type: text/html; charset=utf-8");
	
	if (!$sac_lastID) $sac_lastID = 0;
	
}



// set transient: logged users
function sac_update_logged_users() {
		
	if (is_user_logged_in()) {
		
		if (($logged_users = get_transient('sac_logged_users')) === false) {
			
			$logged_users = array();
			
		}
		
		$current_user = wp_get_current_user();
		$current_user = $current_user->ID; 
		$current_time = current_time('timestamp');
		
		if (!isset($logged_users[$current_user]) || ($logged_users[$current_user] < ($current_time - (15 * 60)))) {
			
			$logged_users[$current_user] = $current_time;
			
			set_transient('sac_logged_users', $logged_users, 30 * 60);
			
		}
		
	}
	
}
add_action('wp', 'sac_update_logged_users');



// get transient: logged users
function sac_get_logged_users($user_id) {
	
	$logged_users = get_transient('sac_logged_users');
	
	return isset($logged_users[$user_id]) && ($logged_users[$user_id] > (current_time('timestamp') - (15 * 60)));
	
}
