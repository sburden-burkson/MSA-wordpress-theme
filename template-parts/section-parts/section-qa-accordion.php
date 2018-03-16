<!-- QA Accordion -->
<div class="section container pad-bottom-lg">
  <div class="panel-group" id="faqAccordion" role="tablist" aria-multiselectable="true">
    <?php
      if( have_rows('question_answer') ):
        $count = 0;
        while ( have_rows('question_answer') ) : $count++; the_row();
          //vars
          $question = get_sub_field('question');
          $answer = get_sub_field('answer');
    ?>
    <div class="panel panel-default">
      <a role="button" data-toggle="collapse" data-parent="#faqAccordion" href="#faq<?php echo $count; ?>" aria-expanded="true" aria-controls="faq<?php echo $count; ?>">
        <div class="panel-heading border-bottom" role="tab" id="faqHeading<?php echo $count; ?>">
          <h4 class="fw-400">
            <?php echo $question; ?>
            <i class="far fa-plus"></i>
          </h4>
        </div>
      </a>
      <div id="faq<?php echo $count; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeading<?php echo $count; ?>">
        <div class="panel-body">
          <?php echo $answer; ?>
        </div>
      </div>
    </div>
    <?php endwhile; endif; ?>
  </div>
</div>
<!-- /QA Accordion -->
