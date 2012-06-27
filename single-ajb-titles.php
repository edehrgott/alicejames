<?php get_header(); ?>
<?php global $woo_options; ?>
       
    <div id="content" class="col-full">
		<div id="main" class="col-left">          
		           
          <?php if ( have_posts() ) : $count = 0; ?>
          <?php while ( have_posts() ) : the_post(); $count++; ?>
          <?php
          $service = get_option( 'woo_url_shorten' );
          $category_link = get_permalink();
          ?>
          
               <div class="post">
                    
                  <div class="post-title-content">
                  
                   <?php $values = get_post_custom( $post_ID );
			     $press_kit = isset( $values['press_kit'] ) ? esc_attr( $values['press_kit'][0] ) : 0;
                    $p_price = isset( $values['price'] ) ? esc_attr( $values['price'][0] ) : 0;
                    $p_isbn = isset( $values['isbn'] ) ? esc_attr( $values['isbn'][0] ) : 0;
                    $p_paypal_link = isset( $values['p_paypal_link'] ) ? $values['p_paypal_link'][0] : 0;                    
                    $h_price = isset( $values['h_price'] ) ? esc_attr( $values['h_price'][0] ) : 0;
                    $h_isbn = isset( $values['h_isbn'] ) ? esc_attr( $values['h_isbn'][0] ) : 0;
                    $h_paypal_link = isset( $values['h_paypal_link'] ) ? $values['h_paypal_link'][0] : 0;                    
                    $selected_poem = isset( $values['selected-poem'] ) ? $values['selected-poem'][0] : 0; ?>
          
                   <?php if ( ( ( is_single() ) && ( get_option( 'woo_thumb_single' ) == 'true' ) ) || ( is_home() || is_front_page() || is_archive() || is_search() ) ) { ?>
                  <div class="media alignleft">
                    <?php $align_class = get_option( 'woo_thumb_align' ); ?>
                   <?php if ( is_single() ) { $width = get_option( 'woo_single_w' ); $height = get_option( 'woo_single_h' ); } else { $width = get_option( 'woo_thumb_w' ); $height = get_option( 'woo_thumb_h' ); }   ?>
                   <?php if ( get_option( 'woo_dynamic_img_height' ) != 'true' ) { $height = '&height='.$height; } else { $height = ''; } ?>
                   <?php if ( get_option( 'woo_image_link_to' ) == 'image' ) {
                    ?><a href="<?php echo get_post_meta( $post_id, "image", true ); ?>" title="<?php echo esc_attr( $meta_data ); ?>" rel="lightbox"><?php woo_image( 'key=image&width='.$width.$height.'&link=img&class='.$align_class ); ?></a><?php
               } else { ?>
                   <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $meta_data ); ?>">
                   <?php echo woo_image( 'key=image&width='.$width.$height.'&link=img&class='.$align_class ); ?>
                   </a><?php } ?>
                    <?php
				echo (($p_price) ? '<p>Paperback Price: ' . $p_price . '<br />' : '');
                    echo (($p_isbn) ? 'Paperback ISBN: ' . $p_isbn . '</p>' : '');
                    echo (($p_paypal_link) ? '<a class="add-to-cart" href="' . $p_paypal_link . '" title="Add to Cart"></a><br />' : '');
                    echo (($h_price) ? '<p>Hardback Price: ' . $h_price . '<br />' : '');
                    echo (($h_isbn) ? 'Hardback ISBN: ' . $h_isbn . '</p>' : '');
                    echo (($h_paypal_link) ? '<a class="add-to-cart" href="' . $h_paypal_link . '" title="Add to Cart"></a><br />' : '');
                    echo (($selected_poem != '') ? '<p><a id="poem" href="#selected-poem">Selected Poem</a></p>' : '');
				echo (($press_kit != '') ? '<p><a href="http://alicejamesbooks.org/images/pdf/' . $press_kit . '">Press Kit</a></p>' : '');
				?>
                    <div style="display:none"><div id="selected-poem">
                         <p><?php echo $selected_poem; ?></p>
                    </div></div>
                    </div><!-- /.media -->
                    <?php } ?>
                    
                    <div class="post-scroll">
                         <?php if ( is_singular() ) { ?>
                         <h1 class="title post-scroll-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                         <h2 class="authors"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_term_list( $post->ID, 'authors', '', ', ', '' ); ?></a></h2><br />
                         <?php } else { ?>
                         <h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                         <?php } ?>                    
                
                         <div class="entry">
                               <?php if ( ( ( get_option( 'woo_home_content' ) == 'false' ) && ( is_home() ) ) || ( ( get_option( 'woo_archive_content' ) == 'false' ) && ( is_archive() || is_search() || is_tax() ) ) ) { the_excerpt(); } elseif ( ( $pagetype == 'archive' ) && ( get_option( 'woo_archive_content' ) == 'false' ) ) { the_excerpt(); } elseif ( ( $pagetype == 'home' ) && ( get_option( 'woo_home_content' ) == 'false' ) ) { the_excerpt(); } else { the_content(); } ?>
                          </div>
                    </div><!-- post-scroll -->
                    <div class="post-meta">
                                   <?php the_tags( '<span class="tags">', ', ', '</span>' ); ?>
                                   <?php if ( $service != 'Off' ) { ?><span class="shorturl"><a href="<?php echo woo_short_url( get_permalink() ); ?>" title="<?php esc_attr_e( 'Short URL for', 'woothemes' ); ?> <?php the_title(); ?>"><?php _e( 'Short URL', 'woothemes' ) ?></a></span><?php } ?>
                    </div>
                    
                   </div>
                   <div class="post-more">
                         <span class="like"><?php if( function_exists( 'getILikeThis' ) ) getILikeThis( 'get' ); ?></span>
                         <span class="comments"><?php comments_popup_link( __( '0 Comments', 'woothemes' ), __( '1 Comments', 'woothemes' ), __( '% Comments', 'woothemes' ) ); ?></span>
                   </div>
          
               </div><!-- /.post -->
                         
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
          <?php endif; ?>
		
		<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
        
		</div><!-- #main -->

        <?php get_sidebar(); ?>

    </div><!-- #content -->
		
<?php get_footer(); ?>