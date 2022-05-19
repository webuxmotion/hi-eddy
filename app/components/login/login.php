<div class="login">
  <?php if (isUser()): ?>
    <?=$this->component('button', [
      'href' => '/',
      'title' => 'На главную',
    ])?>
  <?php else: ?>
    <h2 class="login__title">Вход на сайт</h2>
    <p class="login__description">Авторизуйтесь с помощью Google, чтобы иметь возможность 
    добавлять понравившиеся уроки в “Избранное”</p>
    <?=$this->component('google-button', [
      'href' => $href
    ])?>
  <?php endif; ?>
</div>