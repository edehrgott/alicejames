<?php
/*
Template Name: Full Catalog
*/

	get_header();
	global $woo_options, $portfolio_exclude;

?>  
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
        <?php endif; ?>  	    
	    
	    <?php
		do_action( 'wp_dribbble' );
		
		$args = array( 'post_type' => 'ajb-titles', 'numberposts' => -1, 'exclude' => $portfolio_exclude, 'order'=> 'ASC', 'orderby' => 'title' );
		
		$portfolio = get_posts( $args );
		
		if ( ! empty( $portfolio ) ) { $count = 0;
	    ?>
		<ol class="portfolio dribbbles">
		<?php foreach( $portfolio as $post ) { setup_postdata( $post ); $count++; ?>
		    <li class="group">
			<div class="dribbble">
				<div class="dribbble-shot">
					<div class="portfolio-img dribbble-img">
						<a href="<?php the_permalink(); ?>" class="dribbble-link"><?php woo_image( 'key=portfolio-image&width=200&link=img' ); ?></a>
						<a href="<?php the_permalink(); ?>" class="dribbble-over"><?php the_title(); ?></a><br />
						<?php the_terms( $post->ID, 'authors', '', ', ' , '' ); ?><br/>
					</div>
				</div>
			</div>
		    </li>
		<?php
				}
			} // End IF Statement
		?>

		</ol>
		
		<div class="fix"></div>
		<!--<div class="portfolio-shadow"></div>-->
	</div><!-- /#portfolio -->
	
	    		</div><!-- /#main -->
	    	</div>      
    </div><!-- /#content -->		
<?php get_footer(); ?>