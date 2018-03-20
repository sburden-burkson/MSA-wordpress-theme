<?php
    //vars
    $video_width = get_sub_field('video_width');
    $video_height = get_sub_field('video_height');
    // $padding_bottom = ($video_height/$video_width) * 100;
    $video_website = strtolower(get_sub_field('video_website'));
    $video_id = get_sub_field('video_id');
    $video_url = ($video_website == 'youtube') ? 'https://www.youtube.com/embed/' : 'https://player.vimeo.com/video/';

    /* padding-bottom percentage is screen resolution ratio e.g.: (720/1280)*100% */
?>

<!-- Video Top Section -->
<div class="home-video-wrapper">
  <iframe width="<?php echo $video_width; ?>" height="<?php echo $video_height; ?>" src="<?php echo $video_url . $video_id; ?>?controls=0&showinfo=0&autoplay=1&loop=1&background=1" frameborder="0" <?php if ($video_website == 'youtube') : ?>allow="autoplay; encrypted-media"<?php endif; ?> allowfullscreen autoplay muted loop webkitallowfullscreen mozallowfullscreen id="topVideo"></iframe>
</div>
<!-- /Video Top Section -->
<!-- <iframe src="https://player.vimeo.com/video/233857756?background=1&loop=1" autoplay muted loop frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
      </iframe> -->
      <!-- <iframe width="1036" height="583" src="https://player.vimeo.com/video/247558654?background=1&loop=1" autoplay muted loop frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="topVideo"></iframe> -->
      <!-- <iframe src="https://youtube.com/embed/ytQ5CYE1VZw" autoplay muted loop frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
      </iframe> -->

      <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/kkFFq11j6dQ?rel=0&amp;controls=0&amp;showinfo=0&autoplay=1&loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen autoplay muted loop webkitallowfullscreen mozallowfullscreen></iframe> -->

      <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/kkFFq11j6dQ?controls=0&showinfo=0&autoplay=1&loop=1&background=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen autoplay muted loop webkitallowfullscreen mozallowfullscreen id="topVideo"></iframe> -->
