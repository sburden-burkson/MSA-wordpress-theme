<?php
    //vars
    $header = get_sub_field('header');
    $text = get_sub_field('text');
  	$articleBody .= $header . " - " . $text;
?>

<!-- Text Section -->
<div class="section container article-body-wrap pad-top-bottom-xtra">
  <h3 class="article-header text-center text-uppercase"><?php echo $header; ?></h3>
  <div class="article-body">
      <?php echo $text; ?>
  </div>
</div>
<!-- /Text Section -->
