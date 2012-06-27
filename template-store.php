<?php
/*
Template Name: Store
*/

get_header();

$attributes = get_terms( 'attributes', array(
 	'orderby'    => 'name',
	'order'      => 'ASC',
 	'hide_empty' => 1
 ) );
$count = count($attributes);
$i = 1;
?>

<div id="content" class="col-full">

	 <div id="main" class="col-left">
	
		  <?php if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) { ?>
		  <div id="breadcrumbs">
			  <?php woo_breadcrumbs(); ?>
		  </div><!--/#breadcrumbs -->
		  <?php } ?>
		  		  		  
		  <div id="entry-container">
		  
		  <div class="entry">
		  
		  <?php if ($count > 0) {			   
			   foreach($attributes as $term){ // show store slider for each attribute						
				    $wp_query = new WP_Query("post_type=ajb-titles&post_status=publish&attributes=" . $term->name . '&nopaging=true"'); ?>
				    <div id="slider-container-<?php echo $i; ?>" class="slider-container">
					  <div class="slider-header">
						<h2 class="slider-title"><?php echo $term->name; ?></h2>
						<div class="slider-nav-<?php echo $i; ?>">
						   <img class="back-<?php echo $i; ?>" src="/ajbassets/back_button.gif" title="Previous" alt="Previous" />
						   <img class="next-<?php echo $i; ?>" src="/ajbassets/next_button.gif" title="Next" alt="Next" />
						</div> <!-- slider-nav -->
					  </div><!-- slider-header -->
					  <div class="slider-<?php echo $i; ?>">
						<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						   <div class="slider-item-<?php echo $i; ?>">
							 <a class="slider-item-title" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array('class' => 'resource-item-thumbnail')); ?></a><br />
							 <a class="slider-item-title dribble-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />							 
							 <?php $values = get_post_custom( $post_ID );
							 $item_author = get_the_term_list( $post->ID, 'authors', '', ', ', '' );
							 if ($item_author) { // add class to anchor tag for author
								  $item_author = str_replace('<a href=', '<a class="slider-item-title dribble-link" href=', $item_author);
							 }
							 echo $item_author . '<br />';
							 echo esc_attr( $values['price'][0] ) . ' paperback<br />'; ?>
							 <a class="slider-item-title" href=" <?php echo $values['p_paypal_link'][0]; ?> ">Add to cart</a>
						   </div><!-- slider-item -->
						<?php endwhile; ?>
					  </div><!-- slider -->
					  <?php $i ++; ?>
				    </div><!-- slider-container -->
			   <?php }
		  } ?>
		  
		  </div><!-- entry -->
		  <!--<!--<div class="post-shadow"></div>-->  
		  </div>
	 </div><!-- #main -->

      <?php get_sidebar(); ?>

</div><!-- #content -->
		
<?php get_footer(); ?>