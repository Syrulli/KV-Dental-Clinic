<?php
  // session_start();
  $title = "Sign in | KV Dental Clinic";
  if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You already Logged in";
    header('Location: index.php');
    exit();
  }
  include('includes/header.php');
?>
<section style="background-image: url('img/dummy_img_1.png') !important; background-repeat: no-repeat !important; background-attachment: fixed; background-position: center; background-size: cover;">
  <div class="container" style="width: 40%;">
    <div class="row min-vh-100 align-items-center">
      <div class="col-lg-12 col-sm-12">
        <div class="card text-black">
          <div class="card-header text-center" style="background-color: var(--first-color);">
            <h4 class="text-white" style="letter-spacing: 5px; font-size: 20pt;">Welcome back</h4>
          </div>
          <div class="card-body">
            <!-- WAG GAGALAWIN FUNCTION NI LLOYD TO  -->
            <form action="functions/auth.php" method="POST">
              <div class="mb-3">
                <label class="form-label"><small> <i class="fa-solid fa-at"></i> Email address</label></small>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label"><small><i class="fa-solid fa-key"></i> Password</label></small>
                <div class="input-group">
                  <input type="password" name="password" id="password" class="form-control">
                  <button type="button" class="btn btn-outline-primary" onclick="togglePasswordVisibility()">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="login_btn" class="btn btn-outline-primary btn-sm text-center">Sign in</button>
                <a class="btn btn-outline-secondary btn-sm text-center" href="register.php">Create new account</a>
              </div>
            </form>
            <!-- WAG GAGALAWIN FUNCTION NI LLOYD TO  -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <p class="text-center mb-5 my-5 text-white"><i class="fa-solid fa-cookie"></i> This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies. Read more of our <a href="#" style="color: var(--first-color);"><ins> Privacy Policy.</ins></a>
</section>
<?php include('includes/footer.php'); ?>
