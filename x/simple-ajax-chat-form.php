<?php // Simple Ajax Chat > Chat Form

if (!defined('ABSPATH')) exit;

if (sac_is_session_started() === false) {
	
	$simple_ajax_chat_domain = sanitize_text_field($_SERVER['HTTP_HOST']);
	
	session_set_cookie_params('21600', '/', $simple_ajax_chat_domain, false, true);
	
	session_start();
	
}

function sac_is_session_started() {
	
	if (php_sapi_name() !== 'cli') {
		
		if (version_compare(phpversion(), '5.4.0', '>=')) {
			
			return session_status() === PHP_SESSION_ACTIVE ? true : false;
			
		} else {
			
			return session_id() === '' ? false : true;
			
		}
		
	}
	
	return false;
	
}

function sac_get_logged_class($chat_name) {
	
	$chat_name = urldecode($chat_name);
	
	$class = '';
	
	$users = get_users(array('fields' => array('ID', 'display_name')));
	
	if ($users) {
		
		foreach ($users as $user) {
			
			$online = '';
			
			if ($user->display_name === $chat_name) {
				
				$online = sac_get_logged_users($user->ID);
				
				$class = $online ? ' sac-online' : '';
				
			}
			
			if (!empty($online)) break;
			
		}
		
	}
	
	return $class;
	
}

