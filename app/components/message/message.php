<?php
  $type = '';
  $show = false;
  $content = '';
  $icon = '';

  if (isset($_SESSION['errors'])) {
    $type = 'is-danger';
    $content = $_SESSION['errors'];
    $show = true;
    $icon = icon('danger');
  } else if (isset($_SESSION['success'])) {
    $type = 'is-success';
    $content = $_SESSION['success'];
    $show = true;
    $icon = icon('check');
  }
?>


<?php if ($show): ?>
<div class="message js-message <?=$type?>">
  <div class="message__text">
    <?=$content?>
  </div>
  <div class="message__close-button">  
    <!-- button -->
    <button class="button button--transparent button--border-radius js-close-message " data-name="getButton">
      <span class="button__icon button__icon--dark" data-icon="close">
      <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.732233 1.23223C1.70854 0.255922 3.29146 0.255922 4.26777 1.23223L13 9.96447L21.7322 1.23223C22.7085 0.255922 24.2915 0.255922 25.2678 1.23223C26.2441 2.20854 26.2441 3.79146 25.2678 4.76777L16.5355 13.5L25.2678 22.2322C26.2441 23.2085 26.2441 24.7915 25.2678 25.7678C24.2915 26.7441 22.7085 26.7441 21.7322 25.7678L13 17.0355L4.26777 25.7678C3.29146 26.7441 1.70854 26.7441 0.732233 25.7678C-0.244078 24.7915 -0.244078 23.2085 0.732233 22.2322L9.46447 13.5L0.732233 4.76777C-0.244078 3.79146 -0.244078 2.20854 0.732233 1.23223Z" fill="#B788FE"></path>
      </svg>
      </span>
    </button>
    <!-- END. button -->
  </div>
</div>
<?php endif; ?>

<?php 

unset($_SESSION['errors']); 
unset($_SESSION['success']); 

?>