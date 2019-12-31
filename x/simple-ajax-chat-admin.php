<?php // Simple Ajax Chat > Plugin Settings

if (!defined('ABSPATH')) exit;



// default options
function sac_default_options() {
	
	global $sac_version;
	
	return array(
		'sac_version'         => $sac_version,
		'default_options'     => 0,
		'sac_fade_from'       => '#ffffcc',
		'sac_fade_to'         => '#ffffff',
		'sac_update_seconds'  => '3000',
		'sac_fade_length'     => '1500',
		'sac_text_color'      => '#777777', // not used
		'sac_name_color'      => '#333333', // not used
		'sac_use_url'         => true,
		'sac_use_textarea'    => true,
		'sac_registered_only' => false,
		'sac_enable_style'    => true,
		'sac_default_message' => esc_html__('Welcome to the Chat Forum', 'simple-ajax-chat'),
		'sac_default_handle'  => esc_html__('Simple Ajax Chat', 'simple-ajax-chat'),
		'sac_custom_styles'   => sac_default_styles(),
		'sac_content_chat'    => '',
		'sac_content_form'    => '',
		'sac_script_url'      => '',
		'sac_chat_append'     => '',
		'sac_form_append'     => '',
		'sac_play_sound'      => true,
		'sac_chat_order'      => false,
		'sac_logged_name'     => 0,
		'version_alert'       => 0,
		'max_chats'           => '999',
		'max_chars'           => '500',
		'max_uname'           => '20',
		'display_mode'        => false,
		'disable_ip'          => false,
	);
	
}



// default censors
function sac_default_censors() {
	
	return 'firstbannedword,secondbannedword,thirdbannedword';
	
}

	


// reset plugin settings
function sac_restore_defaults() {
	
	if (isset($_GET['sac_restore'])) {
		
		update_option('sac_options', sac_default_options());
		update_option('sac_censors', sac_default_censors());
		
		$url = admin_url('options-general.php?page=simple_ajax_chat');
		$query = array('sac_restore_success' => 'true');
		$redirect = add_query_arg($query, $url);
		wp_redirect(esc_url_raw($redirect));
		
	}
	
}
add_action('admin_init', 'sac_restore_defaults');



// version control
function sac_compare_version() {
	
	global $sac_version;
	
	$sac_options = get_option('sac_options', sac_default_options());
	
	$version_current = intval($sac_version);
	$version_previous = isset($sac_options['sac_version']) ? intval($sac_options['sac_version']) : $version_current;
	
	if ($version_current > $version_previous) {
		
		$sac_options['version_alert'] = 0;
		$sac_options['sac_version'] = $version_current;
		
	} else {
		
		$sac_options['sac_version'] = $version_previous;
		
	}
	
	update_option('sac_options', $sac_options);
	
}
add_action('admin_init', 'sac_compare_version');



// sanitize and validate input
function sac_validate_options($input) {
	
	if (!isset($input['default_options'])) $input['default_options'] = null;
	$input['default_options'] = ($input['default_options'] == 1 ? 1 : 0);

	if (!isset($input['sac_use_url'])) $input['sac_use_url'] = null;
	$input['sac_use_url'] = ($input['sac_use_url'] == 1 ? 1 : 0);

	if (!isset($input['sac_use_textarea'])) $input['sac_use_textarea'] = null;
	$input['sac_use_textarea'] = ($input['sac_use_textarea'] == 1 ? 1 : 0);

	if (!isset($input['sac_registered_only'])) $input['sac_registered_only'] = null;
	$input['sac_registered_only'] = ($input['sac_registered_only'] == 1 ? 1 : 0);

	if (!isset($input['sac_enable_style'])) $input['sac_enable_style'] = null;
	$input['sac_enable_style'] = ($input['sac_enable_style'] == 1 ? 1 : 0);

	if (!isset($input['sac_play_sound'])) $input['sac_play_sound'] = null;
	$input['sac_play_sound'] = ($input['sac_play_sound'] == 1 ? 1 : 0);

	if (!isset($input['sac_chat_order'])) $input['sac_chat_order'] = null;
	$input['sac_chat_order'] = ($input['sac_chat_order'] == 1 ? 1 : 0);

	if (!isset($input['sac_logged_name'])) $input['sac_logged_name'] = null;
	$input['sac_logged_name'] = ($input['sac_logged_name'] == 1 ? 1 : 0);
	
	if (!isset($input['version_alert'])) $input['version_alert'] = null;
	$input['version_alert'] = ($input['version_alert'] == 1 ? 1 : 0);
	
	if (!isset($input['display_mode'])) $input['display_mode'] = null;
	$input['display_mode'] = ($input['display_mode'] == 1 ? 1 : 0);
	
	if (!isset($input['disable_ip'])) $input['disable_ip'] = null;
	$input['disable_ip'] = ($input['disable_ip'] == 1 ? 1 : 0);
	
	$input['sac_update_seconds']  = wp_filter_nohtml_kses($input['sac_update_seconds']);
	$input['sac_fade_length']     = wp_filter_nohtml_kses($input['sac_fade_length']);
	$input['sac_fade_from']       = wp_filter_nohtml_kses($input['sac_fade_from']);
	$input['sac_fade_to']         = wp_filter_nohtml_kses($input['sac_fade_to']);
	$input['sac_text_color']      = wp_filter_nohtml_kses($input['sac_text_color']);
	$input['sac_name_color']      = wp_filter_nohtml_kses($input['sac_name_color']);
	$input['sac_default_message'] = wp_filter_nohtml_kses($input['sac_default_message']);
	$input['sac_default_handle']  = wp_filter_nohtml_kses($input['sac_default_handle']);
	$input['sac_script_url']      = wp_filter_nohtml_kses($input['sac_script_url']);
	$input['max_chats']           = wp_filter_nohtml_kses($input['max_chats']);
	$input['max_chars']           = wp_filter_nohtml_kses($input['max_chars']);
	$input['max_uname']           = wp_filter_nohtml_kses($input['max_uname']);
	
	$input['sac_custom_styles']   = wp_strip_all_tags($input['sac_custom_styles']);
	
	// dealing with kses
	global $allowedposttags;
	$allowed_atts = array(
		'align'    => array(),
		'class'    => array(),
		'type'     => array(),
		'id'       => array(),
		'dir'      => array(),
		'lang'     => array(),
		'style'    => array(),
		'xml:lang' => array(),
		'src'      => array(),
		'alt'      => array(),
		'href'     => array(),
		'rel'      => array(),
		'rev'      => array(),
		'target'   => array(),
		'title'    => array(),
		'data'     => array(),
		'width'    => array(),
		'height'   => array(),
	);
	
	$allowedposttags['strong'] = $allowed_atts;
	$allowedposttags['small'] = $allowed_atts;
	$allowedposttags['span'] = $allowed_atts;
	$allowedposttags['abbr'] = $allowed_atts;
	$allowedposttags['code'] = $allowed_atts;
	$allowedposttags['div'] = $allowed_atts;
	$allowedposttags['img'] = $allowed_atts;
	$allowedposttags['h1'] = $allowed_atts;
	$allowedposttags['h2'] = $allowed_atts;
	$allowedposttags['h3'] = $allowed_atts;
	$allowedposttags['h4'] = $allowed_atts;
	$allowedposttags['h5'] = $allowed_atts;
	$allowedposttags['ol'] = $allowed_atts;
	$allowedposttags['ul'] = $allowed_atts;
	$allowedposttags['li'] = $allowed_atts;
	$allowedposttags['em'] = $allowed_atts;
	$allowedposttags['p'] = $allowed_atts;
	$allowedposttags['a'] = $allowed_atts;

	$input['sac_content_chat'] = wp_kses_post($input['sac_content_chat'], $allowedposttags);
	$input['sac_content_form'] = wp_kses_post($input['sac_content_form'], $allowedposttags);
	$input['sac_chat_append'] = wp_kses_post($input['sac_chat_append'], $allowedposttags);
	$input['sac_form_append'] = wp_kses_post($input['sac_form_append'], $allowedposttags);

	return $input;
	
}



