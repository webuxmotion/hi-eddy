<div class="header">
  <div class="header__column">
    <nav class="header__nav">
      <div class="header__nav-item">
        <a href="<?=base_url()?>about" class="header__nav-link">
          <?=__('tpl_about_academy')?>
        </a>
      </div>
      <div class="header__nav-item">
        <a href="<?=base_url()?>sponsors" class="header__nav-link">
          <?=__('tpl_sponsors')?>
        </a>
      </div>
      <div class="header__nav-item">
        <a href="<?=base_url()?>command" class="header__nav-link">
          <?=__('tpl_command')?>
        </a>
      </div>
      <div class="header__nav-item">
        <a href="<?=base_url()?>contacts" class="header__nav-link">
          <?=__('tpl_contacts')?>
        </a>
      </div>
    </nav>
  </div>
  <div class="header__column">
    <a href="<?=base_url()?>login" class="header__button">
      <span class="header__button-icon"><?=icon('user-bold')?></span>
      <span class="header__button-text">
        <?=__('tpl_login')?>
      </span>
    </a>
    <a href="<?=base_url()?>login" class="header__button">
      <span class="header__button-text">
        <?=__('tpl_registration')?>
      </span>
    </a>
  </div>
</div>