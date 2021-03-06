<?php get_header(); ?>

<section class="row">

	<?php include 'includes/prebar.php' ?>

	<div class="small-12 large-8 columns">

		<div class="leader">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article>

				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<hr></hr>

				<span class="title-date">Posted <?php the_date( 'F j', '<span class="post-date">', '</span>' ); ?> in <?php the_category(', ') ?></span>

				<div class="post-content"><?php the_content(); ?></div> 
				
				<div class="post-meta">

					<hr></hr>

					<?php
					$tags = get_the_tags(); // only output tags if there are tags
					if ( $tags ): ?>
					<div class="post-tags">

						<i class="fa fa-tag" aria-hidden="true" title="tags"></i>

						<span><?php the_tags( $before = null, $sep = ', ', $after = '' ); ?></span>

					</div>

					<?php comments_template(); ?>
					
					<?php endif ?>

				</div> 

			</article>

		<?php endwhile; else : ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>

		</div>
	</div>

	<?php include 'includes/sidebar.php' ?>

</section>

<?php get_footer(); ?>