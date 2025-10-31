

 <form method="POST" action="signup.php">
     <img
         class="mb-4"
         src="../assets/brand/bootstrap-logo.svg"
         alt=""
         width="72"
         height="57"
         style="margin-left: 100px;" />
     <h1 class="h3 mb-3 fw-normal " style="text-align: center;">Please sign up</h1>
     <div class="form-floating" style="margin-bottom: -1px;">
         <input
             type="text"
             class="form-control"
             id="floatingInput"
             placeholder="mugil24"
             name="user" />
         <label for="floatingInput">Username</label>
     </div>
     <div class="form-floating" style="margin-bottom: -1px;">
         <input
             type="email"
             class="form-control"
             id="floatingPassword"
             placeholder="Password"
             name="email" />
         <label for="floatingInput">Email address</label>
     </div>
     <div class="form-floating" style="margin-bottom: -1px;">
         <input
             type="password"
             class="form-control"
             id="floatingPassword"
             placeholder="Password"
             name="pass" />
         <label for="floatingPassword">Password</label>
     </div>
     <div class="form-check text-start my-3">
         <input
             class="form-check-input"
             type="checkbox"
             value="remember-me"
             id="checkDefault" />
         <label class="form-check-label" for="checkDefault">
             Remember me
         </label>
     </div>
     <button class="btn btn-primary w-100 py-2" type="submit">
         Sign up
     </button>
 </form>
