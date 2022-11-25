<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Your Name">
  <?=$this::getMeta(); ?>
  <link rel="icon" type="image/png" href="/favicon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/styles/<?=codeTheme()?>.min.css">
  <link rel="stylesheet" href="https://ui.hi-eddy.com/dist/styles.css">
  <style>
    .debug {
      z-index: 100000;
      position: relative;
      background-color: white;
      padding: 20px;
    }
  </style>
</head>
<body>
<div class="l-layout">
  <aside class="l-layout__sidebar">
    <?=$this->component('sidebar')?>
  </aside>
  <div class="l-layout__main">
    <div class="l-layout__header">
      <?=$this->component('header')?>
    </div>
    <div class="l-layout__content">
      <?=$this->component('message')?>
      <?=$content?>
    </div>
    <div class="l-layout__footer">
      <?=$this->component('footer')?>
    </div>
  </div>
</div>
  
  <script>
    var serverUrl = "<?=siteUrl()?>";
    const PATH = '<?= PATH ?>';
  </script>
  

  <script src="https://ui.hi-eddy.com/dist/main.js"></script>
  <?=$scripts?>
</body>
</html>
