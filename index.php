<?php
	get_header();
	global $woo_options, $portfolio_exclude;

	if ( isset($woo_options['woo_slider']) && $woo_options['woo_slider'] == 'true' ) {
		if ( is_home() && isset($woo_options['woo_featured_tags']) && $woo_options['woo_featured_tags'] != '' ) { get_template_part( 'includes/featured' ); } else { get_template_part( 'includes/featured-error' ); }
	}
?>  
    <div id="content" class="col-full">
    	<?php
    		if ( $woo_options['woo_portfolio'] == 'true' ) {
    			get_template_part( 'loop', 'portfolio' );
    		}
    	?>
	
	<?php global $woo_options, $portfolio_exclude; ?>
	<div id="portfolio" class="masonry">
		
	    <?php if ( isset( $woo_options['woo_portfolio_panel_headers'] ) && $woo_options['woo_portfolio_panel_headers'] == 'true' ) { ?><h1 class="portfolio-title"><?php echo $woo_options['woo_portfolio_title']; ?><span class="portfolio-tagline"><?php echo $woo_options['woo_portfolio_tagline']; ?></span></h1><?php } ?>
	    <?php
		do_action( 'wp_dribbble' );
		
		$args = array( 'post_type' => 'ajb-titles', 'numberposts' => $woo_options['woo_portfolio_number'], 'exclude' => $portfolio_exclude );
		
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
		<div class="portfolio-shadow"></div>
	</div><!-- /#portfolio -->
	
		
    	<?php if ( $woo_options['woo_blog_panel'] == 'true' ) { ?>
	    	<div id="blog">
	    		<!-- #main Starts -->
	    		<div id="main" class="col-left">
				
					<div id="community">
						<div id="community-title">
							<h2>Community is...</h2>
							
							<div class="bio fl">
								<?php if ( $woo_options['woo_header_bio'] != '' ): ?>
									<p><?php echo stripslashes( $woo_options['woo_header_bio'] ); ?></p>
								<?php endif; ?>
							</div><!-- /.bio -->
							
							<a class="community-donate" href="#"></a>

						</div>
						<div id="community-buttons" class="fr">
							<a class="community-button" href="internships/" title="Volunteer and Internship Opportunities">Engaged</a><br />
							<a class="community-button" href="#" title="Our Most Recent Annual Report">Informed</a><br />
							<a class="community-button" href="#" title="Be A Book Benefactor... No Cape Required">Heroic</a><br />
							<a class="community-button" href="#" title="Ways to Get Involved">Diverse</a><br />
							<a class="community-button" href="supporters-partners/" title="Our Partners and Supporters">People</a><br />
							<div class="community-shadow"></div>										
						</div><!-- /#icons -->
					<div class="fix"></div>
					</div>
				
					<div id="blog-title">
					<?php if ( isset( $woo_options['woo_blog_panel_headers'] ) && $woo_options['woo_blog_panel_headers'] == 'true' ) { ?><h1 class="tumblog-title"><?php echo $woo_options['woo_blog_panel_header']; ?><span class="tumblog-tagline"><?php echo $woo_options['woo_blog_panel_description']; ?></span></h1><div class="title-shadow"></div><?php } ?>
					</div>
					<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; query_posts( 'paged=' . $paged . '&post_type=post&posts_per_page=' . $woo_options['woo_blog_number_of_posts'] );
						
						if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
							get_template_part( 'loop', 'tumblog' );
						} else { ?>
							<?php if ( have_posts() ) : $count = 0; ?>
							<?php while ( have_posts() ) : the_post(); $count++; ?>
							<?php
							$service = get_option( 'woo_url_shorten' );
							$category_link = get_permalink();
							?>
							
								<div id="community-posts">
								<div class="post">
														
								   <div class="post-content">
							
								    <?php if ( is_singular() ) { ?>
								    <h1 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
								    <?php } else { ?>
								    <h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								    <?php } ?>
							
								    <?php if ( ( ( is_single() ) && ( get_option( 'woo_thumb_single' ) == 'true' ) ) || ( is_home() || is_front_page() || is_archive() || is_search() ) ) { ?>
								   <div class="media">
									<?php $align_class = get_option( 'woo_thumb_align' ); ?>
								    <?php if ( is_single() ) { $width = get_option( 'woo_single_w' ); $height = get_option( 'woo_single_h' ); } else { $width = get_option( 'woo_thumb_w' ); $height = get_option( 'woo_thumb_h' ); }   ?>
								    <?php if ( get_option( 'woo_dynamic_img_height' ) != 'true' ) { $height = '&height='.$height; } else { $height = ''; } ?>
								    <?php if ( get_option( 'woo_image_link_to' ) == 'image' ) {
									?><a href="<?php echo get_post_meta( $post_id, "image", true ); ?>" title="<?php echo esc_attr( $meta_data ); ?>" rel="lightbox"><?php woo_image( 'key=image&width='.$width.$height.'&link=img&class='.$align_class ); ?></a><?php
								} else { ?>
								    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $meta_data ); ?>">
								    <?php echo woo_image( 'key=image&width='.$width.$height.'&link=img&class='.$align_class ); ?>
								    </a><?php } ?>
									</div><!-- /.media -->
									<?php } ?>
							
								    <div class="entry">
										<?php if ( ( ( get_option( 'woo_home_content' ) == 'false' ) && ( is_home() ) ) || ( ( get_option( 'woo_archive_content' ) == 'false' ) && ( is_archive() || is_search() || is_tax() ) ) ) { the_excerpt(); } elseif ( ( $pagetype == 'archive' ) && ( get_option( 'woo_archive_content' ) == 'false' ) ) { the_excerpt(); } elseif ( ( $pagetype == 'home' ) && ( get_option( 'woo_home_content' ) == 'false' ) ) { the_excerpt(); } else { the_content(); } ?>
									</div>
									<div class="post-meta">
												<?php the_tags( '<span class="tags">', ', ', '</span>' ); ?>
												<?php if ( $service != 'Off' ) { ?><span class="shorturl"><a href="<?php echo woo_short_url( get_permalink() ); ?>" title="<?php esc_attr_e( 'Short URL for', 'woothemes' ); ?> <?php the_title(); ?>"><?php _e( 'Short URL', 'woothemes' ) ?></a></span><?php } ?>
									</div>
							
									  <div class="post-shadow"></div>
							
								    </div>
								    <div class="post-more">
										<span class="like"><?php if( function_exists( 'getILikeThis' ) ) getILikeThis( 'get' ); ?></span>
										<span class="comments"><?php comments_popup_link( __( '0 Comments', 'woothemes' ), __( '1 Comments', 'woothemes' ), __( '% Comments', 'woothemes' ) ); ?></span>
								    </div>
							
								</div><!-- /.post -->
								</div>
							
								<?php if ( is_single() ) { woo_subscribe_connect(); } ?>
							
								<?php $comm = get_option( 'woo_comments' ); if ( ( $comm == "post" || $comm == "both" ) ) : ?>
									<?php comments_template( '', true ); ?>
							    <?php endif; ?>
							    <?php if ( ! is_singular() ) { woo_pagenav(); } ?>
							
									   <div class="clear"></div>
							<?php endwhile; else: ?>
								<div class="post">
									<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
								</div><!-- /.post -->
							<?php endif;
						} ?>
										
	    		   <?php if ( ( isset( $woo_options['woo_blog_page_template'] ) ) && ( $woo_options['woo_blog_page_template'] > 0 ) ) { ?><a class="fr" href="<?php echo get_permalink( $woo_options['woo_blog_page_template'] ); ?>" title="<?php esc_attr_e( 'Blog Archive', 'woothemes' ); ?>"><?php _e( 'Blog Archive', 'woothemes' ); ?> &rarr;</a><div class="fix"></div><?php } ?>
	    		   
	    		</div><!-- /#main -->
	    		<?php get_sidebar(); ?>
	    	</div>      
        <?php } ?>
    </div><!-- /#content -->		
<?php get_footer(); ?>