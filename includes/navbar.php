<nav class="navbar navbar-expand-lg fixed-top" id="header">
  <div class="container">
    <a href="index.php" class="navbar-brand text-white">
      KV Dental Clinic
    </a>
    <button class="navbar-toggler custom-toggler" style="border: none !important;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color:#fff !important;">
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item text-white">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">FAQ</a>
        </li>
        <?php
        if (isset($_SESSION['auth'])) {
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['name']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-black" href="appointment_history.php"><i class="fa-solid fa-clock-rotate-left"></i><small> Appointment History</small></a></li>
              <li><a class="dropdown-item text-black" data-bs-toggle="modal" data-bs-target="#edit_by_user_btn"><i class="fa-solid fa-gear fa-spin"></i> Settings</a></li>
              <li><a class="dropdown-item text-black" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-regular fa-bell fa-shake"></i>
              <small> <span class="text-white" id="notificationBadge"></span></small>
            </a>
            <ul class="dropdown-menu align-items-start" aria-labelledby="notificationDropdown">
              <?php
                function getUpcomingAppointments($daysAhead){
                  global $con;
                  $nextDay = date('Y-m-d', strtotime('+' . $daysAhead . ' days'));
                  $query = "SELECT * FROM tbl_appointments WHERE appointment_date >= '$nextDay'";
                  return mysqli_query($con, $query);
                }
                $appointments = getUpcomingAppointments(1);
                if (mysqli_num_rows($appointments) > 0) {
                  while ($row = mysqli_fetch_assoc($appointments)) {
                    echo '<li><a class="dropdown-item" href="#"><small>' . $row['appointment_date'] . ': ' . $row['dentist'] . '</small></a></li>';
                  }
                } else {
                  echo '<li><a class="dropdown-item" href="#"><small style="font-size: 13px;">No Appointment Scheduled</small></a></li>';
                }
              ?>
            </ul>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>