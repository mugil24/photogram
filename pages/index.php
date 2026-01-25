<?php
include $_SERVER['DOCUMENT_ROOT'].'/project/lib/loade.php';
$token = session::get('token');
$result = usersession::authorize($token);

if ($result === false) {
    // $session = new usesession($token);
    // $session->logout();
    session::destroy();
    
    header('Location: /project/pages/login.php');
    exit;
}

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


