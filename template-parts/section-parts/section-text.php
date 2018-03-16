<?php
    //vars
    $header = get_sub_field('header');
    $content = get_sub_field('content');
?>

<!-- Text Section -->
<div class="container article-body-wrap pad-top-bottom-xtra">
  <h3 class="article-header text-center text-uppercase"><?php echo $header; ?></h3>
  <div class="article-body">
      <?php echo $content; ?>
  </div>
</div>
<!-- /Text Section -->
