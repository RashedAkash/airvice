<?php


function Recent_Blogs_single_template( $template ) {
    if ( is_singular( 'Recent_Blog' )  ) {
        $new_template = __DIR__.'/single/Recent_Blogs-single.php';
	if ( '' != $new_template ) {
	    return $new_template ;
	}
    }
    return $template;
}
add_filter( 'template_include', 'Recent_Blogs_single_template', 99 );



/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function airvice_Recent_Blogs_post_type() {
	$labels = array(
		'name'                  => _x( 'Recent_Blogs', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Recent_Blog', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Recent_Blogs', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Recent_Blog', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Recent_Blog', 'textdomain' ),
		'new_item'              => __( 'New Recent_Blog', 'textdomain' ),
		'edit_item'             => __( 'Edit Recent_Blog', 'textdomain' ),
		'view_item'             => __( 'View Recent_Blog', 'textdomain' ),
		'all_items'             => __( 'All Recent_Blogs', 'textdomain' ),
		'search_items'          => __( 'Search Recent_Blogs', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Recent_Blogs:', 'textdomain' ),
		'not_found'             => __( 'No books found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Recent_Blog Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Recent_Blog archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Recent_Blogs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Recent_Blogs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Recent_Blog' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'Recent_Blogs', $args );


    // taxonomy 
	$labels = array(
		'name'              => _x( 'Recent_Blogs Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Recent_Blogs Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Recent_Blogs Categories', 'textdomain' ),
		'all_items'         => __( 'All Recent_Blogs Categories', 'textdomain' ),
		'view_item'         => __( 'View Recent_Blogs Category', 'textdomain' ),
		'parent_item'       => __( 'Parent Recent_Blogs Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Recent_Blogs Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Recent_Blogs Category', 'textdomain' ),
		'update_item'       => __( 'Update Recent_Blogs Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Recent_Blogs Category', 'textdomain' ),
		'new_item_name'     => __( 'New Recent_Blogs Category Name', 'textdomain' ),
		'not_found'         => __( 'No Recent_Blogs Categories Found', 'textdomain' ),
		'back_to_items'     => __( 'Back to Recent_Blogs Categories', 'textdomain' ),
		'menu_name'         => __( 'Recent_Blogs Category', 'textdomain' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Recent_Blog-category' ),
		'show_in_rest'      => true,
	);


	register_taxonomy( 'sv-category', 'Recent_Blogs', $args );


}

add_action( 'init', 'airvice_Recent_Blogs_post_type' );