import './styles.scss';

import './hljs.js';

document.getElementById('languages').addEventListener('click', (event) => {
  let buttonElement = null;
  if (event.target.classList.contains('dropdown-item')) {
    buttonElement = event.target;
  } else if (event.target.closest('.dropdown-item')) {
    buttonElement = event.target.closest('.dropdown-item');
  }

  if (buttonElement) {
    const lang_code = buttonElement.dataset.langcode;
    window.location = PATH + '/language/change?lang=' + lang_code;
  }
});

// $('#languages button').on('click', function () {
//   const lang_code = $(this).data('langcode');
//   window.location = PATH + '/language/change?lang=' + lang_code;
// });
