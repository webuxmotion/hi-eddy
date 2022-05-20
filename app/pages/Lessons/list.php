<?php foreach ($list as $item): ?>
  <a href="<?=baseUrl() . 'lessons/' . $item['slug']?>"><?=$item['title']?></a>
<?php endforeach; ?>