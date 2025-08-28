<?php 
new \Kirki\Panel(
	'airvice_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'My Panel', 'kirki' ),
		'description' => esc_html__( 'My Panel Description.', 'kirki' ),
	]
);

function airvice_topbar(){
    new \Kirki\Section(
	'airvice_topbar',
	[
		'title'       => esc_html__( 'My Topbar Section', 'kirki' ),
		'description' => esc_html__( 'My Topbar Section Description.', 'kirki' ),
		'panel'       => 'airvice_panel',
		'priority'    => 160,
	]
);


new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_left_text_setting',
		'label'    => esc_html__( 'Text Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( 'We do not received extra charges', 'kirki' ),
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_left_icon_setting',
		'label'    => esc_html__( 'Icon Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( 'flaticon-return-of-investment', 'kirki' ),
		'priority' => 10,
	]
);


new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_right_text_day',
		'label'    => esc_html__( 'Text Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( 'Sunday to Thursday', 'kirki' ),
		'priority' => 10,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_right_icon_day',
		'label'    => esc_html__( 'Icon Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( 'flaticon-history', 'kirki' ),
		'priority' => 10,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_right_text_location',
		'label'    => esc_html__( 'Text Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( '28/4 Palmal, London', 'kirki' ),
		'priority' => 10,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_right_icon_location',
		'label'    => esc_html__( 'Icon Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( 'flaticon-pin', 'kirki' ),
		'priority' => 10,
	]
);


new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_right_text_mail',
		'label'    => esc_html__( 'Text Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( '28/4 Palmal, London', 'kirki' ),
		'priority' => 10,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_right_icon_mail',
		'label'    => esc_html__( 'Icon Control', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( 'flaticon-pin', 'kirki' ),
		'priority' => 10,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'Topbar_right_icon_mail_link',
		'label'    => esc_html__( 'Mail Link', 'kirki' ),
		'section'  => 'airvice_topbar',
		'default'  => esc_html__( 'mailto:info@sycho24.com', 'kirki' ),
		'priority' => 10,
	]
);
}
airvice_topbar();


function airvice_header(){
  new \Kirki\Section(
	'airvice_header',
	[
		'title'       => esc_html__( 'My Header Section', 'kirki' ),
		'description' => esc_html__( 'My Header Section Description.', 'kirki' ),
		'panel'       => 'airvice_panel',
		'priority'    => 160,
	]
);

new \Kirki\Field\Image(
	[
		'settings'    => 'logo_image_setting_url',
		'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
		'description' => esc_html__( 'The saved value will be the URL.', 'kirki' ),
		'section'     => 'airvice_header',
		'default'     => get_template_directory_uri().'/assets/img/logo/logo.png',
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'header_lang_text',
		'label'    => esc_html__( 'Language', 'kirki' ),
		'section'  => 'airvice_header',
		'default'  => esc_html__( 'ENG', 'kirki' ),
		'priority' => 10,
	]
);

new \Kirki\Field\Repeater( [
    'settings'     => 'header_languages',
    'label'        => esc_html__( 'Header Languages', 'textdomain' ),
    'section'      => 'airvice_header',
    'priority'     => 10,
    'row_label'    => [
        'type'  => 'field',
        'value' => esc_html__( 'Language', 'textdomain' ),
        'field' => 'lang_name',
    ],
    'button_label' => esc_html__( 'Add New Language', 'textdomain' ),
    'fields'       => [
        'lang_name' => [
            'type'        => 'text',
            'label'       => esc_html__( 'Language Name', 'textdomain' ),
            'default'     => 'Eng',
        ],
        'lang_url' => [
            'type'        => 'link',
            'label'       => esc_html__( 'Language URL', 'textdomain' ),
            'default'     => '#',
        ],
    ],
    'default'      => [
        [
            'lang_name' => 'Fre',
            'lang_url'  => '#',
        ],
        [
            'lang_name' => 'Chi',
            'lang_url'  => '#',
        ],
        [
            'lang_name' => 'Jap',
            'lang_url'  => '#',
        ],
    ],
] );


new \Kirki\Field\URL(
	[
		'settings' => 'header_btn_url',
		'label'    => esc_html__( 'URL Control', 'kirki' ),
		'section'  => 'airvice_header',
		'default'  => '#',
		'priority' => 10,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'header_btn_text',
		'label'    => esc_html__( 'Button Text', 'kirki' ),
		'section'  => 'airvice_header',
		'default'  => esc_html__( 'Get Quote', 'kirki' ),
		'priority' => 10,
	]
);

}
airvice_header();

function header_rightbar(){

	  new \Kirki\Section(
	'header_rightbar',
	[
		'title'       => esc_html__( 'My Header rightbar Section', 'kirki' ),
		'description' => esc_html__( 'My Header Section Description.', 'kirki' ),
		'panel'       => 'airvice_panel',
		'priority'    => 160,
	]
);

	new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'header_rightbar_switch',
		'label'       => esc_html__( 'Switch Field', 'kirki' ),
		'description' => esc_html__( 'Simple switch control', 'kirki' ),
		'section'     => 'header_rightbar',
		'default'     => 'off',
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'kirki' ),
			'off' => esc_html__( 'Disable', 'kirki' ),
		],
	]
);
}

header_rightbar();

function footer_bg(){
	  new \Kirki\Section(
	'footer',
	[
		'title'       => esc_html__( 'My footer Section', 'kirki' ),
		'description' => esc_html__( 'My footer Section Description.', 'kirki' ),
		'panel'       => 'airvice_panel',
		'priority'    => 160,
	]
);

new \Kirki\Field\Image(
	[
		'settings'    => 'footer_bg_image_setting',
		'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
		'description' => esc_html__( 'The saved value will be the URL.', 'kirki' ),
		'section'     => 'footer',
		'default'     => get_template_directory_uri().'/assets/img/footer/footer-bg.jpg',
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'footer_copyright_text',
		'label'    => esc_html__( 'Footer Copyright Text', 'kirki' ),
		'section'  => 'footer',
		'default'  => esc_html__( 'Copyright © 2021 <a href="#">Theme_pure</a>. All Rights Reserved.', 'kirki' ),
		'priority' => 10,
	]
);
}

footer_bg();