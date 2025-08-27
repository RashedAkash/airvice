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