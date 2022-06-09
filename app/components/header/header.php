<div class="header">
  <div class="header__column">
    <nav class="header__nav">
      <div class="header__nav-item">
        <a href="<?=baseUrl()?>lessons" class="header__nav-link">
          <?=__('tpl_lessons')?>
        </a>
      </div>

      <div class="header__nav-item">
        <a href="<?=baseUrl()?>about" class="header__nav-link">
          про нас
        </a>
      </div>

      <div class="header__nav-item">
        <a href="<?=baseUrl()?>offert" class="header__nav-link">
          оферта
        </a>
      </div>

      <div class="header__nav-item">
        <a href="<?=baseUrl()?>privacy-policy" class="header__nav-link">
          політика конфіденційності
        </a>
      </div>

      <!-- <div class="header__nav-item">
        <a href="<?=baseUrl()?>prices" class="header__nav-link">
          <?=__('tpl_prices')?>
        </a>
      </div>
      <div class="header__nav-item">
        <a href="<?=baseUrl()?>command" class="header__nav-link">
          <?=__('tpl_about_academy')?>
        </a>
      </div>
      <div class="header__nav-item">
        <a href="<?=baseUrl()?>contacts" class="header__nav-link">
          <?=__('tpl_contacts')?>
        </a>
      </div> -->

    </nav>
  </div>
  <div class="header__column">
    <?php if (isUser()): ?>
      <a href="<?=baseUrl()?>profile" class="header__button">
        <span class="header__button-icon"><?=icon('user-bold')?></span>
        <span class="header__button-text">
          <?=__('tpl_profile')?>
        </span>
      </a>
    <?php else: ?>
      <a href="<?=baseUrl()?>login?redirectTo=profile" class="header__button">
        <span class="header__button-icon"><?=icon('user-bold')?></span>
        <span class="header__button-text">
          <?=__('tpl_login')?>
        </span>
      </a>
      <a href="<?=baseUrl()?>login?redirectTo=profile" class="header__button">
        <span class="header__button-text">
          <?=__('tpl_registration')?>
        </span>
      </a>
    <?php endif; ?>
  </div>
</div>