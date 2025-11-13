<?php
include $_SERVER['DOCUMENT_ROOT'].'/project/lib/loade.php';
$var;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $result = user::login($_POST['email'], $_POST['password']);
        if ($result === true) {
            //session::start();
            session::set('email', $_POST['email']);
            session::set('password', $_POST['password']);
            $email = session::get('email');
            $pass = session::get("password");
        } else {
            $var = $result;
        }


    } else {
        return false;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/project/css/style.css" rel="stylesheet">
</head>

<body>
    
  <div class="contin">
      <img src="sanji.jpg" class="rounded mx-auto d-block" alt="LOGO" id="logo">
      <form class="form1" method="POST"  action="login.php">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label ">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
              <div id="emailHelp" class="form-text">
                <?php
                if ($var) {?>
               <div class="alert alert-danger" role="alert">
                     <?php echo $var?>
                </div>
               <?php }?>
              </div>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password"required>
          </div>

          <div class="mb-3 d-flex justify-content-between align-items-center">
              <a href="#" class="text-decoration-none mx-auto">Forgetpassword?</a>
              <a href="/project/pages/signup.php" class="text-decoration-none">Sign up</a>
          </div>

          <div class="d-grid gap-2">
              <button class="btn btn-primary" type="submit">Login</button>
          </div>
      </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>
