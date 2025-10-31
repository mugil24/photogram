<?php
include $_SERVER['DOCUMENT_ROOT'].'/project/lib/loade.php';
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
 <?php load_template('__head');?>
  <body>
    <?php load_template('__button')?>
    <?php 
    load_template('__header');
    ?>
    <main>
      <?php load_template("__content")?>
      <?php load_template('__boath');?>
    </main>
    <?php load_template('__footer')?>

    <script
      src="/project/assets/dist/js/bootstrap.bundle.min.js"
      class="astro-vvvwv3sm"
    >
  </script>
  </body>
</html>
