<!-- p-registration -->
<div class="p-registration">
  <!-- auth -->
  <div class="auth" data-name="getAuth">
    <div class="auth__title-wrapper">
      <!-- title -->
      <h1 class="title  " data-name="getTitle">
        Реєстрація
      </h1>
      <!-- END. title -->
    </div>
    <div class="auth__text">
      Зареєструйтесь на сайті,<br>
      щоб мати можливість додавати уроки, <br>
      що сподобалися, в Збережені
    </div>
    <div class="auth__content">
      <!-- title -->
      <h3 class="title  " data-name="getTitle">
        За допомогою Google
      </h3>
      <!-- END. title -->
      <div class="g-spacer-3"></div>
      <!-- button -->
      <a href="<?=$google_login_url?>" class="button button--border-radius button--bordered button--font-medium " data-name="getButton">
        <span class="button__icon " data-icon="google">
          <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.1031 28.0102C26.6949 26.1588 28.0154 24.5666 28.6942 22.4107C25.4689 22.4107 22.2725 22.4107 19.002 22.4107C19.002 19.9256 19.002 17.5434 19.002 15.009C19.3516 15.009 19.7137 15.009 20.0757 15.009C25.218 15.009 30.3603 15.0337 35.5026 14.9884C36.4365 14.9802 36.7944 15.19 36.889 16.1898C37.539 22.9784 35.3134 28.5574 30.0435 32.9063C28.0607 31.277 26.0819 29.6436 24.1031 28.0102Z" fill="#618CF0"></path>
            <path d="M2.09863 10.043C5.00713 4.45168 9.62287 1.13555 15.8101 0.213944C21.3309 -0.608919 26.5843 0.98332 30.2826 4.27065C28.3985 5.81764 26.539 7.36873 24.6343 8.86634C24.4451 9.01445 23.9309 8.89514 23.6429 8.75114C18.7762 6.32781 13.2266 7.49627 9.87793 11.7546C9.14978 12.6803 8.67257 13.8076 8.08018 14.8444C6.08496 13.244 4.08974 11.6435 2.09863 10.043Z" fill="#DD5342"></path>
            <path d="M24.103 28.0102C26.0818 29.6436 28.0646 31.277 30.0434 32.9104C23.6628 38.4071 13.4522 38.3618 6.77545 32.7952C4.89542 31.2276 3.2869 29.4297 2.24609 27.1791C4.2084 25.5704 6.17482 23.9576 8.13713 22.3489C8.99693 24.0317 9.90198 25.6774 11.4282 26.8747C15.2212 29.8452 19.2898 30.2854 23.6381 28.2201C23.7903 28.146 23.9467 28.0802 24.103 28.0102Z" fill="#59B155"></path>
            <path d="M8.13321 22.3489C6.1709 23.9576 4.20448 25.5663 2.24217 27.1791C0.333342 23.8753 -0.271394 20.2959 0.10708 16.5436C0.337456 14.2561 0.933965 12.059 2.09819 10.043C4.0934 11.6435 6.08451 13.244 8.07973 14.8444C7.33512 17.35 7.38037 19.8515 8.13321 22.3489Z" fill="#F0BE42"></path>
          </svg>
        </span>
        <span class="button__text">Продовжити з Google</span>
      </a>
      <!-- END. button -->
      <div class="g-spacer-5"></div>
      <!-- title -->
      <h3 class="title  " data-name="getTitle">
        aбо <br><br>реєстрація через email та пароль
      </h3>
      <!-- END. title -->
      <div class="g-spacer-3"></div>
      <form class="auth__form" method="POST" action="/user/registerWithPassword">
        <!-- input -->
        <div class="input" data-name="getInput">
          <label for="email" class="input__label">E-mail</label>
          <input type="email" name="email" id="email" class="input__input-field" placeholder=" " value="" required>
        </div>
        <!-- END. input -->
        <div class="g-spacer-2"></div>
        <!-- input -->
        <div class="input" data-name="getInput">
          <label for="password" class="input__label">Пароль</label>
          <input type="password" name="password" id="password" class="input__input-field" placeholder=" " value="" required>
        </div>
        <!-- END. input -->
        <div class="g-spacer-4"></div>
        <!-- button -->
        <button class="button button--border-radius button--font-medium " data-name="getButton">
        <span class="button__text">Зареєструватися</span>
        </button>
        <!-- END. button -->
        <div class="g-spacer-8"></div>
        <p>Вже маєте свій аккаунт? <a href="<?=baseUrl() . "login?redirectTo=profile"?>">Увійти на сайт</a></p>
      </form>
    </div>
  </div>
  <!-- END. auth -->
</div>
<!-- END. p-registration -->