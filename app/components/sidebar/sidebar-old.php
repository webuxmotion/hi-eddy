<div class="sidebar">
  <div class="sidebar__header">
    <?=$this->component('logo')?>
  </div>
  
  <div class="sidebar__main">

    <?=$this->component('button-sidebar', [
      'href' => baseUrl() . 'lessons',
      'title' => __('tpl_lessons'),
      'icon' => 'lesson'
    ])?>
    
    <!-- <?=$this->component('button-sidebar', [
      'href' => baseUrl() . 'lessons',
      'title' => __('tpl_courses'),
      'icon' => 'courses'
    ])?> -->

    <div class="sidebar__divider"></div>

    <?=$this->component('button-sidebar', [
      'href' => baseUrl() . 'lessons?pinned=true',
      'title' => __('tpl_saved'),
      'icon' => 'saved'
    ])?>

    <?=$this->component('button-sidebar', [
      'href' => baseUrl() . 'lessons?done=true',
      'title' => __('tpl_finished'),
      'icon' => 'paw'
    ])?>
    

  </div>
  <div class="sidebar__footer">
    <?php new \app\widgets\language\Language() ?>
  </div>
</div>