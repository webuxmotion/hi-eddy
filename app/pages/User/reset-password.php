<!-- p-reset-password -->
<div class="p-reset-password">
  <!-- auth -->
  <div class="auth" data-name="getAuth">
    <div class="auth__title-wrapper">
      <!-- title -->
      <h1 class="title  " data-name="getTitle">
        Зкидання паролю
      </h1>
      <!-- END. title -->
    </div>
    <div class="auth__text">
      Ми надішлемо посилання на створення нового паролю на ваш email .
    </div>
    <div class="auth__content">
      <form class="auth__form" method="POST" action="/user/reset-password">
        <!-- input -->
        <div class="input" data-name="getInput">
          <label for="email" class="input__label">E-mail</label>
          <input 
            type="email" 
            name="email" 
            id="email" 
            class="input__input-field" 
            placeholder=" " 
            value="<?=$email?>" 
            required="true"
          >
        </div>
        <!-- END. input -->
        <div class="g-spacer-4"></div>
        <!-- button -->
        <button class="button button--border-radius button--font-medium " data-name="getButton">
        <span class="button__text">Продовжити</span>
        </button>
        <!-- END. button -->
      </form>
    </div>
  </div>
  <!-- END. auth -->
</div>
<!-- END. p-reset-password -->