<?php
function airvice_header_menu(){
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container'     => '',
        'menu_class'    => '',
        'menu_id'    => '',
        'fallback_cb'   => 'Airvice_Walker_Nav_Menu::fallback',
        'walker'        => new airvice_Walker_Nav_Menu,
    ));
}