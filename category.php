<?php get_header(); ?>

<section class="row">

	<?php include 'includes/prebar.php' ?>

	<div class="small-12 medium-8 columns">

		<div class="leader">

		<h1><?php single_cat_title(); ?></h1>

		<hr></hr>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>

				<span class="title-date">
					<i class="fa fa-file-text-o" aria-hidden="true"></i><?php the_date( "l, F j, Y", '<span>', '</span>' ); ?>
					<i class="fa fa-pencil" aria-hidden="true"></i><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
				</span>

				<div class="post-content"><?php the_excerpt(); ?></div> 
				
				<div class="post-meta">

					<hr></hr>

					<?php
					$tags = get_the_tags(); // only output tags if there are tags
					if ( $tags ): ?>
					<div class="post-tags">
						<i class="fa fa-tag" aria-hidden="true" title="tags"></i>
						<span><?php the_tags( $before = null, $sep = ', ', $after = '' ); ?></span>
					</div>
					<?php endif ?>

				</div>
			<article>
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		</div>
	</div>

	<?php include 'includes/sidebar.php' ?>

</section>



<?php get_footer(); ?>