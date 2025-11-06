<div class="container d-flex justify-content-center">
  <div style="width: 100%; max-width: 400px;">
    <form method="POST" action="signup.php"><!-- this line use to action and method   -->
      <img class="mb-4 d-block mx-auto"
           src="../assets/brand/bootstrap-logo.svg"
           width="72" height="57" />

      <h1 class="h3 mb-3 fw-normal text-center">Please sign up</h1>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" placeholder="mugil24" name="user" require/>
        <label>Username</label>
      </div>

      <div class="form-floating mb-2">
        <input type="email" class="form-control" placeholder="email" name="email" require/>
        <label>Email address</label>
      </div>

      <div class="form-floating mb-2">
        <input type="password" class="form-control" placeholder="Password" name="pass" required />
        <label>Password</label>
      </div>

      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" />
        <label class="form-check-label">Remember me</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
    </form>
  </div>
</div>
