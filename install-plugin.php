<?php
function glc_register_required_plugins()
{
	$plugins = array(

		// array(
		// 	'name' => 'TGM New Media Plugin',
		// 	'slug' => 'tgm-new-media-plugin', 
		// 	'source' => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip',
		// 	'required' => true, 
		// 	'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader',
		// ),

		array(
			'name' => 'Advanced Custom Fields (ACF)',
			'slug' => 'advanced-custom-fields',
			'required' => true,
		),
		array(
			'name' => 'Kirki Customizer Framework',
			'slug' => 'kirki',
			'required' => true,
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required' => true,
		),
		array(
			'name' => 'Classic Editor',
			'slug' => 'classic-editor',
			'required' => false,
		),

	);

	$config = array(
		'id' => 'growth-legacy-capital',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => true,
		'message' => '',
	);

	tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'glc_register_required_plugins');
