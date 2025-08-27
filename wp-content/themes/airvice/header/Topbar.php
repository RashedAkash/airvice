  <?php
   $topbar_left= get_theme_mod('Topbar_left_text_setting',__('We do not received extra charges','airvice'));
   $topbar_left_icon= get_theme_mod('Topbar_left_icon_setting',__('flaticon-return-of-investment','airvice'));
   $topbar_day_text= get_theme_mod('Topbar_right_text_day',__('Sunday to Thursday','airvice'));
   $topbar_day_icon= get_theme_mod('Topbar_right_icon_day',__('flaticon-history','airvice'));
   $topbar_location_text= get_theme_mod('Topbar_right_text_location',__('28/4 Palmal, London','airvice'));
   $topbar_location_icon= get_theme_mod('Topbar_right_icon_location',__('flaticon-pin','airvice'));
   $topbar_mail_text= get_theme_mod('Topbar_right_text_mail',__('info@sycho24.com','airvice'));
   $topbar_mail_icon= get_theme_mod('Topbar_right_icon_mail',__('fal fa-envelope','airvice'));
   $topbar_mail_icon_link= get_theme_mod('Topbar_right_icon_mail_link',__('mailto:info@sycho24.com','airvice'));
   ?>
  
  <div class="header-top grey-bg d-none d-lg-block">
            <div class="custom-container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-top-left">
                            <span><i class="<?php echo esc_attr($topbar_left_icon); ?>"></i><?php echo esc_html($topbar_left); ?> </span>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="header-top-right">
                            <ul>
                                <li><i class="<?php echo esc_attr($topbar_day_icon); ?>"></i><?php echo esc_html($topbar_day_text); ?></li>
                                <li><i class="<?php echo esc_attr($topbar_location_icon); ?>"></i><?php echo esc_html($topbar_location_text); ?></li>
                                <li><i class="<?php echo esc_attr( $topbar_mail_icon); ?>"></i><a href="<?php echo esc_url( $topbar_mail_icon_link); ?>"><?php echo esc_html($topbar_mail_text); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>