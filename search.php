<?php get_header(); ?>

		<div class="main">
			<div class="container">
			<?php if ( have_posts() ) : ?>

				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'test' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			<!-- .page-header -->

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
			echo paginate_links();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</div>
</div>


<?php get_footer(); ?>