// validate censors
function sac_validate_options_censors($input) {
	
	if (isset($input['sac_censors'])) $input['sac_censors'] = wp_filter_nohtml_kses($input['sac_censors']);
	
	return $input;
	
}



// default styles
function sac_default_styles() {
	
	return 'div#simple-ajax-chat{width:100%;overflow:hidden;margin:0 0 20px 0;}
div#sac-content{display:none;}
div#sac-output{float:left;width:58%;height:350px;overflow:auto;border:1px solid #d1d1d1;}
div#sac-output.sac-reg-req{float:none;width:100%;height:auto;border:0;}
div#sac-latest-message{padding:5px 10px;font-size:14px;background-color:#d1d1d1;text-shadow:1px 1px 1px rgba(255,255,255,0.5);}
ul#sac-messages{margin:10px 0;padding:0;font-size:14px;line-height:20px;}
ul#sac-messages li{margin:0;padding:4px 10px;}
ul#sac-messages li span{font-weight:bold;}
div#sac-panel{float:right;width:38%;}
form#sac-form fieldset{margin:0 0 5px 0;padding:0;border:0;}
form#sac-form fieldset label,form#sac-form fieldset input,form#sac-form fieldset textarea{float:left;clear:both;width:94%;margin:0 0 2px 0;font-size:14px;}
form#sac-form fieldset textarea{height:133px;}
.tooltip{border:0;text-shadow:none;}';
	
}



// whitelist settings
function sac_init() {
	
	register_setting('sac_plugin_options', 'sac_options', 'sac_validate_options');
	register_setting('sac_plugin_options_censors', 'sac_censors', 'sac_validate_options_censors');
	
}
add_action('admin_init', 'sac_init');



// add options page
function sac_add_options_page() {
	
	global $sac_plugin;
	
	add_options_page($sac_plugin, $sac_plugin, 'manage_options', 'simple_ajax_chat', 'sac_render_form');
	
}
add_action('admin_menu', 'sac_add_options_page');



// export chat messages
function sac_export_chats() {
	
	$nonce = isset($_GET['sac-export']) ? sanitize_text_field($_GET['sac-export']) : null;
	
	if (!wp_verify_nonce($nonce, 'sac-export')) return false;
	
	if (!current_user_can('manage_options')) wp_die(__('Sorry, you are not allowed to export data.', 'simple-ajax-chat'));
	
	global $wpdb;
	
	$table = $wpdb->prefix . 'ajax_chat';
	
	$chats = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
	
	$site_name = get_bloginfo('name');
	
	$site_url = get_bloginfo('url');
	
	$export = plugin_dir_path(__FILE__) .'sac-export.csv';
	
	$fp = fopen($export, 'w');
	
	if (file_exists($export)) {
		
		$site_info = array(__('Chat Log', 'simple-ajax-chat'), $site_name, $site_url);
		
		fputcsv($fp, $site_info);
		
		fputcsv($fp, array());
		
		$headers = array(
			__('User ID',      'simple-ajax-chat'), 
			__('User IP',      'simple-ajax-chat'), 
			__('User URL',     'simple-ajax-chat'), 
			__('Chat Date',    'simple-ajax-chat'), 
			__('Chat Name',    'simple-ajax-chat'), 
			__('Chat Message', 'simple-ajax-chat'),
		);
		
		fputcsv($fp, $headers);
		
		foreach($chats as $chat) {
			
			$id   = isset($chat['id'])   ? sanitize_text_field($chat['id'])   : '';
			$time = isset($chat['time']) ? sanitize_text_field($chat['time']) : '';
			$name = isset($chat['name']) ? sanitize_text_field($chat['name']) : '';
			$text = isset($chat['text']) ? sanitize_text_field($chat['text']) : '';
			$url  = isset($chat['url'])  ? esc_url($chat['url'])              : '';
			$ip   = isset($chat['ip'])   ? sanitize_text_field($chat['ip'])   : '';
			
			$date = date("Y-m-d @ h:i:s a", $time);
			
			$fields = array($id, $ip, $url, $date, $name, $text);
			
			fputcsv($fp, $fields);
			
		}
		
		return true;
		
	} else {
		
		wp_die(__('Unable to create file. Try creating the file manually and make sure it has write permissions.', 'simple-ajax-chat'));
		
	}
	
	fclose($fp);
	
	return false;
	
}



