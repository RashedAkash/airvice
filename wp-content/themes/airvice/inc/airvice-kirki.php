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

}
airvice_header();