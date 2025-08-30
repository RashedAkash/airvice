<?php if ( comments_open() ) : ?>
<div class="post-comments mb-95 wow fadeInUp">
    <div class="post-comment-title mb-40">
        <h3>
            <?php
            $comment_count = get_comments_number();
            echo esc_html( $comment_count ) . ' ' . _n( 'Comment', 'Comments', $comment_count, 'airvice' );
            ?>
        </h3>
    </div>

    <?php if ( have_comments() ) : ?>
        <div class="latest-comments">
            <ul>
                <?php
                wp_list_comments( array(
                    'style'      => 'ul',
                    'avatar_size'=> 70,
                    'callback'   => 'custom_theme_comment_markup',
                ) );
                ?>
            </ul>
        </div>
        <?php
        // Pagination
        the_comments_pagination( array(
            'prev_text' => esc_html__( 'Previous', 'airvice' ),
            'next_text' => esc_html__( 'Next', 'airvice' ),
        ) );
        ?>
    <?php endif; ?>
</div>

<div class="post-comment-form wow fadeInUp">
    <?php
    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );

    $fields = array(
        'author' =>
            '<div class="col-xl-6 col-md-6"><div class="post-input">' .
            '<input type="text" name="author" id="author" placeholder="' . esc_attr__( 'Your Name', 'airvice' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . ( $req ? 'required' : '' ) . '>' .
            '</div></div>',

        'email' =>
            '<div class="col-xl-6 col-md-6"><div class="post-input">' .
            '<input type="email" name="email" id="email" placeholder="' . esc_attr__( 'Your Email', 'airvice' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . ( $req ? 'required' : '' ) . '>' .
            '</div></div>',

        'url' =>
            '<div class="col-xl-12"><div class="post-input">' .
            '<input type="text" name="url" id="url" placeholder="' . esc_attr__( 'Website', 'airvice' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '">' .
            '</div></div>',
    );

    $args = array(
        'fields'        => $fields,
        'comment_field' =>
            '<div class="col-xl-12"><div class="post-input">' .
            '<textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Your message...', 'airvice' ) . '" required></textarea>' .
            '</div></div>',

        'title_reply'   => '<h4>' . esc_html__( 'Leave a Reply', 'airvice' ) . '</h4><span>' . esc_html__( 'Your email address will not be published.', 'airvice' ) . '</span>',

        'submit_button' =>
            '<div class="col-xl-12">' .
            '<button type="submit" class="theme-btn">' . esc_html__( 'Send Message', 'airvice' ) . '</button>' .
            '</div>',

        'class_form'    => 'row',
    );

    comment_form( $args );
    ?>
</div>
<?php endif; ?>


<?php
// 🔹 Custom comment list markup (matches your HTML)
function custom_theme_comment_markup( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class( $comment->comment_parent ? 'children' : '' ); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comments-box">
            <div class="comments-avatar">
                <?php echo get_avatar( $comment, 70, '', '', array( 'class' => 'img-fluid' ) ); ?>
            </div>
            <div class="comments-text">
                <div class="avatar-name">
                    <h5><?php comment_author(); ?></h5>
                    <span class="post-meta"><?php comment_date(); ?></span>
                </div>
                <p><?php comment_text(); ?></p>
                <a href="<?php echo esc_url( get_comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ); ?>" class="comment-reply">
                    <i class="fal fa-reply"></i> <?php esc_html_e( 'Reply', 'airvice' ); ?>
                </a>
            </div>
        </div>
    </li>
    <?php
}
