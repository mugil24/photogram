  <div class="contin">
      <img src="sanji.jpg" class="rounded mx-auto d-block" alt="LOGO" id="logo">
      <form class="form1" method="POST"  action="login.php">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label ">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
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