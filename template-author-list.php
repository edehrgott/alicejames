<?php
/*
Template Name: Author List
*/

get_header();

	global $woo_options, $portfolio_exclude; ?>
     
	<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
	<script type="text/javascript">
	jQuery(function() {
	    // initialize scrollable without mousewheel support
	    jQuery("#full-catalog-scrollable").scrollable({ vertical: true, mousewheel: false });
	});
	</script>
	
    <div id="content" class="col-full">
    
	<?php if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) { ?>
	<div id="breadcrumbs">
		<?php woo_breadcrumbs(); ?>
	</div><!--/#breadcrumbs -->
	<?php } ?>
    
    	<?php
    		if ( $woo_options['woo_portfolio'] == 'true' ) {
    			get_template_part( 'loop', 'portfolio' );
    		}
    	?>
	
	<?php global $woo_options, $portfolio_exclude; ?>
	<div id="portfolio" class="masonry">
          
	    <h1 class="portfolio-title"><?php the_title(); ?></h1>
	    
        <?php if (have_posts()) : $count = 0; ?>
        <?php while (have_posts()) : the_post(); $count++; ?>
                                                                    
            <div <?php post_class(); ?>>


                <div id="entry-container">
			 <div class="entry">

                	<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
               	</div><!-- /.entry -->
			     <!--<!--<div class="post-shadow"></div>-->
	 			 </div>

				<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
                
            </div><!-- /.post -->
            
            <?php $comm = $woo_options[ 'woo_comments' ]; if ( ($comm == "page" || $comm == "both") ) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
                                                
		<?php endwhile; else: ?>
			<div <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ) ?></p>
            </div><!-- /.post -->
          <?php endif;
        
        	do_action( 'wp_dribbble' );
          
          $count = 0; ?>
          
	     <div id="actions">
			<a class="prev"><img src="/ajbassets/back_button.gif" title="Previous" alt="Previous" /></a>
			<a class="next"><img src="/ajbassets/next_button.gif" title="Next" alt="Next" /></a>			
		</div>
		<div id="full-catalog-scrollable">
		<div class="items">          

               <?php $terms = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'authors', 'term_args' => array( 'orderby' => 'slug',
                                                                                                                             'order' => 'ASC')));
               foreach( (array) $terms as $term) {
                    $count++;
                    echo ((($count-1) % 4 == 0) ? '<div class="item"><ol class="portfolio dribbbles full-catalog">' : ''); ?>
                    <li class="group">
                     <div class="dribbble">
                          <div class="dribbble-shot">
                               <div class="portfolio-img dribbble-img">                    
                                   <?php echo '<a href="' . home_url() . '/authors/' . $term->slug . '" class="dribbble-over">' . wp_get_attachment_image( $term->image_id, 'full' ) . '</a>'; ?>
                                   <?php echo '<a href="' . home_url() . '/authors/' . $term->slug . '" class="dribbble-over">' . $term->name . '</a><br />'; ?>
                              </div>
                         </div>
                    </div>
                    </li>
                    <?php echo (($count % 4 == 0) ? '</div></ol>' : '');                                    
               } ?>
     
     </div>
     </div>
          
	<div class="fix"></div>
     
     </div>
    
<?php get_footer(); ?>