<?php get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<div id="content" class="col-full">

	 <div id="main" class="col-left">
	
		  <?php if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) { ?>
		  <div id="breadcrumbs">
			  <?php woo_breadcrumbs(); ?>
		  </div><!--/#breadcrumbs -->
		  <?php } ?>
		  		  
		  <div class="post">

		        <div class="post-author-content">

				    <h1 class="title"><?php echo esc_html($term->name); ?></h1>
			  
				    <div class="entry">
						<?php print apply_filters( 'taxonomy-images-queried-term-image', '', array(
							 'after' => '</div>',
							 'attr' => array(
								'alt'   => $term->name,
								'class' => 'woo-image alignleft',
								'title' => $term->name,
								),
							 'before' => '<div class="media">',
							 'image_size' => 'medium',
							 ) ); 
			  
						if ( !empty( $term->description ) ): ?> <div class="archive-description"> <?php echo $term->description; ?> </div> <?php endif; ?>
					    
					     <?php if (function_exists('nrelate_related')) nrelate_related(); ?>
					    
				    </div> <!-- entry -->
			   	    <!--<!--<div class="post-shadow"></div>-->
			   </div> <!-- post content -->
			   
			   <?php // show slider with author's other works
			   $wp_query = new WP_Query("post_type=ajb-titles&post_status=publish&authors=" . $term->slug . '&nopaging=true"'); ?>
			   <div class="slider-container">
				 <div class="slider-header">
				    <h2 class="slider-title">Titles by <?php echo $term->name; ?></h2>
				    <div class="slider-nav">
					  <img class="back" src="/ajbassets/back_button.gif" title="Previous" alt="Previous" />
					  <img class="next" src="/ajbassets/next_button.gif" title="Next" alt="Next" />
				    </div> <!-- slider-nav -->
				 </div><!-- slider-header -->
				 <div class="slider">
				    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					  <div class="slider-item">
						<a class="slider-item-title" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(220, 165), array('class' => 'resource-item-thumbnail')); ?></a><br />
						<a class="slider-item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					  </div><!-- slider-item -->
				    <?php endwhile; ?>
				 </div><!-- slider -->
			   </div><!-- slider-container -->

		  </div><!-- post_class -->
		  
	 <?php if (function_exists('nrelate_related')) nrelate_related(); ?>
		  
	 </div><!-- #main -->

      <?php get_sidebar(); ?>

</div><!-- #content -->
		
<?php get_footer(); ?>