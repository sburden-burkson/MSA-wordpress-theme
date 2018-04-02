<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

	<div class="entry-summary">
		<p><?php the_excerpt(); ?></p>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
<br />
