<?php get_header(); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);
?>

<section class="row">

	<?php include 'includes/prebar.php' ?>

	<div class="small-12 large-8 columns">

		<div class="leader">

		<?php if (have_posts()) : ?>

				<h1 class="pagetitle">Search Results for "<?php echo $s ?>"</h1>
				<hr>

				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Previous') ?></div>
					<div class="alignright"><?php previous_posts_link('Next &raquo;') ?></div>
				</div>
				
				<div class="clear"></div>

				<?php while (have_posts()) : the_post(); ?>
					<article>
						<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<span class="title-date">
							<i class="fa fa-file-text-o" aria-hidden="true"></i><?php the_date( "l, F j, Y", '<span>', '</span>' ); ?>
							<i class="fa fa-pencil" aria-hidden="true"></i><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
							<i class="fa fa-folder-open-o" aria-hidden="true"></i><span><?php the_category(', ') ?></span>
						</span>

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
						<?php endif ?>

						</div>
					</article>
				<?php endwhile; ?>

				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Previous') ?></div>
					<div class="alignright"><?php previous_posts_link('Next &raquo;') ?></div>
				</div>

			<?php else : ?>

				<h2 class="center">No posts found.</h2>
				<p>Try a different search?</p>

			<?php endif; ?>

		</div>
	</div>

	<?php include 'includes/sidebar.php' ?>

</section>



<?php get_footer(); ?>