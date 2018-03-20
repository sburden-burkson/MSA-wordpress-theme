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
<!-- Page Content -->
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
<!-- /.container -->
<?php
    // Format article body content to strip multiple line breaks
    // $articleBody = strip_tags(get_the_content());
    // $articleBody = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n\n", $articleBody);
?>
<!-- <script type="application/ld+json">
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
</script> -->

<?php get_footer(); ?>
