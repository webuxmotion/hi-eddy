<div class="l-layout__header">
  <!-- header -->
  <header class="header" data-name="headerVariant1">
    <div class="header__navigation">
      
      
      <!-- nav-item -->
      <div class="nav-item" tabindex="0">
        <div class="nav-item__dropdown">
          <ul>
            <li>
              <a href="#">про академію</a>
            </li>
            <li>
              <a href="#">політика конфіденційності</a>
            </li>
            <li>
              <a href="#">оферта</a>
            </li>
            <li>
              <a href="#">оплата та доставка</a>
            </li>
          </ul>
        </div>
        <a class="nav-item__control">
        <span class="nav-item__text">Про нас</span>
        </a>
      </div>
      <!-- END. nav-item -->
      <!-- nav-item -->
      <div class="nav-item">
        <a href="<?=baseUrl() . "prices"?>" class="nav-item__control">
        <span class="nav-item__text">Ціни</span>
        </a>
      </div>
      <!-- END. nav-item -->
    </div>
    <?php if (isUser()): ?>
      <div class="header__corner-button">
        <!-- button -->
        <a href="<?=baseUrl() . "profile"?>" class="button button--header button--header-corner " data-name="getButton">
        <span class="button__text"><?=getUserButtonTitle()?></span>
        </a>
        <!-- END. button -->
      </div>
    <?php else: ?>
    <!-- button -->
    <a href="<?=baseUrl() . "login?redirectTo=profile"?>" class="button button--header button--header-bottom-radius " data-name="getButton">
      <span class="button__icon button__icon--light" data-icon="user">
        <svg width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.7574 16.7574C2.88261 15.6321 4.40871 15 6 15H16C17.5913 15 19.1174 15.6321 20.2426 16.7574C21.3678 17.8825 22 19.4087 22 21V23.5C22 24.0523 21.5523 24.5 21 24.5C20.4477 24.5 20 24.0523 20 23.5V21C20 19.9391 19.5786 18.9217 18.8284 18.1716L18.8284 18.1716C18.0783 17.4214 17.0609 17 16 17H6C4.93915 17 3.92173 17.4214 3.17158 18.1716L3.17154 18.1716C2.42143 18.9217 2 19.9391 2 21V23.5C2 24.0523 1.55228 24.5 1 24.5C0.447715 24.5 0 24.0523 0 23.5V21C0 19.4087 0.63211 17.8826 1.75736 16.7574C1.75737 16.7574 1.75738 16.7574 1.7574 16.7574Z" fill="black"></path>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M5 6C5 2.6863 7.6863 0 11 0C14.3137 0 17 2.68629 17 6C17 9.31371 14.3137 12 11 12C7.6863 12 5 9.3137 5 6ZM11 2C8.79086 2 7 3.79086 7 6C7 8.20914 8.79086 10 11 10C13.2091 10 15 8.20913 15 6C15 3.79087 13.2091 2 11 2Z" fill="black"></path>
        </svg>
      </span>
      <span class="button__text">Вхід</span>
    </a>
    <!-- END. button -->
    <div class="header__corner-button">
      <!-- button -->
      <a href="<?=baseUrl() . "registration?redirectTo=profile"?>" class="button button--header button--header-corner " data-name="getButton">
      <span class="button__text">Рeєстрація</span>
      </a>
      <!-- END. button -->
    </div>
    <?php endif; ?>
  </header>
  <!-- END. header -->
</div>