<?php
$items = $number_item = $words = $show_date = $custom_class = $data_owl = $image_size = $force_image = '';
$layout = $i = 1;
$size_array = array('full', 'medium', 'large', 'thumbnail');
$atts['post_type']	= 'post';
$atts['taxonomy']	= 'category';
$list_posts			= kc_tools::get_posts( $atts );
$css_class			= apply_filters( 'kc-el-class', $atts );

extract( $atts );

$css_class[] = 'kc-blog-posts kc-blog-posts-' . $layout;
if ( !empty( $custom_class ) )
	$css_class[] = $custom_class;

switch ( $layout ) {
	case '1':
		$css_class[] 	= 'owl-carousel';
		$data_owl 		= ' data-owl-options=\'{"autoplay": "yes", "pagination": "yes", "items": "1", "tablet":1, "mobile":1}\'';
	break;
	case '3':
		$css_class[] = 'kc-blog-grid kc_blog_masonry';
	break;
	default:

	break;
}

?>

<div class="<?php echo esc_attr( implode( ' ', $css_class ) ) ;?>"<?php echo $data_owl; ?>>
	<?php if( count( $list_posts ) ): ?>

		<?php switch ( $layout ) {
		case '2':
			
			foreach ( $list_posts as $item ) :
				
				$img_url = '';
				
				if ( has_post_thumbnail( $item->ID ) ) {
					$image_id   = get_post_thumbnail_id( $item->ID );
					$image_size = ! empty( $image_size ) ? $image_size : '543x304xct';
					
					if ( in_array( $image_size, $size_array ) ) {
						$image_data = wp_get_attachment_image_src( $image_id, $image_size );
						$img_url    = $image_data[0];
					} else {
						$image_full_width = wp_get_attachment_image_src( $image_id, 'full' );
						$img_url          = kc_tools::createImageSize( $image_full_width[0], $image_size );
					}
				}else{
					
					if( $force_image == 'yes'){
						$img =  kc_first_image( $item->post_content );
						if( $img != false ) $img_url = $img;
					}
				}
				
				
				?>
				
				<div class="kc-list-item-2">
					
					<?php if ( $i % 2 == 1 ): ?>
						<?php if ( ! empty( $img_url ) ) : ?>
							<div class="post-item-left">
								<figure>
									<img src="<?php echo esc_url( $img_url ); ?>"
									     alt="<?php echo get_the_title( $item ); ?>">
								</figure>
							</div>
						<?php endif; ?>
						<div class="post-item-right">
							<div class="post_details">
								<h2 class="post-title-alt"><a
										href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
										title="<?php echo get_the_title( $item ); ?>"><?php echo get_the_title( $item ); ?></a>
								</h2>
								
								<?php if ( $show_date == 'yes' ): ?>
									<div class="post-meta">
										<span class="post-author"><i class="fa fa-user"></i>  <a
												href="<?php echo get_author_posts_url( $item->post_author ); ?>"
												title="<?php esc_html_e( 'Posts by ', 'kingcomposer' );
												echo get_the_author_meta( 'display_name', $item->post_author ); ?>"
												rel="author"><?php echo get_the_author_meta( 'display_name', $item->post_author ); ?></a></span>
										<span class="post-date"><i class="fa fa-clock-o"></i> <a
												href="<?php echo get_month_link( get_the_time( 'Y', $item->ID ), get_the_time( 'm', $item->ID ) ); ?>"><?php echo get_the_date( 'F m Y', $item->ID ); ?></a> </span>
										<?php if ( get_the_category( $item->ID ) ): ?>
											<span class="post-cats"><i class="fa fa-folder-o"
											                           aria-hidden="true"></i> <?php the_category( ', ', '', $item->ID ); ?></span>
										<?php endif ?>
									</div>
								<?php endif ?>
							</div>
							<?php if ( $words > 0 ): ?>
								<p><?php echo wp_trim_words( $item->post_content, $words ); ?></p>
							<?php endif ?>
							<a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
							   class="post-2-button"><?php esc_html_e( 'Read more', 'kingcomposer' ); ?> <i
									class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div>
					
					<?php else: ?>
						
						<div class="post-item-left">
							<div class="post_details">
								<h2 class="post-title-alt"><a
										href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
										title="<?php echo get_the_title( $item ); ?>"><?php echo get_the_title( $item ); ?></a>
								</h2>
								
								<?php if ( $show_date == 'yes' ): ?>
									<div class="post-meta">
										<span class="post-author"><i class="fa fa-user"></i>  <a
												href="<?php echo get_author_posts_url( $item->post_author ); ?>"
												title="<?php esc_html_e( 'Posts by ', 'kingcomposer' );
												echo get_the_author_meta( 'display_name', $item->post_author ); ?>"
												rel="author"><?php echo get_the_author_meta( 'display_name', $item->post_author ); ?></a></span>
										<span class="post-date"><i class="fa fa-clock-o"></i> <a
												href="<?php echo get_month_link( get_the_time( 'Y', $item->ID ), get_the_time( 'm', $item->ID ) ); ?>"><?php echo get_the_date( 'F m Y', $item->ID ); ?></a> </span>
										<?php if ( get_the_category( $item->ID ) ): ?>
											<span class="post-cats"><i class="fa fa-folder-o"
											                           aria-hidden="true"></i> <?php the_category( ', ', '', $item->ID ); ?></span>
										<?php endif ?>
									</div>
								<?php endif ?>
							</div>
							<?php if ( $words > 0 ): ?>
								<p><?php echo wp_trim_words( $item->post_content, $words ); ?></p>
							<?php endif ?>
							<a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
							   class="post-2-button"><?php esc_html_e( 'Read more', 'kingcomposer' ); ?> <i
									class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div>
						<div class="post-item-right">
							<figure>
								<img src="<?php echo esc_url( $img_url ); ?>"
								     alt="<?php echo get_the_title( $item ); ?>">
							</figure>
						</div>
					
					<?php endif ?>
				
				</div>
				
				<?php
				$i ++;
			endforeach;
			break;
		case '3':
			kc_js_callback( 'kc_front.blog.masonry' );
			foreach ( $list_posts as $item ) :
				
				$img_url = '';
				
				if ( has_post_thumbnail( $item->ID ) ) {
					$image_id   = get_post_thumbnail_id( $item->ID );
					$image_size = ! empty( $image_size ) ? $image_size : 'full';
					
					if ( in_array( $image_size, $size_array ) ) {
						$image_data = wp_get_attachment_image_src( $image_id, $image_size );
						$img_url    = $image_data[0];
					} else {
						$image_full_width = wp_get_attachment_image_src( $image_id, 'full' );
						$image_full       = $image_full_width[0];
						$img_url          = kc_tools::createImageSize( $image_full, $image_size );
					}
				}else{
					
					if( $force_image == 'yes'){
						$img =  kc_first_image( $item->post_content );
						if( $img != false ) $img_url = $img;
					}
				}
				
				
				?>
				
				<div class="post-grid grid-<?php echo $number_item; ?>">
					<div class="kc-list-item-3">
						<?php if ( ! empty( $img_url ) ) : ?>
							<a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>" class="entry-thumb-link">
								<div class="entry-thumb-wrapper">
									<img src="<?php echo esc_url( $img_url ); ?>"
									     alt="<?php echo get_the_title( $item ); ?>"/>
									<div class="entry-thumb-overlay"></div>
								</div>
							</a>
						<?php endif; ?>
						<?php if ( $show_date == 'yes' ): ?>
							<div class="entry-meta">
								<span class="entry-date"><a
										href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"><?php echo get_the_date( 'F m, Y', $item->ID ); ?></a></span>
								<?php if ( get_the_category( $item->ID ) ): ?>
									<span class="entry-cats"><?php the_category( ', ', '', $item->ID ); ?></span>
								<?php endif ?>
							</div>
						<?php endif ?>
						<h2 class="post-title-alt"><a
								href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>"><?php echo get_the_title( $item ); ?></a>
						</h2>
						<?php if ( $words > 0 ): ?>
							<div class="entry-excerpt">
								<p><?php echo wp_trim_words( $item->post_content, $words ); ?></p>
							</div>
						<?php endif ?>
					</div>
				</div>
				
				<?php
			endforeach;
			break;
		case '4':
		foreach ( $list_posts as $item ) :
		
		$img_url = '';
		
		if ( has_post_thumbnail( $item->ID ) ) {
			$image_id   = get_post_thumbnail_id( $item->ID );
			$image_size = ! empty( $image_size ) ? $image_size : '370x250xct';
			
			if ( in_array( $image_size, $size_array ) ) {
				$image_data = wp_get_attachment_image_src( $image_id, $image_size );
				$img_url    = $image_data[0];
			} else {
				$image_full_width = wp_get_attachment_image_src( $image_id, 'full' );
				$img_url          = kc_tools::createImageSize( $image_full_width[0], $image_size );
			}
		}else{
			
			if( $force_image == 'yes'){
				$img =  kc_first_image( $item->post_content );
				if( $img != false ) $img_url = $img;
			}
		}
		?>
	
				<div class="grid-<?php echo esc_attr( $number_item ); ?>">
					<div class="kc-list-item-4">
						<div class="kc-post-header">
							<?php if ( ! empty( $img_url ) ): ?>
								<a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>">
									<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo get_the_title( $item ); ?>">
								</a>
							<?php endif; ?>
							<div class="meta-title">
								<?php if ( $show_date == 'yes' ): ?>
									<div class="post-meta">
										<?php if ( get_the_category( $item->ID ) ): ?>
											<?php the_category( ', ', '', $item->ID ); ?>
										<?php endif ?>
										<a href="<?php echo get_month_link( get_the_time( 'Y', $item->ID ), get_the_time( 'm', $item->ID ) ); ?>"
										   class="date-link"><?php echo get_the_date( 'd.F.Y', $item->ID ); ?></a>
									</div>
								<?php endif ?>
								
								<h2 class="post-title-alt">
									<a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>" class="post-title-link"
									   title="<?php echo get_the_title( $item ); ?>"><?php echo get_the_title( $item ); ?></a>
								</h2>
							</div>
						</div>
						
						<?php if ( $words > 0 ): ?>
						<div class="post-content"><p><?php echo wp_trim_words( $item->post_content, $words ); ?></p></div>
						<?php endif ?>
						<?php if ( isset($socials) && !empty( $socials ) ): ?>
						<div class="post-footer">
							<?php
							$icons = explode( ',', $socials );
							
							if ( count( $icons ) > 0 )
							{
							?>
							<ul class="social-share">
								<?php
								foreach ( $icons as $icon ) {
									
									
									switch ( $icon ) {
										case 'comment':
											?>
											<li>
												<a href="<?php echo get_comments_link( $item->ID ) ?>"
												   class="comment-count fa fa-comments"
												   data-id="32" title=""><span
														class="number"> <?php echo get_comments_number( $item->ID ); ?></span></a>
											</li>
											<?php
											break;
										case 'facebook':
											?>
											<li>
												<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
												   class="fa fa-facebook" target="_blank"
												   title="<?php esc_html_e( 'Share on Facebook', 'kingcomposer' ); ?>"></a>
											</li>
											<?php
											break;
										case 'twitter':
											?>
											<li>
												<a href="http://twitter.com/home?status=<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
												   class="fa fa-twitter" target="_blank"
												   title="<?php esc_html_e( 'Share on Twitter', 'kingcomposer' ); ?>"></a>
											</li>
											<?php
											
											break;
										case 'google':
											
											?>
											<li>
												<a href="http://plus.google.com/share?url=<?php echo esc_url( get_permalink( $item->ID ) ); ?>"
												   class="fa fa-google-plus" target="_blank"
												   title="<?php esc_html_e( 'Share on Google+', 'kingcomposer' ); ?>"></a>
											</li>
											<?php
											
											break;
										case 'pinterest':
											
											?>
											<li>
												<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink( $item->ID ) ); ?>&amp;media=<?php echo esc_url( $img_url ); ?>"
												   class="fa fa-pinterest-p" target="_blank"
												   title="<?php esc_html_e( 'Share on Pinterest', 'kingcomposer' ); ?>"></a>
											</li>
											<?php
									}
								}
								?>
							</ul>
							<?php
							}
							?>
						</div>
						<?php endif ?>
					</div>
				</div>
		<?php
				endforeach;
			break;
			default:
				foreach( $list_posts as $item ) :
										
					$img_url = '';
					
					if( has_post_thumbnail( $item->ID ) ){
						$image_id = get_post_thumbnail_id( $item->ID );
						$image_size = !empty( $image_size ) ? $image_size : '1140x550xct';
						
						if( in_array( $image_size, $size_array ) ){
							$image_data       = wp_get_attachment_image_src( $image_id, $image_size );
							$img_url        = $image_data[0];
						}else{
							$image_full_width = wp_get_attachment_image_src( $image_id, 'full' );
							$img_url 	= kc_tools::createImageSize( $image_full_width[0], $image_size );
						}
					}else{
						
						if( $force_image == 'yes'){
							$img =  kc_first_image( $item->post_content );
							if( $img != false ) $img_url = $img;
						}
					}
		?>

					<div class="item kc-list-item-1">
						<figure>
						<?php if( !empty( $img_url ) ):?>
							<img src="<?php echo esc_url( $img_url ); ?>" alt="">
						<?php endif;?>
						</figure>
						<div class="post-details">
							<h2 class="post-title-alt">
								<a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>" title="<?php echo get_the_title( $item ); ?>"><?php echo get_the_title( $item ); ?></a>
							</h2>

							<?php if ( $show_date == 'yes' ): ?>
								<div class="post-date">
									<span class="post-author"><?php esc_html_e( 'by', 'kingcomposer' ); ?> <a href="<?php echo get_author_posts_url( $item->post_author ); ?>" title="<?php esc_html_e( 'Posts by ', 'kingcomposer' ); echo get_the_author_meta( 'display_name', $item->post_author ); ?>" rel="author"><?php echo get_the_author_meta( 'display_name', $item->post_author ); ?></a></span>
									<?php echo get_the_date( 'F m Y', $item->ID ); ?>
									<?php if ( get_the_category( $item->ID ) ): ?>
										<span class="post-cats"><?php the_category( ', ', '', $item->ID ); ?></span>
									<?php endif ?>
								</div>
							<?php endif ?>
						</div>
					</div>

		<?php
				endforeach;
			break;
		} ?>

	<?php else: ?>

		<h3><?php echo __( 'Blog Post: Nothing not found.', 'kingcomposer' ); ?></h3>

	<?php endif ?>

</div>
