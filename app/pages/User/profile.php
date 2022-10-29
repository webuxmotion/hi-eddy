<!-- p-profile -->
<div class="p-profile">
   <!-- __layout-title -->
   <div class="p-profole__layout-title">
      <!-- title -->
      <h1 class="title  " data-name="getTitle">
         Профіль
      </h1>
      <a href="<?=baseUrl()?>user/logout">
    <?=__('tpl_logout')?>
  </a>
      <!-- END. title -->
   </div>
   <!-- END. __layout-title -->
   <!-- __layout-main -->
   <div class="p-profole__layout-main">
      <form method="POST" action="/user/update">
         <div class="p-profole__group-title">
            <!-- group-title -->
            <div class="group-title" data-name="getGroupTitle">
               <span class="group-title__text">Основна інформація</span>
            </div>
            <!-- END. group-title -->
         </div>
         <div class="p-profile__inputs-group">
            <div class="p-profole__input">
               <!-- input -->
               <div class="input" data-name="getInput">
                  <label for="firstname" class="input__label">Ім’я</label>
                  <input type="text" name="firstName" id="firstname" class="input__input-field" placeholder=" " value="<?=$user['firstName']?>">
               </div>
               <!-- END. input -->
            </div>
            <div class="p-profole__input">
               <!-- input -->
               <div class="input" data-name="getInput">
                  <label for="lastname" class="input__label">Прізвище</label>
                  <input type="text" name="lastName" id="lastname" class="input__input-field" placeholder=" " value="<?=$user['lastName']?>">
               </div>
               <!-- END. input -->
            </div>
            <div class="p-profole__input">
               <!-- input -->
               <div class="input" data-name="getInput">
                  <label for="email" class="input__label">E-mail</label>
                  <input type="email" name="email" id="email" class="input__input-field" placeholder=" " value="<?=$user['email']?>" disabled="true">
               </div>
               <!-- END. input -->
            </div>
            <div class="p-profole__input">
               <!-- input -->
               <div class="input" data-name="getInput">
                  <label for="phone" class="input__label">Телефон</label>
                  <input type="text" name="phone" id="phone" class="input__input-field" placeholder=" " value="<?=$user['phone']?>">
               </div>
               <!-- END. input -->
            </div>
         </div>
         <div class="p-profole__group-title">
            <!-- group-title -->
            <div class="group-title" data-name="getGroupTitle">
               <span class="group-title__text">Додаткова інфо</span>
            </div>
            <!-- END. group-title -->
         </div>
         <div class="p-profile__inputs-group">
            <div class="p-profole__input">
               <!-- input -->
               <div class="input" data-name="getInput">
                  <label for="lelegram" class="input__label">Telegram</label>
                  <input type="text" name="telegram" id="lelegram" class="input__input-field" placeholder=" " value="<?=$user['telegram']?>">
               </div>
               <!-- END. input -->
            </div>
            <div class="p-profole__input">
               <!-- input -->
               <div class="input" data-name="getInput">
                  <label for="facebook" class="input__label">Facebook</label>
                  <input type="text" name="facebook" id="facebook" class="input__input-field" placeholder=" " value="<?=$user['facebook']?>">
               </div>
               <!-- END. input -->
            </div>
         </div>
         <div class="p-profile__form-button">
            <!-- button -->
            <button class="button button--border-radius " data-name="getButton">
            <span class="button__text">Зберегти</span>
            </button>
            <!-- END. button -->
         </div>
      </form>
      <div class="g-spacer-10"></div>
      <!-- title -->
      <h2 class="title  " data-name="getTitle">
         Налаштування
      </h2>
      <!-- END. title -->
      <div class="g-spacer-5"></div>
      <!-- title -->
      <h4 class="title  " data-name="getTitle">
         Зміна email
      </h4>
      <!-- END. title -->
      <div class="g-spacer-2"></div>
      <p><a href="<?=baseUrl() . "change-email"?>">Змінити email</a></p>
      <div class="g-spacer-3"></div>
      <!-- title -->
      <h4 class="title  " data-name="getTitle">
         Налаштування паролю
      </h4>
      <!-- END. title -->
      <div class="g-spacer-2"></div>
      <p><a href="<?=baseUrl() . "reset-password"?>">Зкинути пароль</a></p>
   </div>
   <!-- END. __layout-main -->
   <!-- __layout-tariff-status -->
   <div class="p-profole__layout-tariff-status">
      <!-- tariff-status -->
      <div class="tariff-status" data-name="getTariffStatus">
         <div class="tariff-status__header">
            <!-- title -->
            <h3 class="title title--weight-normal " data-name="getTitle">
               Ваш тарифний план
            </h3>
            <!-- END. title -->
            <div class="tariff-status__header-group">
               <div class="tariff-status__image-wrapper">
                  <div class="tariff-status__image" style="background-image: url('./img/10days.png')"></div>
               </div>
               <div class="tariff-status__details">
                  <p><span>Назва тарифу:</span> 10 діб безкоштовно</p>
                  <p><span>Залишилось:</span> 8 діб</p>
                  <p><span>Статус:</span> перевірка оплати</p>
               </div>
            </div>
         </div>
         <div class="tariff-status__main">
            <div class="tariff-status__text-wrapper">
               <p>Вітаємо! Основною перевагою всіх тарифних планів є можливість додавати уроки в «Завершені». Таким чином ви можете відрізняти уроки, з якими ви ознайомились та вивчили, від усіх інших уроків.</p>
               <p>Вітаємо! Основною перевагою всіх тарифних планів є можливість додавати уроки в «Завершені». Таким чином ви можете відрізняти уроки, з якими ви ознайомились та вивчили, від усіх інших уроків.</p>
            </div>
            <img class="tariff-status__person-image" src="./img/eddy.svg" alt="hieddy person">
         </div>
      </div>
      <!-- END. tariff-status -->
   </div>
   <!-- END. __layout-tariff-status -->
</div>
<!-- END. p-profile -->