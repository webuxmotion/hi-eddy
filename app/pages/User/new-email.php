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
      Введіть новий email. <br>
      Ми надішлемо на нього посилання з підтвердженням.
    </div>
    <div class="auth__content">
      <!-- title -->
      <h3 class="title  " data-name="getTitle">
        Введіть ваш новий email
      </h3>
      <!-- END. title -->
      <div class="g-spacer-3"></div>
      <form class="auth__form" method="POST" action="/user/new-email">
        <input type="hidden" name="token" value="<?=$token?>">
        <!-- input -->
        <div class="input" data-name="getInput">
          <label for="email" class="input__label">E-mail</label>
          <input type="email" name="new-email" id="email" class="input__input-field" placeholder=" " value="" required="true">
        </div>
        <!-- END. input -->
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