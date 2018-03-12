<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>

<!-- Page Content -->
<div class="main-content fullpage-content" data-fp-disabled="true" id="blog-article-content">
	<div class="section">
		<div class="container k-full-width k-article-width-md">

		<?php while ( have_posts() ) : the_post();
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		?>
				<div class="article-banner-wrap">
					<img class="article-banner" src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="article-body-wrap">
					<h1 class="article-header text-center text-uppercase"><?php the_title(); ?></h1>
					<div class="article-body">
						<?php the_content(); ?>
					</div>
				</div>
		<?php endwhile; ?>

		</div>
	</div>
</div>
<!-- /.container -->
<?php
    // Format article body content to strip multiple line breaks
    $articleBody = strip_tags(get_the_content());
    $articleBody = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n\n", $articleBody);
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "BlogPosting",
  "headline": "<?php the_title(); ?>",
  "image": "<?php echo $thumbnail[0]; ?>",
  "url": "<?php echo get_permalink(); ?>",
  "datePublished": "<?php echo get_the_date() ?>",
  "dateModified": "<?php echo the_modified_date() ?>",
  "description": "<?php the_excerpt(); ?>",
  "genre": "automotive",
  "wordcount": "<?php echo str_word_count($articleBody); ?>",
  "mainEntityOfPage": "<?php echo $thumbnail[0]; ?>",
  "author": "<?php bloginfo('name') ?>",
  "publisher": {
    "@type": "Organization",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo $display_logo; ?>"
    },
    "name": "<?php bloginfo('name') ?>"
  },
  "articleBody": "<?php echo $articleBody; ?>"
}
</script>
}

<?php get_footer(); ?>
