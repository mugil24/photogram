<?php
include $_SERVER['DOCUMENT_ROOT'] . '/project/lib/loade.php'; //this like include<stdio.h> to know the where the funtion  load_template is
include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/user.class.php'; //this like include<stdio.h> to know the where the funtion  load_template is

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
        $ret = user::signup($_POST['user'], $_POST['email'], $_POST['pass']);
    }
}
?>



<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php load_template("__signuphead"); ?><!--this the user define function to load the content of head-->

<body class="d-flex align-items-center py-4 bg-body-tertiary" style="padding: 500px; ">

    <?php
    load_template('__signupbutton'); ?>
    <main class="form-signin w-100 m-auto">
         <?php load_template("__signupform") ?>
        <?if ($ret == true) {
            echo "true";
        } else {
            echo "false";
        }?> 

    </main>


    <script
        src="../assets/dist/js/bootstrap.bundle.min.js"
        class="astro-vvvwv3sm"></script>
</body>

</html>