function simple_ajax_chat() {
	
	global $wpdb, $table_prefix, $sac_options;
	
	$use_url         = isset($sac_options['sac_use_url'])         ? $sac_options['sac_use_url']         : true;
	$use_textarea    = isset($sac_options['sac_use_textarea'])    ? $sac_options['sac_use_textarea']    : true;
	$registered_only = isset($sac_options['sac_registered_only']) ? $sac_options['sac_registered_only'] : false;
	$read_only       = isset($sac_options['display_mode'])        ? $sac_options['display_mode']        : false;
	$enable_styles   = isset($sac_options['sac_enable_style'])    ? $sac_options['sac_enable_style']    : true;
	$play_sound      = isset($sac_options['sac_play_sound'])      ? $sac_options['sac_play_sound']      : true;
	$chat_order      = isset($sac_options['sac_chat_order'])      ? $sac_options['sac_chat_order']      : false;
	$use_username    = isset($sac_options['sac_logged_name'])     ? $sac_options['sac_logged_name']     : false;
	
	$custom_chat_pre = isset($sac_options['sac_content_chat']) ? $sac_options['sac_content_chat'] : '';
	$custom_form_pre = isset($sac_options['sac_content_form']) ? $sac_options['sac_content_form'] : '';
	$custom_chat_app = isset($sac_options['sac_chat_append'])  ? $sac_options['sac_chat_append']  : '';
	$custom_form_app = isset($sac_options['sac_form_append'])  ? $sac_options['sac_form_append']  : '';
	
	$max_chats = isset($sac_options['max_chats']) ? intval($sac_options['max_chats']) : 999;
	
	$display_order = $chat_order ? 'ASC' : 'DESC';
	
	$custom_styles = $enable_styles ? '<style type="text/css">'. $sac_options['sac_custom_styles'] .'</style>' : '';
	
	echo '<div id="simple-ajax-chat">';
	
	if (($registered_only && current_user_can('read')) || (!$registered_only)) {
		
		$current_user    = wp_get_current_user();
		$logged_username = sanitize_text_field($current_user->display_name);
		$logged_username = apply_filters('sac_logged_username', $logged_username, $current_user);
		
		$results = $wpdb->get_results($wpdb->prepare("SELECT * FROM ". $table_prefix ."ajax_chat ORDER BY id DESC LIMIT %d", $max_chats));
		
		echo $custom_chat_pre;
		
		echo '<div id="sac-content"></div>';
		echo '<div id="sac-output">';
		
		$sac_first_time = true;
		$sac_output     = '';
		$sac_lastout    = '';
		$lastID         = null;
			
		if ($results) {
			
			foreach ($results as $r) {
				
				$chat_text = sanitize_text_field($r->text);
				$chat_time = sanitize_text_field($r->time);
				$chat_id   = sanitize_text_field($r->id);
				$chat_url  = sanitize_text_field($r->url);
				$chat_name = sanitize_text_field($r->name);
				
				$online_class = sac_get_logged_class($chat_name);
				$name_class = preg_replace("/[\s]+/", "-", $chat_name);
				
				$pattern = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
				$chat_text = preg_replace($pattern, '<a rel="external" href="\\0" title="Open link in new tab">\\0</a>', $chat_text);
				
				if ($sac_first_time === true) $lastID = $chat_id;
				
				if (empty($chat_url) || $chat_url == 'http://' || $chat_url == 'https://') {
					
					$url = $chat_name;
					
				} else {
					
					$url = '<a rel="external" href="'. $chat_url .'">'. $chat_name .'</a>';
					
				}
				
				if ($sac_first_time == true) {
					
					$sac_lastout  = '<div id="sac-latest-message"><span>'. esc_html__('Latest Message:', 'simple-ajax-chat') .'</span> ';
					$sac_lastout .= '<em id="responseTime">'. sprintf(esc_html__('%s ago', 'simple-ajax-chat'), sac_time_since($chat_time)) .'</em></div>'. "\n";
					
				}
				
				$sac_out  = '<li class="sac-chat-message sac-static sac-user-'. $name_class . $online_class .'" data-time="'. apply_filters('sac_chat_time', date('Y-m-d,H:i:s', $chat_time)) .'">'. "\n";
				$sac_out .= '<span class="sac-chat-name" title="'. sprintf(esc_attr__('Posted %s ago', 'simple-ajax-chat'), sac_time_since($chat_time)) .'">'. $url .' : </span> ';
				$sac_out .= convert_smilies(' '. $chat_text) .'</li>'. "\n";
				
				if ($chat_order) $sac_output  = $sac_out . $sac_output;
				else             $sac_output .= $sac_out;
				
				$sac_first_time = false;
				
			}
			
		} else {
			
			$sac_output .= '<li>'. esc_html__('You need at least one entry in the chat forum!', 'simple-ajax-chat') .'</li>';
			
		}
		
		echo $sac_lastout .'<ul id="sac-messages">'. "\n" . $sac_output .'</ul>'. "\n";
		
		echo '</div>';
		
		echo $custom_chat_app;
		
		if (!$read_only || ($read_only && current_user_can('read'))) :
		
		echo $custom_form_pre; 
		
		?>
		
		<div id="sac-panel">
			<form id="sac-form" method="post" action="<?php echo plugins_url('/simple-ajax-chat/simple-ajax-chat-core.php'); ?>">
				
				<?php if ($use_username && !empty($logged_username)) : ?>
				
				<fieldset id="sac-user-info">
					<label for="sac_name"><?php esc_html_e('Name', 'simple-ajax-chat'); ?>: <span><?php echo $logged_username; ?></span></label>
					<input type="hidden" name="sac_name" id="sac_name" value="<?php echo $logged_username; ?>" />
				</fieldset>
				
				<?php else : 
					$cookie_username = '';
					if (isset($_COOKIE['sacUserName']) && !empty($_COOKIE['sacUserName'])) $cookie_username = sanitize_text_field(stripslashes($_COOKIE['sacUserName'])); 
				?>
				
				<fieldset id="sac-user-info">
					<label for="sac_name"><?php esc_html_e('Name', 'simple-ajax-chat'); ?></label> 
					<input type="text" name="sac_name" id="sac_name" value="<?php echo $cookie_username; ?>" placeholder="<?php esc_attr_e('Name', 'simple-ajax-chat'); ?>" />
				</fieldset>
				
				<?php endif;
				
				$cookie_url = 'https://';
				if (isset($_COOKIE['sacUrl']) && !empty($_COOKIE['sacUrl'])) $cookie_url = sanitize_text_field($_COOKIE['sacUrl']); 
				
				if (!$use_url) echo '<div style="display:none;">'; ?>
				
				<fieldset id="sac-user-url">
					<label for="sac_url"><?php esc_html_e('URL', 'simple-ajax-chat'); ?></label> 
					<input type="text" name="sac_url" id="sac_url" value="<?php echo $cookie_url; ?>" placeholder="<?php esc_attr_e('URL', 'simple-ajax-chat'); ?>" />
				</fieldset>
				
				<?php if (!$use_url) echo '</div>'; ?>
				
				<fieldset id="sac-user-chat">
					<label for="sac_chat"><?php esc_html_e('Message', 'simple-ajax-chat') ?></label> 
					<?php if ($use_textarea) : ?>
					
					<textarea name="sac_chat" id="sac_chat" rows="5" cols="50" onkeypress="if (typeof pressedEnter == 'function') return pressedEnter(this,event);" placeholder="<?php esc_attr_e('Message', 'simple-ajax-chat') ?>"></textarea>
					<?php else : ?>
					
					<input type="text" name="sac_chat" id="sac_chat" />
					<?php endif; ?>
					
				</fieldset>
				
				<fieldset id="sac_verify" style="display:none;height:0;width:0;">
					<label for="sac_verify"><?php esc_html_e('Human verification: leave this field empty.', 'simple-ajax-chat'); ?></label>
					<input name="sac_verify" type="text" size="33" maxlength="99" value="" />
				</fieldset>
				
				<div id="sac-user-submit">
					<div class="sac_js_nonce"></div>
					<input type="submit" id="submitchat" name="submit" class="submit" value="<?php esc_attr_e('Submit', 'simple-ajax-chat'); ?>" />
					<input type="hidden" id="sac_lastID" value="<?php echo $lastID + 1; ?>" name="sac_lastID" />
					<input type="hidden" name="sac_no_js" value="true" />
					<input type="hidden" name="PHPSESSID" value="<?php echo session_id(); ?>" />
					<?php wp_nonce_field('sac_nonce', 'sac_nonce', false); ?>
					
				</div>
			</form>
			<script>(function(){var e = document.getElementById("sac_verify");e.parentNode.removeChild(e);})();</script>
			<!-- Simple Ajax Chat @ https://perishablepress.com/simple-ajax-chat/ -->
		</div>
		
		<?php echo $custom_form_app;
		
		endif;
		
		if ($play_sound == true) : 
			
			$res_path = plugins_url('/simple-ajax-chat/resources/audio/'); ?>
			
			<audio id="TheBox">
				<source src="<?php echo $res_path; ?>msg.mp3"></source>
				<source src="<?php echo $res_path; ?>msg.ogg"></source>
				<!-- your browser does not support audio -->
			</audio>
			
		<?php endif;
		
	} else { // login required
		
		echo $custom_form_pre; ?>
		
		<div id="sac-output" class="sac-reg-req">
			<p>
				<?php 
					$login_required_message = esc_html__('You must be a registered user to participate in this chat.', 'simple-ajax-chat');
					echo apply_filters('sac_require_login_message', $login_required_message); 
				?>
			</p>
			<!--p>Please <a href="<?php wp_login_url(get_permalink()); ?>">Log in</a> to chat.</p-->
		</div>
		
		<?php echo $custom_form_app;
		
	}
	
	echo '</div>';
	
	echo $custom_styles;
	
}
