<!-- lesson-card -->
<div class="lesson-card" data-name="getLessonCard">
  <a href="<?= $href ?>" class="lesson-card__image" style="background-image: url('<?= $image ?>');"></a>
  <div class="lesson-card__main">
    <a href="<?= $href ?>" class="lesson-card__title"><?= $title ?></a>
    <div class="lesson-card__button">

      <!-- button -->
      <a href="<?= $href ?>" class="button button--border-radius " data-name="getButton">

        <span class="button__text"><?=__('tpl_more_details')?></span>

      </a>
      <!-- END. button -->

    </div>
  </div>
</div>
<!-- END. lesson-card -->