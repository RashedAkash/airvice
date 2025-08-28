<?php 
$header_logo= get_theme_mod('logo_image_setting_url',get_template_directory_uri().'/assets/img/logo/logo.png');
$header_button_url= get_theme_mod('header_btn_url',__('#','airvice'));
$header_button_text= get_theme_mod('header_btn_text',__('Get Quote','airvice'));
$header_language_text= get_theme_mod('header_lang_text',__('ENG','airvice'));
$rightbar_switch= get_theme_mod('header_rightbar_switch','off');
 $menu_align_class = ($rightbar_switch == 'off') ? '' : 'col-xl-10 text-end';
$header_lang= get_theme_mod('header_languages',[])

?>

<div class="header-menu header-sticky header-menu-2">
            <div class="custom-container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-3 col-8">
                        <div class="header-logo pt-15 pb-15">
                            <?php if(!empty($header_logo)): ?>
                            <a href="index.html"><img src="<?php echo esc_url($header_logo);?>" class="img-fluid" alt="img"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-4 <?php echo esc_attr($menu_align_class); ?>">
                        <div class="main-menu d-none d-lg-block">
                            <nav id="mobile-menu">
                                <?php airvice_header_menu(); ?>
                            </nav>
                        </div>
                        <div class="side-menu-icon d-lg-none text-end">
                            <button class="side-toggle"><i class="far fa-bars"></i></button>
                        </div>
                    </div>
                    <?php if($rightbar_switch == 'on'): ?>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="header-right header-right-2 text-end">
                            <ul class="z-index">
                                <li class="language"> <?php echo esc_html($header_language_text);?>
                                    <div class="language-dropdown">
                                        <?php if(!empty($header_lang)): ?>
                                        <?php foreach($header_lang as $language): ?>
                                        <a href="<?php echo esc_html($language['lang_url']); ?>"><?php echo esc_html($language['lang_name']); ?></a>
                                      <?php endforeach;  ?>
                                      <?php endif;  ?>
                                    </div>
                                </li>
                                <li><a href="<?php echo esc_url($header_button_url);?>" class="theme-btn"><?php echo esc_html($header_button_text);?></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>