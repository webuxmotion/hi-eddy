<!-- sidebar -->
<div class="sidebar" data-name="sidebarVariant1">

  <!-- logo -->
  <a href="<?= baseUrl() ?>" class="logo" data-name="logoVariant1">
    <span class="logo__image" data-icon="logo">
      <?=icon('eddy-head')?>
    </span>
    <span class="logo__text">hi-eddy</span>
  </a>
  <!-- END. logo -->

  <div class="sidebar__group">
    
    <!-- sidebar-button -->
    <a href="<?= baseUrl() ?>lessons" class="sidebar-button">
      <span class="sidebar-button__icon" data-icon="lessons">
        <?=icon('lesson')?>
      </span>
      <span class="sidebar-button__text"><?=__('tpl_lessons')?></span>
    </a>
    <!-- END. sidebar-button -->

    <!-- sidebar-button -->
    <a href="<?= baseUrl() ?>courses" class="sidebar-button">
      <span class="sidebar-button__icon" data-icon="courses">
        <?=icon('courses')?>
      </span>
      <span class="sidebar-button__text"><?=__('tpl_courses')?></span>
    </a>
    <!-- END. sidebar-button -->

  </div>
  <div class="sidebar__divider"></div>
  <div class="sidebar__group">

    <!-- sidebar-button -->
    <a href="<?= baseUrl() ?>lessons?pinned=true" class="sidebar-button">
      <span class="sidebar-button__icon" data-icon="saved">
        <?=icon('saved')?>
      </span>
      <span class="sidebar-button__text">
        <span class="sidebar-button__count">22</span>
        <?=__('tpl_saved')?>
      </span>
    </a>
    <!-- END. sidebar-button -->

    <!-- sidebar-button -->
    <a href="<?= baseUrl() ?>lessons?done=true" class="sidebar-button">
      <span class="sidebar-button__icon" data-icon="paw">
        <?=icon('paw')?>
      </span>
      <span class="sidebar-button__text"><?=__('tpl_finished')?></span>
    </a>
    <!-- END. sidebar-button -->

    <div class="sidebar__button-wrapper">

      <!-- button -->
      <a href="https://bank.gov.ua/en/news/all/natsionalniy-bank-vidkriv-spetsrahunok-dlya-zboru-koshtiv-na-potrebi-armiyi" target="_blank" class="button button--bordered button--fullwidth button--border-radius " data-name="getButton">
        <span class="button__icon " data-icon="ua-flag">
          <?=icon('ua-flag')?>
        </span>
        <span class="button__text"><?=__('tpl_help_army')?></span>
      </a>
      <!-- END. button -->

    </div>
  </div>
  <div class="sidebar__lang-switcher-wrapper">
    <?php new \app\widgets\language\Language() ?>
  </div>
</div>
<!-- END. sidebar -->