// export chat panel
function sac_export_chat_panel() {
	
	$filepath = plugin_dir_path(__FILE__) .'sac-export.csv';
	$download = plugin_dir_url(__FILE__)  .'sac-export.csv';
	
	$export_nonce = wp_create_nonce('sac-export'); 
	$export_url   = admin_url('options-general.php?page=simple_ajax_chat');
	$export_href  = add_query_arg(array('sac-export' => $export_nonce), $export_url);
	
	$delete_nonce = wp_create_nonce('sac-export-delete'); 
	$delete_url   = admin_url('options-general.php?page=simple_ajax_chat');
	$delete_href  = add_query_arg(array('sac-export-delete' => $delete_nonce), $delete_url);
	
	$output = '<p><a id="mm-export-chats" href="'. esc_url($export_href) .'">'. esc_html__('Export all chat data in CSV format', 'simple-ajax-chat') .'</a></p>';
	
	if (sac_export_chats()) {
		
		$output .= '<p><a target="_blank" rel="noopener noreferrer" href="'. esc_url($download) .'">'. esc_html__('Download CSV File', 'simple-ajax-chat') .'</a></p>';
		
	}
	
	if (file_exists($filepath)) {
		
		$output .= '<p><a href="'. esc_url($delete_href) .'">'. esc_html__('Delete CSV File', 'simple-ajax-chat') .'</a></p>';
			
	}
	
	return $output;
	
}



// delete export file
function sac_delete_export_file() {
	
	$nonce = isset($_GET['sac-export-delete']) ? sanitize_text_field($_GET['sac-export-delete']) : null;
	
	if (!wp_verify_nonce($nonce, 'sac-export-delete')) return false;
	
	if (!current_user_can('manage_options')) wp_die(__('Sorry, you are not allowed to export data.', 'simple-ajax-chat'));
	
	$file = plugin_dir_path(__FILE__) .'sac-export.csv';
	
	unlink($file);
	
}
add_action('admin_init', 'sac_delete_export_file');



