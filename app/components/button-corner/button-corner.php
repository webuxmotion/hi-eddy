<?php
  $classNames = "button-corner";
  $title = $title ?? 'Default title';
  $href = $href ?? null;
  $target = $target ?? null;
  $iconLeft = $iconLeft ?? null;
  $fullWidth = $fullWidth ?? null;

  $tag = $href ? 'a' : 'button';
  $hrefAttr = $href ? "href='$href'" : null;
  $targetAttr = $target ? "target='$target'" : null;

  if ($fullWidth) {
    $classNames .= " " . $classNames . "--full-width";
  }
?>

<<?=$tag?>
  <?=$hrefAttr?>
  <?=$targetAttr?>
  class="<?=$classNames?>"
>
  <?php if ($iconLeft): ?>
    <span class="button-corner__icon button-corner__icon--left">
      <?=icon($iconLeft)?>
    </span>
  <?php endif; ?>
  <?=$title?>
</<?=$tag?>>