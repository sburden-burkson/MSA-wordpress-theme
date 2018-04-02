<?php get_header(); ?>

			<?php if ( have_posts() ) : ?>
				<div class="section container no-banner">
					<h1 class="pad-bottom"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'test' ), '<span>' . get_search_query() . '</span>' );
					?></h1><!-- .page-header -->
				</div>

			<div class="container pad-bottom">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			// the_posts_navigation();
			echo paginate_links(); ?>
		</div>
		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

<?php get_footer(); ?>