// render options page
function sac_render_form() {
	
	global $wpdb, $sac_plugin, $sac_homeurl, $sac_version, $sac_options; 
	
	$chats = $wpdb->get_results($wpdb->prepare("SELECT * FROM ". $wpdb->prefix ."ajax_chat ORDER BY id DESC LIMIT %d", $sac_options['max_chats'])); 
	
	$version_previous = isset($sac_options['sac_version']) ? esc_attr($sac_options['sac_version']) : $sac_version;
	
	$display_alert = (isset($sac_options['version_alert']) && $sac_options['version_alert']) ? ' style="display:none;"' : ' style="display:block;"';
	
	$chat_report = '<em>'. esc_html__('Warning: default message not found! Click &ldquo;Delete all chats&rdquo; to enable the chat box.', 'simple-ajax-chat') .'</em>';
	
	$count_chats = count($chats);
	
	if (!empty($chats)) {
		
		$chat_report  = '<em>';
		$chat_report .= esc_html__('Currently there ', 'simple-ajax-chat');
		$chat_report .= sprintf(_n('is %s ', 'are %s ', $count_chats, 'simple-ajax-chat'), $count_chats);
		$chat_report .= sprintf(_n('chat message.', 'chat messages.', $count_chats, 'simple-ajax-chat'), $count_chats);
		$chat_report .= '</em>';
		
	}
	
	$sac_options_restore     = isset($_GET['sac_restore_success'])  ? true : false;
	$sac_options_update      = isset($_GET['settings-updated'])     ? true : false;
	$sac_chats_delete        = isset($_GET['sac_delete'])           ? true : false;
	$sac_chats_edit          = isset($_GET['sac_edit'])             ? true : false;
	$sac_chats_clear         = isset($_GET['sac_truncate_success']) ? true : false;
	$sac_chats_export        = isset($_GET['sac-export'])           ? true : false;
	$sac_chats_export_delete = isset($_GET['sac-export-delete'])    ? true : false;
	
	$sac_action_any   = ($sac_options_restore || $sac_options_update || $sac_chats_delete || $sac_chats_edit || $sac_chats_clear) ? true : false;
	$sac_action_chats = ($sac_chats_delete || $sac_chats_edit || $sac_chats_clear) ? true : false;
	$sac_action_data  = ($sac_chats_export || $sac_chats_export_delete) ? true : false;
	
	?>
	
	<style type="text/css">
		#mm-plugin-options .mm-panel-overview {
			padding: 0 15px 15px 135px;
			background: url(<?php echo plugins_url('/simple-ajax-chat/resources/sac-logo.png'); ?>);
			background-repeat: no-repeat; background-position: 15px 0; background-size: 120px 120px;
			}
		#mm-plugin-options .mm-panel-toggle { margin: 5px 0; }
		#mm-plugin-options .mm-credit-info { margin: -10px 0 10px 5px; font-size: 12px; }
		#mm-plugin-options .button-primary, #mm-plugin-options .button-secondary { margin: 0 0 15px 15px; }
		
		#mm-plugin-options #setting-error-settings_updated { margin: 5px 0 15px 0; }
		#mm-plugin-options #setting-error-settings_updated p { margin: 7px 0 6px 0; }
		
		#mm-plugin-options .mm-table-wrap { margin: 15px; }
		#mm-plugin-options .mm-table-wrap td { padding: 5px 10px; vertical-align: middle; }
		#mm-plugin-options .mm-table-wrap .mm-table { padding: 10px 0; }
		#mm-plugin-options .mm-table-wrap .widefat th { padding: 10px 15px; vertical-align: middle; width: 20%; }
		#mm-plugin-options .mm-table-wrap .widefat td { padding: 10px; vertical-align: middle; }
		
		#mm-plugin-options h1 small { line-height: 12px; font-size: 12px; color: #bbb; }
		#mm-plugin-options h2 { margin: 0; padding: 12px 0 12px 15px; font-size: 16px; cursor: pointer; }
		#mm-plugin-options h3 { margin: 20px 15px; font-size: 14px; }
		#mm-plugin-options p { margin-left: 15px; }
		#mm-plugin-options ul { margin: 15px 15px 25px 40px; line-height: 16px; }
		#mm-plugin-options li { margin: 8px 0; list-style-type: disc; }
		#mm-plugin-options hr { margin-left: 15px; margin-right: 15px; }
		
		#mm-plugin-options textarea { width: 80%; }
		#mm-plugin-options input[type=text] { width: 60%; }
		#mm-plugin-options input[type=checkbox] { margin-top: -3px; }
		#mm-plugin-options .mm-radio-inputs { margin: 5px 0; }
		#mm-plugin-options .mm-code {  margin: 0 1px; padding: 5px; background-color: #fafae0; color: #333; font-size: 14px; }
		
		#mm-plugin-options .mm-item-caption { margin: 3px 0 0 3px; line-height: 17px; font-size: 12px; color: #777; }
		#mm-plugin-options .mm-item-caption code { margin: 0; padding: 3px; font-size: 12px; background: #f2f2f2; background-color: rgba(0,0,0,0.05); }
		#mm-plugin-options .mm-item-caption-nomargin { margin: 0; }
		#mm-plugin-options textarea + .mm-item-caption { margin: 0 0 0 3px; }
		#mm-plugin-options input[type=checkbox] + .mm-item-caption { margin: 3px 0 0 0; }
		
		#mm-plugin-options .mm-chat-latest { color: #339933; }
		#mm-plugin-options .mm-chat-list { margin: 20px 0 20px 15px; }
		#mm-plugin-options .mm-chat-list li { width: 100%; overflow: hidden; padding: 1px 0; list-style-type: none; }
		#mm-plugin-options .mm-chat-url { float: left; width: 15%; margin-top: 7px; }
		#mm-plugin-options .mm-chat-text { float: left; width: 80%; }
		#mm-plugin-options .mm-chat-text input { display: inline-block; vertical-align: middle; }
		
		#mm-plugin-options .dismiss-alert { margin: 15px; }
		#mm-plugin-options .dismiss-alert-wrap { display: inline-block; padding: 7px 0 10px 0; }
		#mm-plugin-options .dismiss-alert .description { display: inline-block; margin: -2px 0 0 0; }
		#mm-plugin-options .dismiss-alert .button-secondary { margin-bottom: 0; }
		
		@media (max-width: 1000px) {
			#mm-plugin-options input[type=text] { width: 80%; }
			#mm-plugin-options textarea { width: 90%; }
		}
		@media (max-width: 782px) {
			#mm-plugin-options .mm-radio-inputs { margin: 10px 0; }
		}
		@media (max-width: 600px) {
			#mm-plugin-options input[type=text], 
			#mm-plugin-options textarea { width: 98%; }
		}
	</style>
	
	<div id="mm-plugin-options" class="wrap">
		
		<h1><?php echo $sac_plugin; ?> <small><?php echo 'v'. $sac_version; ?></small></h1>
		
		<?php if ($sac_options_restore || $sac_chats_clear || $sac_chats_delete || $sac_chats_edit || $sac_chats_export || $sac_chats_export_delete) : ?>
		
		<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"> 
			<p>
				<strong>
					<?php 
						if ($sac_options_restore)     esc_html_e('Default settings restored.',        'simple-ajax-chat');
						if ($sac_chats_clear)         esc_html_e('All chat messages deleted.',        'simple-ajax-chat');
						if ($sac_chats_delete)        esc_html_e('Comment deleted successfully.',     'simple-ajax-chat');
						if ($sac_chats_edit)          esc_html_e('Comment edited successfully.',      'simple-ajax-chat');
						if ($sac_chats_export)        esc_html_e('Chats exported to CSV file.',       'simple-ajax-chat');
						if ($sac_chats_export_delete) esc_html_e('Export file deleted successfully.', 'simple-ajax-chat');
					?>
				</strong>
			</p>
		</div>
		
		<?php endif; ?>
		
		<div class="mm-panel-toggle">
			<a href="<?php echo admin_url('options-general.php?page=simple_ajax_chat'); ?>"><?php esc_html_e('Toggle all panels', 'simple-ajax-chat'); ?></a>
		</div>
		
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				
				<form method="post" action="options.php">
					<?php settings_fields('sac_plugin_options'); ?>
					
					<div id="mm-panel-alert"<?php echo $display_alert; ?> class="postbox">
						<h2><?php esc_html_e('Simple Ajax Chat needs your support!', 'simple-ajax-chat'); ?></h2>
						<div class="toggle">
							<div class="mm-panel-alert">
								<p>
									<?php esc_html_e('Please', 'simple-ajax-chat'); ?> <a target="_blank" rel="noopener noreferrer" href="https://monzillamedia.com/donate.html" title="<?php esc_attr_e('Make a donation via PayPal!', 'simple-ajax-chat'); ?>"><?php esc_html_e('make a donation', 'simple-ajax-chat'); ?></a> <?php esc_html_e('and/or', 'simple-ajax-chat'); ?> 
									<a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/support/plugin/simple-ajax-chat/reviews/?rate=5#new-post" title="<?php esc_attr_e('Thank you for your support!', 'simple-ajax-chat'); ?>"><?php esc_html_e('give it a 5-star rating', 'simple-ajax-chat'); ?>&nbsp;&raquo;</a>
								</p>
								<p>
									<?php esc_html_e('Your generous support enables continued development of this free plugin. Thank you!', 'simple-ajax-chat'); ?>
								</p>
								<div class="dismiss-alert">
									<div class="dismiss-alert-wrap">
										<input type="hidden" name="sac_options[sac_version]" value="<?php echo $version_previous; ?>" />  
										<input class="input-alert" name="sac_options[version_alert]" type="checkbox" value="1" <?php if (isset($sac_options['version_alert'])) checked('1', $sac_options['version_alert']); ?> />  
										<label class="description" for="sac_options[version_alert]"><?php esc_html_e('Check this box if you have shown support', 'simple-ajax-chat') ?></label>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div id="mm-panel-overview" class="postbox">
						<h2><?php esc_html_e('Overview', 'simple-ajax-chat'); ?></h2>
						<div class="toggle<?php if ($sac_action_any) echo ' default-hidden'; ?>">
							<div class="mm-panel-overview">
								<p>
									<strong><?php echo $sac_plugin; ?></strong> <?php esc_html_e('(SAC) displays an Ajax-powered chat box anywhere on your site.', 'simple-ajax-chat'); ?>
									<?php esc_html_e('Use the shortcode to display the chat box on any post or page, or use the template tag to display anywhere in your theme.', 'simple-ajax-chat'); ?>
								</p>
								<ul>
									<li><a id="mm-panel-primary-link" href="#mm-panel-primary"><?php esc_html_e('Plugin Settings', 'simple-ajax-chat'); ?></a></li>
									<li><a id="mm-panel-secondary-link" href="#mm-panel-secondary"><?php esc_html_e('Shortcode &amp; Template Tag', 'simple-ajax-chat'); ?></a></li>
									<li><a id="mm-panel-tertiary-link" href="#mm-panel-tertiary"><?php esc_html_e('Manage Chat Messages', 'simple-ajax-chat'); ?></a></li>
									<li><a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/plugins/simple-ajax-chat/"><?php esc_html_e('Plugin Homepage', 'simple-ajax-chat'); ?></a></li>
								</ul>
								<p>
									<?php esc_html_e('If you like this plugin, please', 'simple-ajax-chat'); ?> 
									<a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/support/plugin/simple-ajax-chat/reviews/?rate=5#new-post" title="<?php esc_attr_e('Thank you for your support!', 'simple-ajax-chat'); ?>"><?php esc_html_e('give it a 5-star rating', 'simple-ajax-chat'); ?>&nbsp;&raquo;</a>
								</p>
							</div>
						</div>
					</div>

					<div id="mm-panel-primary" class="postbox">
						<h2><?php esc_html_e('Plugin Settings', 'simple-ajax-chat'); ?></h2>
						<div class="toggle<?php if (!$sac_options_update) echo ' default-hidden'; ?>">
							<p><?php esc_html_e('Here you may customize Simple Ajax Chat to suit your needs. Note: after updating time and color options, you may need to refresh/empty the browser cache before you see the changes take effect.', 'simple-ajax-chat'); ?></p>
							
							<h3><?php esc_html_e('General options', 'simple-ajax-chat'); ?></h3>
							<div class="mm-table-wrap">
								<table class="widefat mm-table">
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_default_handle]"><?php esc_html_e('Default name', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="text" class="regular-text" size="50" maxlength="200" name="sac_options[sac_default_handle]" value="<?php echo esc_attr($sac_options['sac_default_handle']); ?>" />
											<div class="mm-item-caption">
												<?php esc_html_e('Default name for &ldquo;welcome&rdquo; message. Reset chat messages for new name to be displayed.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_default_message]"><?php esc_html_e('Default message', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="text" class="regular-text" size="50" maxlength="200" name="sac_options[sac_default_message]" value="<?php echo esc_attr($sac_options['sac_default_message']); ?>" />
											<div class="mm-item-caption">
												<?php esc_html_e('Default &ldquo;welcome&rdquo; message that appears as the first chat comment.', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('Reset chat messages for new welcome message to be displayed.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_registered_only]"><?php esc_html_e('Require log in', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[sac_registered_only]" value="1" <?php if (isset($sac_options['sac_registered_only'])) { checked('1', $sac_options['sac_registered_only']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Require users to be logged in to view and use the chat box.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[display_mode]"><?php esc_html_e('Display Mode', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[display_mode]" value="1" <?php if (isset($sac_options['display_mode'])) { checked('1', $sac_options['display_mode']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Display chat messages as read-only. So visitors can view chats, but not add their own.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_logged_name]"><?php esc_html_e('Logged-in username', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[sac_logged_name]" value="1" <?php if (isset($sac_options['sac_logged_name'])) { checked('1', $sac_options['sac_logged_name']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Use the logged-in username as the chat name.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_use_url]"><?php esc_html_e('Linked username', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[sac_use_url]" value="1" <?php if (isset($sac_options['sac_use_url'])) { checked('1', $sac_options['sac_use_url']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Enable users to specify a URL for their chat name.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_use_textarea]"><?php esc_html_e('Large input field', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[sac_use_textarea]" value="1" <?php if (isset($sac_options['sac_use_textarea'])) { checked('1', $sac_options['sac_use_textarea']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Display a larger input field for chat messages.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_play_sound]"><?php esc_html_e('Sound alerts', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[sac_play_sound]" value="1" <?php if (isset($sac_options['sac_play_sound'])) { checked('1', $sac_options['sac_play_sound']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Play sound alert for new chat messages.', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('See the FAQs to learn how to customize the sound alert.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_chat_order]"><?php esc_html_e('Chat order', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[sac_chat_order]" value="1" <?php if (isset($sac_options['sac_chat_order'])) { checked('1', $sac_options['sac_chat_order']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Display chats in ascending order (new messages appear at the bottom of the list). Requires jQuery.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[disable_ip]"><?php esc_html_e('Disable IP Collection', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[disable_ip]" value="1" <?php if (isset($sac_options['disable_ip'])) { checked('1', $sac_options['disable_ip']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Disable collection of IP address. No IP info will be stored in the database.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[max_chats]"><?php esc_html_e('Max chats', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="number" step="1" min="1" max="99999999" name="sac_options[max_chats]" value="<?php echo esc_attr($sac_options['max_chats']); ?>" /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Maximum number of chats that should be allowed in the chat box.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[max_chars]"><?php esc_html_e('Max characters', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="number" step="1" min="1" max="99999999" name="sac_options[max_chars]" value="<?php echo esc_attr($sac_options['max_chars']); ?>" /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Maximum number of characters that should be allowed in each chat message.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[max_uname]"><?php esc_html_e('Username length', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="number"step="1" min="1" max="99999999" name="sac_options[max_uname]" value="<?php echo esc_attr($sac_options['max_uname']); ?>" /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Maximum number of characters that should be allowed in the username.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
								</table>
							</div>
							
							<h3><?php esc_html_e('Times and colors', 'simple-ajax-chat'); ?></h3>
							<div class="mm-table-wrap">
								<table class="widefat mm-table">
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_update_seconds]"><?php esc_html_e('Update interval', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="text" size="10" maxlength="20" name="sac_options[sac_update_seconds]" value="<?php echo esc_attr($sac_options['sac_update_seconds']); ?>" />
											<div class="mm-item-caption">
												<?php esc_html_e('Refresh frequency (in milliseconds, decimals allowed).', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('Smaller numbers make new chat messages appear faster, but also increase server load.', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('The default is 3 seconds (3000 ms).', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_fade_length]"><?php esc_html_e('Fade duration', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="text" size="10" maxlength="20" name="sac_options[sac_fade_length]" value="<?php echo esc_attr($sac_options['sac_fade_length']); ?>" />
											<div class="mm-item-caption">
												<?php esc_html_e('Fade-duration of most recent chat message (in milliseconds, decimals allowed).', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('Default is 1.5 seconds (1500 ms).', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_fade_from]"><?php esc_html_e('Highlight fade (from)', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="text" size="10" maxlength="20" name="sac_options[sac_fade_from]" value="<?php echo esc_attr($sac_options['sac_fade_from']); ?>" />
											<div class="mm-item-caption">
												<?php esc_html_e('&ldquo;Fade-in&rdquo; background-color of new chat messages.', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('Color must be 6-digit-hex format, default color is #ffffcc.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_fade_to]"><?php esc_html_e('Highlight fade (to)', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="text" size="10" maxlength="20" name="sac_options[sac_fade_to]" value="<?php echo esc_attr($sac_options['sac_fade_to']); ?>" />
											<div class="mm-item-caption">
												<?php esc_html_e('&ldquo;Fade-out&rdquo; background-color of new chat messages.', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('Color must be 6-digit-hex format, default color is #ffffff.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
								</table>
							</div>
							
							<h3><?php esc_html_e('Appearance', 'simple-ajax-chat'); ?></h3>
							<div class="mm-table-wrap">
								<table class="widefat mm-table">
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_enable_style]"><?php esc_html_e('Enable custom styles?', 'simple-ajax-chat'); ?></label></th>
										<td>
											<input type="checkbox" name="sac_options[sac_enable_style]" value="1" <?php if (isset($sac_options['sac_enable_style'])) { checked('1', $sac_options['sac_enable_style']); } ?> /> 
											<span class="mm-item-caption">
												<?php esc_html_e('Check this box if you want to enable the Custom CSS styles.', 'simple-ajax-chat'); ?>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_custom_styles]"><?php esc_html_e('Custom CSS styles', 'simple-ajax-chat'); ?></label></th>
										<td>
											<textarea class="textarea large-text code" rows="5" cols="50" name="sac_options[sac_custom_styles]"><?php echo esc_textarea($sac_options['sac_custom_styles']); ?></textarea>
											<div class="mm-item-caption">
												<?php esc_html_e('Optional CSS to style the chat form. Do not include', 'simple-ajax-chat'); ?> <code>&lt;style&gt;</code> 
												<?php esc_html_e('tags. Check out', 'simple-ajax-chat'); ?> <code>/resources/sac.css</code> 
												<?php esc_html_e('for a complete list of CSS selectors.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
								</table>
							</div>
							
							<h3><?php esc_html_e('Targeted loading', 'simple-ajax-chat'); ?></h3>
							<div class="mm-table-wrap">
								<table class="widefat mm-table">
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_script_url]"><?php esc_html_e('Chat URL', 'simple-ajax-chat'); ?></label></th>
										<td>
											<textarea class="textarea large-text code" rows="3" cols="50" name="sac_options[sac_script_url]"><?php echo esc_textarea($sac_options['sac_script_url']); ?></textarea>
											<div class="mm-item-caption">
												<?php esc_html_e('By default, SAC JavaScript is included on *every* page.', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('To prevent this, and to include the required JavaScript only on the chat page, enter its URL here.', 'simple-ajax-chat'); ?> 
												<?php esc_html_e('Separate multiple URLs with a comma. Leave blank to disable.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
								</table>
							</div>
							
							<h3><?php esc_html_e('Custom content', 'simple-ajax-chat'); ?></h3>
							<div class="mm-table-wrap">
								<table class="widefat mm-table">
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_content_chat]"><?php esc_html_e('Before chat box', 'simple-ajax-chat'); ?></label></th>
										<td>
											<textarea class="textarea large-text code" rows="3" cols="50" name="sac_options[sac_content_chat]"><?php echo esc_textarea($sac_options['sac_content_chat']); ?></textarea>
											<div class="mm-item-caption">
												<?php esc_html_e('Optional custom content to appear *before* the chat box. Leave blank to disable.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_chat_append]"><?php esc_html_e('After chat box', 'simple-ajax-chat'); ?></label></th>
										<td>
											<textarea class="textarea large-text code" rows="3" cols="50" name="sac_options[sac_chat_append]"><?php echo esc_textarea($sac_options['sac_chat_append']); ?></textarea>
											<div class="mm-item-caption">
												<?php esc_html_e('Optional custom content to appear *after* the chat box. Leave blank to disable.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_content_form]"><?php esc_html_e('Before chat form', 'simple-ajax-chat'); ?></label></th>
										<td>
											<textarea class="textarea large-text code" rows="3" cols="50" name="sac_options[sac_content_form]"><?php echo esc_textarea($sac_options['sac_content_form']); ?></textarea>
											<div class="mm-item-caption">
												<?php esc_html_e('Optional custom content to appear *before* the chat form. Leave blank to disable.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
									<tr>
										<th scope="row"><label class="description" for="sac_options[sac_form_append]"><?php esc_html_e('After chat form', 'simple-ajax-chat'); ?></label></th>
										<td>
											<textarea class="textarea large-text code" rows="3" cols="50" name="sac_options[sac_form_append]"><?php echo esc_textarea($sac_options['sac_form_append']); ?></textarea>
											<div class="mm-item-caption">
												<?php esc_html_e('Optional custom content to appear *after* the chat form. Leave blank to disable.', 'simple-ajax-chat'); ?>
											</div>
										</td>
									</tr>
								</table>
							</div>
							
							<input type="submit" class="button button-primary" value="<?php esc_attr_e('Save Settings', 'simple-ajax-chat'); ?>" />
							
							<!-- maybe use these in a future update -->
							<input type="hidden" name="sac_options[sac_text_color]" value="#777777" />
							<input type="hidden" name="sac_options[sac_name_color]" value="#333333" />
							
						</div>
					</div>
					
				</form>
				
				<div id="mm-panel-quaternary" class="postbox">
					<h2><?php esc_html_e('Banned Phrases', 'simple-ajax-chat'); ?></h2>
					<div class="toggle<?php if (!$sac_options_update) echo ' default-hidden'; ?>">
						<p>
							<?php esc_html_e('Comma-separated List of banned words/phrases that never will be displayed in the chat box.', 'simple-ajax-chat'); ?> 
							<?php esc_html_e('This setting applies to usernames, URLs, and chat messages.', 'simple-ajax-chat'); ?>
						</p>
						<form method="post" action="options.php">
							
							<?php 
								$sac_censors = get_option('sac_censors', sac_default_censors()); 
								settings_fields('sac_plugin_options_censors');
							?>
							
							<div class="mm-table-wrap">
								<table class="widefat mm-table">
									<tr>
										<th scope="row"><label class="description" for="sac_censors"><?php esc_html_e('Banned phrases', 'simple-ajax-chat'); ?></label></th>
										<td><textarea class="textarea large-text code" rows="3" cols="50" name="sac_censors"><?php echo esc_textarea($sac_censors); ?></textarea></td>
									</tr>
								</table>
							</div>
							<input type="submit" class="button button-primary" value="<?php esc_attr_e('Save Settings', 'simple-ajax-chat'); ?>" />
						</form>
					</div>
				</div>
				
				<div id="mm-panel-tertiary" class="postbox">
					<h2><?php esc_html_e('Manage Chat Messages', 'simple-ajax-chat'); ?></h2>
					<div class="toggle<?php if (!$sac_action_chats) echo ' default-hidden'; ?>">
						<p>
							<?php esc_html_e('Here is a list of all chat messages. You can edit or delete any chat message.', 'simple-ajax-chat'); ?> 
							<?php esc_html_e('There must always be at least', 'simple-ajax-chat'); ?> <strong><?php esc_html_e('one message', 'simple-ajax-chat'); ?></strong> 
							<?php esc_html_e('in the chat box. Click &ldquo;Delete all chats&rdquo; to clear the database and restore the default message.', 'simple-ajax-chat'); ?> 
							<?php esc_html_e('You can customize the default message in the plugin settings.', 'simple-ajax-chat'); ?>
						</p>
						<p><?php echo $chat_report; ?></p>
						<div class="mm-table-wrap">
							
							<?php if (!empty($chats)) :
								
								$i = 1;
								
								foreach ($chats as $chat) : 
									
									if (empty($chat->url) || $chat->url == "http://" || $chat->url == "https://") $url = $chat->name;
									else $url = '<a target="_blank" rel="noopener noreferrer" href="'. $chat->url .'">'. $chat->name .'</a>';
									
									if ($i === 1) : ?>
									<div class="mm-chat-latest"><?php echo sprintf(esc_html__('Latest Message: %s ago', 'simple-ajax-chat'), sac_time_since($chat->time)); ?></div>
									<ul class="mm-chat-list">	
									<?php endif; ?>
									
									<li>
										<form method="get" action="options.php">
											<span class="mm-chat-url"><?php echo $url; ?>&nbsp;:&nbsp;</span> 
											<span class="mm-chat-text">
												<input type="text" class="regular-text" size="50" name="sac_text" value="<?php echo esc_attr($chat->text); ?>" /> 
												<input type="submit" class="button action" name="sac_delete" value="<?php esc_attr_e('Delete', 'simple-ajax-chat'); ?>" /> 
												<input type="submit" class="button action" name="sac_edit" value="<?php esc_attr_e('Edit', 'simple-ajax-chat'); ?>" /> 
												<input type="hidden" name="sac_comment_id" value="<?php echo esc_attr($chat->id); ?>" /> 
											</span>
										</form>
									</li>
									
									<?php $i++;
									
								endforeach; ?>
								
								</ul>
								
							<?php endif; ?>
							
						</div>
						<form method="get" action="options.php">
							<input type="submit" name="sac_truncate" class="button button-primary" id="mm_truncate_all" value="<?php esc_attr_e('Delete all chats', 'simple-ajax-chat'); ?>" />
						</form>
					</div>
				</div>
				
				<div id="mm-restore-settings" class="postbox">
					<h2><?php esc_html_e('Export Chat Messages', 'simple-ajax-chat'); ?></h2>
					<div class="toggle<?php if (!$sac_action_data) echo ' default-hidden'; ?>">
						
						<p>
							<?php esc_html_e('Click the "Export" link to create a CSV file named "sac-export.csv", located in the SAC plugin directory. A download link will appear after the file is created.', 'simple-ajax-chat'); ?> 
							<?php esc_html_e('Note that the export file will contain ALL chat data (including user IP), and should be deleted after download. You can delete the file by clicking the "Delete CSV" link, which will appear after the file is created.', 'simple-ajax-chat'); ?>
						</p>
						
						<?php echo sac_export_chat_panel(); ?>
						
					</div>
				</div>
				
				<div id="mm-restore-settings" class="postbox">
					<h2><?php esc_html_e('Restore Defaults', 'simple-ajax-chat'); ?></h2>
					<div class="toggle default-hidden">
						
						<p><strong><?php esc_html_e('Restore default settings', 'simple-ajax-chat'); ?></strong></p>
						<p><?php esc_html_e('Click the button to restore plugin options to their default setttings.', 'simple-ajax-chat'); ?></p>
						
						<form method="get" action="options.php">
							<input type="submit" class="button button-primary" id="mm_restore_defaults" value="<?php esc_attr_e('Restore default settings', 'simple-ajax-chat'); ?>" />
							<input type="hidden" name="sac_restore" value="Reset" />
						</form>
						
						<hr />
						
						<p><strong><?php esc_html_e('Delete all plugin settings', 'simple-ajax-chat'); ?></strong></p>
						<p><?php esc_html_e('To delete all plugin settings and chat messages from the database, simply uninstall (delete) the plugin.', 'simple-ajax-chat'); ?></p>
						
					</div>
				</div>
				
				<div id="mm-panel-secondary" class="postbox">
					<h2><?php esc_html_e('Shortcode &amp; Template Tag', 'simple-ajax-chat'); ?></h2>
					<div class="toggle default-hidden">
						
						<h3><?php esc_html_e('Shortcode', 'simple-ajax-chat'); ?></h3>
						<p><?php esc_html_e('Use this shortcode to display the chat box on any WP Post or Page:', 'simple-ajax-chat'); ?></p>
						<p><code class="mm-code">[sac_happens]</code></p>
						
						<h3><?php esc_html_e('Template tag', 'simple-ajax-chat'); ?></h3>
						<p><?php esc_html_e('Use this template tag to display the chat box anywhere in your theme template:', 'simple-ajax-chat'); ?></p>
						<p><code class="mm-code">&lt;?php if (function_exists('simple_ajax_chat')) simple_ajax_chat(); ?&gt;</code></p>
						
					</div>
				</div>
				
				<div id="mm-panel-current" class="postbox">
					<h2><?php esc_html_e('Show Support', 'simple-ajax-chat'); ?></h2>
					<div class="toggle<?php if ($sac_options_update) echo ' default-hidden'; ?>">
						<?php require_once('support-panel.php'); ?>
					</div>
				</div>

			</div>
		</div>
		
		<div class="mm-credit-info">
			<a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($sac_homeurl); ?>" title="<?php esc_attr_e('Plugin Homepage', 'simple-ajax-chat'); ?>"><?php echo esc_html($sac_plugin); ?></a> <?php esc_html_e('by', 'simple-ajax-chat'); ?> 
			<a target="_blank" rel="noopener noreferrer" href="https://twitter.com/perishable" title="<?php esc_attr_e('Jeff Starr on Twitter', 'simple-ajax-chat'); ?>">Jeff Starr</a> @ 
			<a target="_blank" rel="noopener noreferrer" href="https://monzillamedia.com/" title="<?php esc_attr_e('Obsessive Web Design &amp; Development', 'simple-ajax-chat'); ?>">Monzilla Media</a>
		</div>
		
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			// toggle panels
			jQuery('.default-hidden').hide();
			jQuery('.mm-panel-toggle a').click(function(){
				jQuery('.toggle').slideToggle(300);
				return false;
			});
			jQuery('h2').click(function(){
				jQuery(this).next().slideToggle(300);
			});
			jQuery('#mm-panel-primary-link').click(function(){
				jQuery('.toggle').hide();
				jQuery('#mm-panel-primary .toggle').slideToggle(300);
				return true;
			});
			jQuery('#mm-panel-secondary-link').click(function(){
				jQuery('.toggle').hide();
				jQuery('#mm-panel-secondary .toggle').slideToggle(300);
				return true;
			});
			jQuery('#mm-panel-tertiary-link').click(function(){
				jQuery('.toggle').hide();
				jQuery('#mm-panel-tertiary .toggle').slideToggle(300);
				return true;
			});
			//dismiss_alert
			if (!jQuery('.dismiss-alert-wrap input').is(':checked')){
				jQuery('.dismiss-alert-wrap input').one('click',function(){
					jQuery('.dismiss-alert-wrap').after('<input type="submit" class="button button-secondary" value="<?php esc_attr_e('Hide this notice', 'simple-ajax-chat'); ?>" />');
				});
			}
			// prevent accidents
			jQuery('#mm_truncate_all').click(function(){
				var r = confirm('<?php esc_html_e('Delete all messages and reset the chat box? (this action cannot be undone)', 'simple-ajax-chat'); ?>');
				if (r == true){
					return true;
				} else {
					return false;
				}
			});
			jQuery('#mm_restore_defaults').click(function(){
				var r = confirm('<?php esc_html_e('Restore default plugin settings? (this action cannot be undone)', 'simple-ajax-chat'); ?>');
				if (r == true){
					return true;
				} else {
					return false;
				}
			});
			jQuery('#mm-export-chats').click(function(){
				var r = confirm('<?php _e('Are you sure you want to create a new file on the server? It may contain sensitive data like user IP address. You can always delete the file by clicking on the "Delete CSV" link, which will appear after the file is created. Click "OK" to continue.', 'simple-ajax-chat'); ?>');
				if (r == true){
					return true;
				} else {
					return false;
				}
			});
		});
	</script>

<?php }
