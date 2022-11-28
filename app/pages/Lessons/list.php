<!-- p-lessons -->
<div class="p-lessons">

  <!-- section-list -->
  <div class="section-list" data-name="getSectionList">

    <div class="section-list__title">

      <!-- title -->
      <h2 class="title  " data-name="getTitle">
        <?= __('tpl_lessons') ?>
      </h2>
      <!-- END. title -->

      <header>
        <a href="<?= baseUrl() ?>lessons" class="p-list__filter-button <?= (!$pinnedMode && !$doneMode) ? 'is-active' : '' ?>">
          <?= __('tpl_all') ?>
        </a>
        <a href="<?= baseUrl() ?>lessons?pinned=true" class="p-list__filter-button <?= ($pinnedMode) ? 'is-active' : '' ?>">
          <?= __('tpl_pinned') ?>
        </a>
        <a href="<?= baseUrl() ?>lessons?done=true" class="p-list__filter-button <?= ($doneMode) ? 'is-active' : '' ?>">
          <?= __('tpl_finished') ?>
        </a>
      </header>

    </div>

    <?php if (!isUser() && ($pinnedMode || $doneMode)) : ?>
      <?php
      $redirectTo = null;

      if ($pinnedMode) $redirectTo = 'lessons?pinned=true';
      if ($doneMode) $redirectTo = 'lessons?done=true';
      ?>
      Please login to see your saved or finished lessons.
      <?= $this->component('button', [
        'href' => baseUrl() . 'login?redirectTo=' . $redirectTo,
        'title' => __('tpl_login'),
      ]) ?>
    <?php else : ?>

      <?php if (count($list)) : ?>

        <div class="section-list__items">
          <?php foreach ($list as $item) : ?>
            <div class="section-list__item">
              <?= $this->component('lesson-card', [
                'image' => '/images-tuts/' . $item['slug'] . '/cover.jpg',
                'title' => $item['title'],
                'has_pin' => $item['has_pin'],
                'has_done' => $item['has_done'],
                'href' => baseUrl() . 'lessons/' . $item['slug'],
              ]) ?>
            </div>
          <?php endforeach; ?>
        </div>

      <?php else : ?>
        <div class="p-list__not-found">
          <div class="p-list__not-found-text">
            <?php if ($pinnedMode) : ?>
              <?= __('tpl_pinned_lessons_not_found') ?>
            <?php elseif ($doneMode) : ?>
              <?= __('tpl_finished_lessons_not_found') ?>
            <?php else : ?>
              Not found
            <?php endif; ?>
          </div>
          <?= $this->component('button', [
            'href' => baseUrl() . 'lessons',
            'title' => __('tpl_all_lessons'),
          ]) ?>
        </div>
      <?php endif; ?>

    <?php endif; ?>

  </div>
  <!-- END. section-list -->

</div>
<!-- END. p-lessons -->