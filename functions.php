<?php

function ajb_scripts() {
	wp_register_script('fancybox', get_stylesheet_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.1.pack.js' );
	wp_register_script('easing', get_stylesheet_directory_uri() . '/js/easing.js' ); // used for scroller
	wp_register_script('ajb-local', get_stylesheet_directory_uri() . '/js/local.js' ); // local theme javascript
	// enqueue the scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('fancybox');
	wp_enqueue_script('easing');
	wp_enqueue_script('ajb-local');
}

add_action( 'wp_enqueue_scripts', 'ajb_scripts' );

// fancybox css
function ajb_register_styles() {
	wp_register_style( 'ajb_fancybox', get_stylesheet_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.1.css' );
}

add_action( 'wp_enqueue_styles', 'ajb_custom' );

// custom post type for titles
add_action('init', 'ajb_register_titles', 1); // Set priority to avoid plugin conflicts

function ajb_register_titles() { // A unique name for our function
 	$labels = array( // Used in the WordPress admin
		'name' => _x('Titles', 'post type general name'),
		'singular_name' => _x('Title', 'post type singular name'),
		'add_new' => _x('Add New', 'Title'),
		'add_new_item' => __('Add New Title'),
		'edit_item' => __('Edit Title'),
		'new_item' => __('New Title'),
		'view_item' => __('View Title '),
		'search_items' => __('Search Titles'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
	);
	$args = array(
		'labels' => $labels, // Set above
		'public' => true, // Make it publicly accessible
		'hierarchical' => false, // No parents and children here
		'menu_position' => 5, // Appear right below "Posts"
		'has_archive' => 'titles', // Activate the archive
		'supports' => array('title','editor','comments','thumbnail','custom-fields'),
		'taxonomies' => array('post_tag'),
	);
	register_post_type( 'ajb-titles', $args ); // Create the post type, use options above
}

// authors custom taxonomy
$labels_author = array(
	'name' => _x( 'Authors', 'taxonomy general name' ),
	'singular_name' => _x( 'author', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search authors' ),
	'popular_items' => __( 'Popular authors' ),
	'all_items' => __( 'All authors' ),
	'edit_item' => __( 'Edit author' ),
	'update_item' => __( 'Update author' ),
	'add_new_item' => __( 'Add New author' ),
	'new_item_name' => __( 'New author Name' ),
	'separate_items_with_commas' => __( 'Separate authors with commas' ),
	'add_or_remove_items' => __( 'Add or remove authors' ),
	'choose_from_most_used' => __( 'Choose from the most used authors' )
);

register_taxonomy(
	'authors', // The name of the custom taxonomy
	array( 'ajb-titles' ), // Associate it with our custom post type
	array(
		'rewrite' => array( // Use "authors" in the permalink to differentriate from post author
			'slug' => 'authors',
			'with_front' => false
			),
		'labels' => $labels_author,
      )
);

// attributes custom taxonomy
$labels_attributes = array(
	'name' => _x( 'Attributes', 'taxonomy general name' ),
	'singular_name' => _x( 'attribute', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search attributes' ),
	'all_items' => __( 'All attributes' ),
	'parent_item' => __( 'Parent attribute' ),
	'parent_item_colon' => __( 'Parent attribute:' ),
	'edit_item' => __( 'Edit attribute' ),
	'update_item' => __( 'Update attribute' ),
	'add_new_item' => __( 'Add New attribute' ),
	'new_item_name' => __( 'New attribute Name' ),
);

register_taxonomy(
	'attributes', // The name of the custom taxonomy
	array( 'ajb-titles' ), // Associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'attribute', // Use "attribute" instead of "attributes" in permalinks
			'hierarchical' => true // Allows sub-attributes to appear in permalinks
			),
		'labels' => $labels_attributes
      )
);

// show custom taxonomy columns on admin back end
add_filter( 'manage_ajb-titles_posts_columns', 'ajb_cpt_columns' );
add_action('manage_ajb-titles_posts_custom_column', 'ajb_cpt_custom_column', 10, 2);

function ajb_cpt_columns($columns){
	$defaults['title'] = 'Title';
	$defaults['authors'] = 'Authors';
	$defaults['attributes'] = 'Attributes';
	return $defaults;
}

function ajb_cpt_custom_column($column_name, $post_id) {
    $taxonomy = $column_name;
    $post_type = get_post_type($post_id);
    $terms = get_the_terms($post_id, $taxonomy);
 
    if ( !empty($terms) ) {
        foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
        echo join( ', ', $post_terms );
    }
    else echo '<i>No terms.</i>';
}

// add meta box for book meta info
add_action( 'add_meta_boxes', 'ajb_meta_box_add' );  
function ajb_meta_box_add() {
	add_meta_box( 'price-meta', 'Additional Book Info', 'ajb_book_meta', 'ajb-titles', 'side', 'low');
}

function ajb_book_meta( $post ) {
	$values = get_post_custom( $post->ID );
	$press_kit = isset( $values['press_kit'] ) ? esc_attr( $values['press_kit'][0] ) : '';
	$p_price = isset( $values['price'] ) ? esc_attr( $values['price'][0] ) : '';
	$p_isbn = isset( $values['isbn'] ) ? esc_attr( $values['isbn'][0] ) : '';
	$p_paypal_link = isset( $values['p_paypal_link'] ) ? esc_attr( $values['p_paypal_link'][0] ) : '';	
	$h_price = isset( $values['h_price'] ) ? esc_attr( $values['h_price'][0] ) : '';
	$h_isbn = isset( $values['h_isbn'] ) ? esc_attr( $values['h_isbn'][0] ) : '';	
	$h_paypal_link = isset( $values['h_paypal_link'] ) ? esc_attr( $values['h_paypal_link'][0] ) : '';	
	
	// We'll use this nonce field later on when saving.  
	wp_nonce_field( 'book_meta_box_nonce', 'meta_box_nonce' ); ?>

	<p>  
	<label for="press_kit_meta_box">Press Kit</label>  
	<input type="text" name="press_kit_meta_box" id="press_kit_meta_box" value="<?php echo $press_kit; ?>" />  
	</p>	
	<p>  
	<label for="price_meta_box">Paperback Price</label>  
	<input type="text" name="price_meta_box" id="price_meta_box" value="<?php echo $p_price; ?>" />  
	</p>
	<p>  
	<label for="isbn_meta_box">Paperback ISBN</label>  
	<input type="text" name="isbn_meta_box" id="isbn_meta_box" value="<?php echo $p_isbn; ?>" />  
	</p>
	<p>  
	<label for="p_paypal_meta_box">Paperback Paypal link</label><br />
	<input type="text" name="p_paypal_meta_box" id="p_paypal_meta_box" size="40" value="<?php echo $p_paypal_link; ?>" />  
	</p>	
	<p>  
	<label for="h_price_meta_box">Hardcover Price</label>  
	<input type="text" name="h_price_meta_box" id="h_price_meta_box" value="<?php echo $h_price; ?>" />  
	</p>
	<p>  
	<label for="h_isbn_meta_box">Hardcover ISBN</label>  
	<input type="text" name="h_isbn_meta_box" id="h_isbn_meta_box" value="<?php echo $h_isbn; ?>" />  
	</p>
	<p>  
	<label for="h_paypal_meta_box">Hardback Paypal link</label><br />
	<input type="text" name="h_paypal_meta_box" id="h_paypal_meta_box" size="40" value="<?php echo $h_paypal_link; ?>" />  
	</p>		
	<?php
}  

// save meta box data
add_action( 'save_post', 'ajb_meta_box_save' );

function ajb_meta_box_save( $post_id ) {  
	// Bail if we're doing an auto save

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
	
	// if our nonce isn't there, or we can't verify it, bail 
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'book_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail  
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data 
	$allowed = array( //not really used here but nice to have for future expansion
	    'a' => array( // on allow a tags  
		   'href' => array() // and those anchors can only have href attribute  
	    )  
	);  
  
	// Make sure your data is set before trying to save it
	if( isset( $_POST['press_kit_meta_box'] ) )  
	    update_post_meta( $post_id, 'press_kit', wp_kses( $_POST['press_kit_meta_box'], $allowed ) );  	
	if( isset( $_POST['price_meta_box'] ) )  
	    update_post_meta( $post_id, 'price', wp_kses( $_POST['price_meta_box'], $allowed ) );  
	if( isset( $_POST['isbn_meta_box'] ) )  
	    update_post_meta( $post_id, 'isbn', wp_kses( $_POST['isbn_meta_box'], $allowed ) );
	if( isset( $_POST['p_paypal_meta_box'] ) )  
	    update_post_meta( $post_id, 'p_paypal_link', wp_kses( $_POST['p_paypal_meta_box'], $allowed ) );	    
	if( isset( $_POST['h_price_meta_box'] ) )  
	    update_post_meta( $post_id, 'h_price', wp_kses( $_POST['h_price_meta_box'], $allowed ) );  
	if( isset( $_POST['h_isbn_meta_box'] ) )  
	    update_post_meta( $post_id, 'h_isbn', wp_kses( $_POST['h_isbn_meta_box'], $allowed ) );
	if( isset( $_POST['h_paypal_meta_box'] ) )  
	    update_post_meta( $post_id, 'h_paypal_link', wp_kses( $_POST['h_paypal_meta_box'], $allowed ) );	    
	    

}

// AJB options for community is...
require_once ( get_stylesheet_directory() . '/theme-options.php' );

?>