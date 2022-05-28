<div class="p-one-item js-one-item-page">
    <?php if (isUser()): ?>
        <?=$item['has_pin'] ? 'PINNED' : ''?>
        <a href="/lessons/toggle-pin/<?=$item['id']?>">
            Toggle Pin
        </a>

        <!-- <?=$item['has_done'] ? 'DONE' : ''?>
        <a href="/lessons/toggle-done/<?=$item['id']?>">
            Toggle Done
        </a> -->
    <?php endif; ?>
    <h1><?=$item['title']?></h1>
    <?=$content?>
</div>

<?=$this->component('go-top-button')?>
