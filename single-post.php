<?php get_header(); ?>
<div class="container inner-container">
	<div class="col-xs-12 col-sm-9">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->

				<!-- post title -->
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1>
				<!-- /post title -->

				<!-- post details -->
				<span class="date"><?php the_time('F j, Y'); ?> <?php //the_time('g:i a'); ?></span>
				<!-- <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span> -->
				<!-- <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span> -->
				<!-- /post details -->

				<?php the_content(); // Dynamic Content ?>
				<?php
				$images = get_field('imagenes');
				if( $images ): ?>
				<div class="col-xs-12">
					<?php foreach( $images as $image ): ?>
						<div class="ImagenGaleria">
							<img class="img-responsive" src="<?php echo wp_get_attachment_image_src($image['ID'],'galeria')[0]; ?>" alt="<?php echo $image['alt']; ?>"  />
							<a data-toggle="lightbox" data-remote="<?php echo $image['url']; ?>" data-gallery="Galeria">
								<div class="Gallery__Hover">
									<div class="Gallery__Caption">
										<?=$image['caption'];?>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>


			<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

			<p><?php //_e( 'This post was written by ', 'html5blank' ); the_author(); ?></p>

			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			<?php //comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>

		<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

	</article>
	<!-- /article -->

<?php endif; ?>

</div>
<div class="col-xs-12 col-sm-3 widgets-right">
	<?php $cats=get_categories();?>
	<div class="Noticias__Internas__Categorias">
		<div class="Noticias__Internas__Categorias__Titulo">
			Categorías
		</div>
		<div class="Noticias__Internas__Categorias__Lista">
			<ul>
				<?php foreach($cats as $cat){
					?>
					<li><a href="<?php echo get_term_link($cat->term_id)?>"><?php echo $cat->name ?></a></li>
					<?php
				}?>
			</ul>
		</div>
	</div>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
		[no widgets Right Panel]
	<?php endif; ?>
</div>
</div>
<!-- /section -->
<div class="clearfix"></div>
</div>
<?php get_footer(); ?>
