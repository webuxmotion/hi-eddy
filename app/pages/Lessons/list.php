<div class="p-list">
  <h1 class="p-list__title">
    <?php if ($pinnedMode): ?>
      <?=__('tpl_pinned_lessons')?>
    <?php elseif ($doneMode): ?>
      <?=__('tpl_done_lessons')?>
    <?php else: ?>
      <?=__('tpl_all_lessons')?>
    <?php endif; ?>
  </h1>
  <div class="p-list__items">
    <?php foreach ($list as $item): ?>
      <div class="p-list__item">
        <?=$this->component('lesson-card', [
          'item' => $item,
          'href' => baseUrl() . 'lessons/' . $item['slug']
        ])?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
