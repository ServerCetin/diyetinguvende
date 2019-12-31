<?php // Simple Ajax Chat - Show Support Panel

if (!function_exists('add_action')) die();

$plugin_project = esc_html__('Simple Ajax Chat', 'simple-ajax-chat');

$plugin_url = esc_url(plugin_dir_url(__FILE__));

$array = array(
			
	0  => '<a target="_blank" rel="noopener noreferrer" href="https://plugin-planet.com/bbq-pro/" title="Premium WP Plugin: BBQ Pro">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-bbq-pro.jpg" alt="BBQ Pro - Block Bad Queries" />
			</a>',
	1  => '<a target="_blank" rel="noopener noreferrer" href="https://plugin-planet.com/banhammer-pro/" title="Premium WP Plugin: Banhammer Pro">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-banhammer-pro.jpg" alt="Banhammer Pro - Drop the hammer." />
			</a>',
	2  => '<a target="_blank" rel="noopener noreferrer" href="https://plugin-planet.com/blackhole-pro/" title="Premium WP Plugin: Blackhole Pro">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-blackhole-pro.jpg" alt="Blackhole Pro - Block Bad Bots" />
			</a>',
	3  => '<a target="_blank" rel="noopener noreferrer" href="https://plugin-planet.com/ses-pro/" title="Premium WP Plugin: SES Pro">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-ses-pro.jpg" alt="SES Pro - Ajax-Powered Email Signup Forms" />
			</a>',
	4  => '<a target="_blank" rel="noopener noreferrer" href="https://plugin-planet.com/usp-pro/" title="Premium WP Plugin: USP Pro">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-usp-pro.jpg" alt="USP Pro - Unlimited Front-End Forms" />
			</a>',
		
	5  => '<a target="_blank" rel="noopener noreferrer" href="https://digwp.com/" title="Take your WordPress Skills to the Next Level">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-digging-into-wordpress.jpg" alt="Digging Into WordPress" />
			</a>',
	6  => '<a target="_blank" rel="noopener noreferrer" href="https://wp-tao.com/" title="Learn the Way of WordPress">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-tao-of-wordpress.jpg" alt="The Tao of WordPress" />
			</a>',
	7  => '<a target="_blank" rel="noopener noreferrer" href="https://wp-tao.com/wordpress-themes-book/" title="WordPress Themes In Depth">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-wp-themes-in-depth.jpg" alt="WordPress Themes In Depth" />
			</a>',
	8  => '<a target="_blank" rel="noopener noreferrer" href="https://htaccessbook.com/" title="Optimize and Secure with .htaccess">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-htaccess-made-easy.jpg" alt=".htaccess made easy" />
			</a>',
	9  => '<a target="_blank" rel="noopener noreferrer" href="https://plugin-planet.com/ga-google-analytics-pro/" title="Connect Google Analytics to WordPress">
				<img width="125" height="125" src="'. $plugin_url .'images/250x250-ga-pro.jpg" alt="GA Google Analytics Pro" />
			</a>',
	
);
		
$items = array_rand($array, 3);

$item1 = isset($array[$items[0]]) ? $array[$items[0]] : 0;
$item2 = isset($array[$items[1]]) ? $array[$items[1]] : 1;
$item3 = isset($array[$items[2]]) ? $array[$items[2]] : 2;

$url1 = esc_url('https://wp-tao.com/store/');
$url2 = esc_url('https://plugin-planet.com/store/');
$url3 = esc_url('https://monzillamedia.com/donate.html');

$title1 = esc_html__('Perishable Press Books', 'simple-ajax-chat');
$title2 = esc_html__('Plugin Planet',          'simple-ajax-chat');
$title3 = esc_html__('Donate via PayPal',      'simple-ajax-chat');

$link1 = ' <a target="_blank" rel="noopener noreferrer" href="'. $url1 .'" title="'. $title1 .'">'. esc_html__('books',    'simple-ajax-chat') .'</a> ';
$link2 = ' <a target="_blank" rel="noopener noreferrer" href="'. $url2 .'" title="'. $title2 .'">'. esc_html__('plugins',  'simple-ajax-chat') .'</a>, ';
$link3 = ' <a target="_blank" rel="noopener noreferrer" href="'. $url3 .'" title="'. $title3 .'">'. esc_html__('donation', 'simple-ajax-chat') .'</a>. ';

$message  = esc_html__('Thank you for using', 'simple-ajax-chat') .' '. $plugin_project .'! ';
$message .= esc_html__('Please show support by purchasing one of my', 'simple-ajax-chat') . $link1;
$message .= esc_html__('or', 'simple-ajax-chat') . $link2 . esc_html__('or by making a', 'simple-ajax-chat') . $link3;
$message .= esc_html__('Your generous support helps to ensure future development of', 'simple-ajax-chat') .' '. $plugin_project .' ';
$message .= esc_html__('and is greatly appreciated.', 'simple-ajax-chat');

$donate = esc_html__('Any size donation helps me to continue developing this free plugin and other awesome WordPress resources.', 'simple-ajax-chat');

?>

<style type="text/css">
	#project-wrap { width: 100%; overflow: hidden; }
	#project-wrap p { margin-top: 5px; font-size: 12px; }
	#project-wrap .project-support { float: left; max-width: 480px; }
	
	#project-wrap .project-links { width: 100%; overflow: hidden; margin: 15px 0; }
	#project-wrap .project-links img { display: block; width: 125px; height: 125px; margin: 0; padding: 0; border: 0; background-color: #fff; color: #fff; }
	#project-wrap .project-links a { float: left; width: 125px; height: 125px; margin: 0 0 0 15px; padding: 1px; border: 1px solid #ccc; opacity: 0.9; }
	#project-wrap .project-links a:hover { opacity: 1.0; }
	
	#project-wrap .project-blurb { 
		float: left; width: 220px; box-sizing: border-box; margin: 0 0 25px 20px; padding: 15px 20px; border-radius: 5px;
		background-color: #fefefe; border: 1px solid #ccc; box-shadow: 0 20px 25px -20px rgba(0,0,0,0.7);
		}
	#project-wrap .project-blurb a { text-decoration: none; }
	#project-wrap .project-blurb a:hover { text-decoration: underline; }
	#project-wrap .project-blurb p { margin-left: 0; margin-right: 0; }
	#project-wrap .project-blurb p:first-child { margin: 0 0 10px 0; font-size: 13px; }
	#project-wrap .project-blurb ul { margin: 0; padding: 0; font-size: 12px; }
	#project-wrap .project-blurb li { margin: 5px 0; list-style: none; }
	
	@media (max-width: 520px) {
		#project-wrap .project-links a { margin-bottom: 15px; }
	}
</style>
<div id="project-wrap">
	<div class="project-support">
		<div class="project-message">
			<p><?php echo $message; ?></p>
		</div>
		<div class="project-links">
			<?php echo $item1 . $item2 . $item3; ?>
		</div>
	</div>
	<div class="project-blurb">
		<p><strong>Please Donate</strong></p>
		<p><?php echo $donate; ?></p>
		<ul>
			<li><a target="_blank" rel="noopener noreferrer" href="https://monzillamedia.com/donate.html">Make a donation&nbsp;&raquo;</a></li>
		</ul>
	</div>
</div>