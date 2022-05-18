<div class="sidebar">
  <div class="sidebar__column">
    <a href="<?=base_url()?>" class="sidebar__logo">
      <?=icon('logo-small')?>
    </a>
    <a href="/" class="sidebar__control">
      <?=icon('burger')?>
    </a>
    <a href="/" class="sidebar__control">
      <?=icon('pin')?>
    </a>
    <a href="/" class="sidebar__control">
      <?=icon('done')?>
    </a>
    <a href="/" class="sidebar__control">
      <?=icon('army-text')?>
    </a>
  </div>
  <div class="sidebar__column">
    <a href="/" class="sidebar__control">
      <?=icon('dollar-sign')?>
    </a>
    <a href="/" class="sidebar__control">
      <?=icon('lang')?>
    </a>
    <?php new \app\widgets\language\Language() ?>
  </div>
</div>