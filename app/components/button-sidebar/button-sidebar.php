<?php
  $title = $title ?? 'Default title';
  $href = $href ?? null;
  $target = $target ?? null;
  $icon = $icon ?? null;

  $tag = $href ? 'a' : 'button';
  $hrefAttr = $href ? "href='$href'" : null;
  $targetAttr = $target ? "target='$target'" : null;
?>

<<?=$tag?>
  <?=$hrefAttr?>
  <?=$targetAttr?>
  class="button-sidebar"
>
  <div class="button-sidebar__icon">
    <?php if ($icon): ?>
      <?=icon($icon)?>
    <?php endif; ?>
  </div>
  <span class="button-sidebar__text">
    <?=$title?>
  </span>
</<?=$tag?>>