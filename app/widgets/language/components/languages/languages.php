<!-- lang-switcher -->
<div class="lang-switcher" data-name="langSwitcherVariant1">
    <div class="lang-switcher__main">
        <span class="lang-switcher__icon" data-icon="lang">
            <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.5 36C28.165 36 36 28.165 36 18.5C36 8.83502 28.165 1 18.5 1C8.83502 1 1 8.83502 1 18.5C1 28.165 8.83502 36 18.5 36Z" stroke="#9747FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M1 18.5H36" stroke="#9747FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M18.8368 1C23.2562 5.79212 25.7677 12.0111 25.9041 18.5C25.7677 24.9889 23.2562 31.2079 18.8368 36C14.4175 31.2079 11.906 24.9889 11.7695 18.5C11.906 12.0111 14.4175 5.79212 18.8368 1V1Z" stroke="#9747FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        <span class="lang-switcher__text"><?= $this->language['code'] ?></span>
    </div>
    <select id="lang-swither" class="lang-switcher__select js-lang-switcher-select">
        <?php foreach ($this->languages as $k => $v) : ?>
            <option value="/language/change?lang=<?= $k ?>" <?= $this->language['code'] == $k ? 'selected' : '' ?>><?= $k ?></option>
        <?php endforeach; ?>
    </select>
</div>
<!-- END. lang-switcher -->