<?php
    // Get the post author ID
    $author_id   = get_the_author_meta('ID');

    // Avatar size
    $avatar_size = 80;

    // Author details
    $author_name = get_the_author_meta('display_name');
    $author_bio  = get_the_author_meta('description');

    // Author role
    $author_data = get_userdata($author_id);
    $author_role = '';
    if ( $author_data && !empty($author_data->roles) ) {
        // যদি multiple role থাকে, প্রথম role নেবে
        $author_role = ucfirst( esc_html( $author_data->roles[0] ) );
    } else {
        // fallback
        $author_role = __('Author', 'airvice');
    }

    // Social profiles
    $facebook_url = get_the_author_meta('facebook_url');
    $linkedin_url = get_the_author_meta('linkedin_url');
    $viemo_url    = get_the_author_meta('viemo_url');
?>

<div class="blog__author mb-95 d-sm-flex wow fadeInUp">
    <div class="blog__author-img mr-30">
        <?php echo get_avatar( $author_id, $avatar_size, '', '', [ 'class' => 'media-object img-circle' ] );?> 
    </div>
    <div class="blog__author-content">
        <h5><?php echo esc_html($author_name); ?></h5>
        <span><?php echo esc_html($author_role); ?></span>
        <p><?php echo esc_html($author_bio); ?></p>

        <?php if ( $facebook_url || $linkedin_url || $viemo_url ) : ?>
            <div class="author-social">
                <?php if ( $facebook_url ) : ?>
                    <a href="<?php echo esc_url($facebook_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if ( $linkedin_url ) : ?>
                    <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <?php endif; ?>
                <?php if ( $viemo_url ) : ?>
                    <a href="<?php echo esc_url($viemo_url); ?>" target="_blank"><i class="fab fa-vimeo-v"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
