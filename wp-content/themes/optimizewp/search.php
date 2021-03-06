<?php
$sidebar = optimize_mikado_sidebar_layout();
$excerpt_length_array = optimize_mikado_blog_lists_number_of_chars();
$excerpt_length = $excerpt_length_array['standard'];

?>
<?php get_header(); ?>
<?php 
global $wp_query;

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

if(optimize_mikado_options()->getOptionValue('blog_page_range') != ""){
	$blog_page_range = esc_attr(optimize_mikado_options()->getOptionValue('blog_page_range'));
} else{
	$blog_page_range = $wp_query->max_num_pages;
}
?>
<?php optimize_mikado_get_title(); ?>
	<div class="mkdf-container">
		<?php do_action('optimize_mikado_after_container_open'); ?>
		<div class="mkdf-container-inner clearfix">
			<div class="mkdf-container">
				<?php do_action('optimize_mikado_after_container_open'); ?>
				<div class="mkdf-container-inner" >
					<div class="mkdf-blog-holder mkdf-blog-type-standard">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="mkdf-post-content">
							<div class="mkdf-post-text">
								<div class="mkdf-post-text-inner">
									<div class="mkdf-post-info">
										<?php optimize_mikado_post_info(array('date' => 'yes', 'category' => 'yes', 'comments' => 'yes', 'like' => 'yes')) ?>
									</div>
									<h3>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h3>

									<?php if(get_post_type() === 'post') : ?>
										<?php optimize_mikado_excerpt($excerpt_length); ?>
									<?php endif; ?>
								</div>
							</div>
							<div class="mkdf-author-desc clearfix">
								<div class="mkdf-image-name">
									<div class="mkdf-author-image">
										<?php echo optimize_mikado_kses_img(get_avatar(get_the_author_meta('ID'), 102)); ?>
									</div>
									<div class="mkdf-author-name-holder">
										<h5 class="mkdf-author-name">
											<?php
											if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
												echo esc_attr(get_the_author_meta('first_name'))." ".esc_attr(get_the_author_meta('last_name'));
											} else {
												echo esc_attr(get_the_author_meta('display_name'));
											}
											?>
										</h5>
									</div>
								</div>
								<div class="mkdf-share-icons">
									<?php $post_info_array['share'] = optimize_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
									<?php if($post_info_array['share'] == 'yes'): ?>
										<span class="mkdf-share-label"><?php esc_html_e('Share', 'optimize'); ?></span>
									<?php endif; ?>
									<?php echo optimize_mikado_get_social_share_html(array('type'      => 'list',
									                                                       'icon_type' => 'normal'
									)); ?>
								</div>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<?php
						if(optimize_mikado_options()->getOptionValue('pagination') == 'yes') {
							optimize_mikado_pagination($wp_query->max_num_pages, $blog_page_range, $paged);
						}
					?>
					<?php else: ?>
					<div class="entry">
						<p><?php esc_html_e('No posts were found.', 'optimize'); ?></p>
					</div>
					<?php endif; ?>
				</div>
				<?php do_action('optimize_mikado_before_container_close'); ?>
			</div>
			</div>
		</div>
		<?php do_action('optimize_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>