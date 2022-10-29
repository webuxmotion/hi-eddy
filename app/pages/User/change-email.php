<!-- p-change-email -->
<div class="p-change-email">
  <!-- auth -->
  <div class="auth" data-name="getAuth">
    <div class="auth__title-wrapper">
      <!-- title -->
      <h1 class="title  " data-name="getTitle">
        Зміна email
      </h1>
      <!-- END. title -->
    </div>
    <div class="auth__text">
      Щоб змінити пошту, натисніть "продовжити" та перевірте вашу пошту.
    </div>
    <div class="auth__content">
      <div class="g-spacer-3"></div>
      <form class="auth__form" method="POST" action="/user/change-email">
        <input type="hidden" name="change-email" value="true">
        <div class="g-spacer-4"></div>
        <!-- button -->
        <button class="button button--border-radius button--font-medium " data-name="getButton">
        <span class="button__text">Продовжити</span>
        </button>
        <!-- END. button -->
      </form>
      <div class="g-spacer-10"></div>
      <p>Якщо передумали, можете <a href="<?=baseUrl() . "profile"?>">повернутись на профіль</a></p>
    </div>
  </div>
  <!-- END. auth -->
</div>
<!-- END. p-change-email -->