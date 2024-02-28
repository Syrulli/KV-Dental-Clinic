<?php
session_start();
$title = "Create Account | RV Dental";
if (isset($_SESSION['auth'])) {
  $_SESSION['message'] = "You already Logged in";
  header('Location: index.php');
  exit();
}
include('includes/header.php');
?>
<section style="background-image: url('img/dummy_img_1.png') !important; background-repeat: no-repeat !important; background-attachment: fixed; background-position: center; background-size: cover;">
  <div class="container mt-5" style="width: 75%;">
    <div class="row min-vh-100 align-items-center mx-auto">
      <div class="col-lg-12 col-sm-12">
        <?php
        if (isset($_SESSION['message'])) { ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['message']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
          unset($_SESSION['message']);
        }
        ?>
        <div class="card" style="background-color: var(--section);">
        <div class="card-header text-center" style="background-color: var(--first-color);">
            <h4 class="text-white" style="letter-spacing: 5px; font-size: 20pt;">Create an Account</h4>
          </div>
          <div class="card text-black">
            <form action="functions/auth.php" method="POST">
              <div class="row px-2">
                <div class="container col-6">
                  <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Birthdate</label>
                    <input type="date" id="birthday" name="birthday" class="form-control">
                  </div>
                </div>
                <div class="container col-6">
                  <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control">
                  </div>
                 
                  <!-- PASTE LINE 27-35 -->
                  <div class="mb-3">  
                <label class="form-label"><small><i class="fa-solid fa-key"></i> Password</label></small>
                <div class="input-group">
                  <input type="password" name="password" id="password" class="form-control">
                  <button type="button" class="btn btn-outline-primary" onclick="togglePasswordVisibility()">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
                  <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control">
                  </div>
                </div>
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" name="register_btn" class="btn btn-outline-primary btn-sm">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<?php include('includes/footer.php'); ?>