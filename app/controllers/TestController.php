<?php

namespace app\controllers;

use core\base\View;

class TestController
{

  public function __construct()
  {
    echo View::loadView('components/test/test', [
      "functions" => [
        "basename", 
        "chgrp",
        "chmod",
        "fgetc"
      ]
    ]);
  }

  public function indexAction()
  {
    debug('index action');
    die;
  }

  public function createFileAction()
  {
    debug('Create file');
    $filename = "./files/text.txt";
    touch($filename);
    die;
  }

  public function formAction()
  {
    echo "
          <form method='post'>
            <input type='submit' value='Save'>
          </form>
        ";

    if (isset($_POST)) {
      $filename = tempnam("./files", "flaaa");
      debug($filename);
      $fd = fopen($filename, "w");
      fclose($fd);
    }
    die;
  }

  public function copyAction()
  {
    if (copy("./files/text.txt", "./files/new-text.txt")) echo "File copied";
    else echo "File not copied";
    die;
  }

  public function renameAction()
  {
    if (rename("./files/text.txt", "./files/renamed.txt")) echo "OK";
    else echo "NO";
    die;
  }

  public function deleteFilesAction()
  {
    $scanRes = scandir("./files");

    foreach ($scanRes as $item) {
      if (is_dir($item)) continue;

      unlink("./files/" . $item);
    }
    die;
  }

  public function uploadAction()
  {
    echo 
    "
      <form method='post' action='/test/upload' enctype='multipart/form-data'>
        <input type='file' name='filename'><br>
        <input type='submit' value='Upload'>
      </form>
    ";

        if (isset($_FILES['filename'])) {
          $tmp_name = $_FILES['filename']['tmp_name'];
          $name = $_FILES['filename']['name'];
          if (is_uploaded_file($tmp_name)) {
            if (move_uploaded_file($tmp_name, "./files/" . $name)) {
              echo 'File uploaded';
            } else {
              echo 'Not uploaded';
            }
          }
        }

    die;
  }

  
  public function Action() {

  }

  public function basenameAction() {
    $path = "./files/text.txt";

    echo basename($path) ."<br/>";
    echo basename($path,".txt");

    die;
  }

  public function chgrpAction() {
    $path = "./files/text.txt";

    chgrp($path, "admin");

    die;
  }

  public function chmodAction() {
    $path = "./files/text.txt";

    // Read and write for owner, nothing for everybody else
    chmod($path, 0600);

    die;
  }

  public function fgetcAction() {
    $fd = fopen("./files/text.txt", "r");
    $count = 0;
    if (!$fd) exit("Cannot open the file");

    // Написати скрипт:
    // Який з символів зустрічається найчастіше?
    while (($char = fgetc($fd)) !== FALSE) {
      if ($char == 'a') $count++;
    }

    fclose($fd);

    echo $count;

    die;
  }
}
