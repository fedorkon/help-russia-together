<?php
/**
 * Plugin Name:     Help Russia Together
 * Description:     Displays a banner on your site to show your support for Russia.
 * Version:         1.0.0
 * Text Domain:     help-russia-together
 * License:         GPL-2.0+
 *
 */

add_action('wp_enqueue_scripts', 'hrt_enqueue_script');

function hrt_enqueue_script($hook)
{

	$text = __("Let's help Russia together", 'help-russia-together');
	$hash_tag = '#' . str_replace(' ', '', $text);
	$plugin_url = plugin_dir_url(__FILE__);

	wp_register_script(
		'help-russia-together',
		$plugin_url . 'help-russia-together.min.js',
		array(),
		'1.0.0',
		true
	);

	wp_localize_script('help-russia-together', 'hrt_options', array(
		'text' => esc_attr($text),
		'hashtag' => esc_attr($hash_tag),
	));

	wp_enqueue_script('help-russia-together');
}

add_action('wp_head', 'hrt_output_css');

function hrt_output_css()
{
	echo apply_filters('hrt_banner_styles', '
		<style>
			#hrt_output_css_overlay {
				text-align: center;
				background-color: #fff;
				padding-top: 12px;
				position: relative;
			}
			#hrt_output_css_overlay:before,
				#hrt_output_css_overlay:after {
				display: block;
				content: "";
				height: 12px;
				width: 100%;
			}
			#hrt_output_css_overlay:before {
				background: #2455b2;
			}
			#hrt_output_css_overlay:after {
				background: #d52a1d;
			}
			#hrt_output_css_overlay span {
				display: block;
				padding: 3px 6px;
				color: #f7901e;
				text-decoration: none;
				line-height: 30px;
				top: 0;
				bottom: 0;
				margin: auto;
				z-index: 1;
				position: absolute;
				width: 100%;
				font-size: 25px;
				font-weight: bold;
				text-shadow: #000 1px 1px 0, #000 -1px -1px 0, #000 -1px 1px 0, #000 1px -1px 0;
			}

		</style>
	');
}
