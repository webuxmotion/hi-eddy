<?php $code = \core\Tone::$app->getProperty('language')['code']; ?>
<div class="dropdown d-inline-block">
    <button href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
        <?= icon("lang-" . $code) ?>
    </button>
    <ul class="dropdown-menu" id="languages">
        <?php foreach ($this->languages as $k => $v): ?>
            <li>
                <button class="dropdown-item" data-langcode="<?= $k ?>">
                    <?= icon("lang-" . $k) ?>
                </button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
