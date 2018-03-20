<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>
<?php
	$current_year = date('Y');
	$post_date = ($current_year == get_the_date('Y')) ? get_the_date('M j') : get_the_date('M j, Y');
	$tags = get_the_tags();
?>
<!-- Top Article Info -->
	<div class="section container container-wide no-banner">
    <div class="row">
      <div class="col-sm-9">
        <h1 class="article-title"><?php the_title(); ?></h1>
      </div>
      <div class="col-sm-3">
        <div class="article-info">
          <p class="main-font black fw-500 text-uppercase">POSTED <?php echo $post_date; ?></p>
          <div class="article-tag-wrap">
					<?php if($tags) : ?>
            <p class="main-font">TAGGED</p>
            <div class="article-tags">
							<?php foreach ($tags as $tag): ?>
								<a href="<?php echo get_tag_link($tag->term_id); ?>"><span class="text-uppercase"><?php echo $tag->name; ?></span></a>
							<?php endforeach; ?>
            </div>
					<?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /Top Article Info -->
<!-- Featured Banner -->
	<?php
		//vars
		$featured_image = get_the_post_thumbnail_url('', 'full');
		$texture_top = get_field('featured_image_texture_top');
		$texture_bottom = get_field('featured_image_texture_bottom');
	?>

	<div class="section article-featured-image half-bg texture-section" style="background-image: url('<?php echo $featured_image; ?>');">
		<div class="texture-top" style="background-image: url('<?php echo $texture_top; ?>');');"></div>
    <div class="texture-bottom" style="background-image: url('<?php echo $texture_bottom; ?>');"></div>
  </div>
<!-- /Featured Banner -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>
    <?php get_template_part( 'template-parts/content', 'sections'); ?>

<?php endwhile; endif; ?>

<?php
    // Format article body content to strip line breaks
		$articleBody = (get_the_content() == "") ? $articleBody : get_the_content() . " " . $articleBody;
    $articleBody = strip_tags($articleBody);
		$articleBody = trim(preg_replace('/\s+/', ' ', $articleBody));
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

<?php get_footer(); ?>
