<ol>

  <li>
    <p>Створіть папку <b>my-site</b>.</p>
    <p>
      Наприклад, папку можна створити на робочому столі. Для цього
      клацніть правою кнопкою миші на робочому столі та виберіть
      "створити папку" або "create folder".
    </p>
  </li>

  <li>
    <p>Відкрійте цю папку в програмі Vusual Studio Code.</p>
    <p>
      Якщо в вас ще немає такої програми, то пройдіть 
      <a href="<?=baseUrl()?>lessons/download-code-editor" target="_blank">
      цей урок
      </a>.
    </p>
    <p>На картинці видно один з варіантів, як можна відкрити папку в програмі:</p>
    <?=image('open-folder.png', ['alias' => $alias])?>
    <p>
      Після відкриття папки повинна 
      з'явитись назва папки <b>my-site</b>. На каринці це номер 1.
    </p>
    <p>
      Цифрою 2 помічено місце, де буде розташоване дерево файлів та папок,
      які будуть в середині папки my-site.
    </p>
    <?=image('folder-on-sidebar.png', ['alias' => $alias])?>
  </li>

  <li>
    <p>
      В папці з проектом створіть файл <b>index.html</b>.
    </p>
    <p>
      Для цього натисніть на значок, який вказано на картинці,
      потім введіть назву файлу та натисніть Enter.
    </p>
    <?=image('create-file-button.png', ['alias' => $alias])?>

    <p>
      Цей файл одразу відкриється. Файл в дереві позначено
      цифрою 1. Цифрою 2 позначено місце, де ми будемо 
      писати код:
    </p>
    <?=image('file-on-sidebar.png', ['alias' => $alias])?>
  </li>

  <li>
    <p>Скопіюйте та вставте цей код в файл <b>index.html</b></p>

    <?=$get_simple_html_code($alias)?>
    <p>
      Після вставки кода зверніть увагу на білий кружечок, 
      на який вказує стрілка. Цей кружечок говорить про те,
      що файл ще не збережений.
    </p>
    <?=image('code-pasted-not-saved.png', ['alias' => $alias])?>
    <p>
      Щоб зберегти файл, на клавіатурі треба натиснути комбінацію 
      клавіш <b>Ctrl + s</b>. Після збереження білий кружечок має 
      пропасти, як на цій картинці:
    </p>
    <?=image('saved-file.png', ['alias' => $alias])?>
    <p>Важливо!</p>
    <p>
      Треба зберігати файл після кожної важливої для вас зміни.
    </p>
  </li>

  <li>
    <p>
      Відкрийте файл index.html за допомогою браузера.
    </p>
    <p>
      Для цього знайдить файл в папці <b>my-site</b>
      в провіднику файлів, потім натисніть по ньому правою кнопкою миші
      та виберить пункт "відкрити за допомогою". Та виберіть браузер зі спіску.
    </p>
    <p>
      В браузері маєте побачити напис "Мій сайт". 
      Вітаю! Це ваша, можливо перша в житті, веб-сторінка:
    </p>
    <?=image('browser.png', ['alias' => $alias])?>
  </li>
</ol>
