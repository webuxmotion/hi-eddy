<div class="p-one-item">
    <?php if (isUser()): ?>
        <?=$item['has_pin'] ? 'PINNED' : ''?>
        <a href="/lessons/toggle-pin/<?=$item['id']?>">
            Toggle Pin
        </a>
    <?php endif; ?>
    <h1><?=$item['title']?></h1>
    <?=$content?>
</div>
