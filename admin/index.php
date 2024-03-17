<?php
    $title = "Dashboard - KV Dental ";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
    include('modal.php');
?>

<section>
    <div class="container-fluid px-4 mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-md-6">
                <div class="card text-center shadow bg-body-tertiary rounded">
                    <div class="card-header bg-primary text-white">
                        <small>Total Registered Accounts</small>
                    </div>
                    <div class="card-body">
                        <b class="h3">
                            <span id="userCount" class="animated-count">
                                <?php
                                    $users = getAll("tbl_users");
                                    $totalUsers = mysqli_num_rows($users);
                                    echo $totalUsers; 
                                ?>                                
                            </span>
                        </b>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-center shadow bg-body-tertiary rounded">
                    <div class="card-header bg-primary text-white">
                        <small>Total Appointments</small>
                    </div>
                    <div class="card-body">
                        <b class="h3">
                            +
                            <span id="appointmentCount" class="animated-count">
                                <?php
                                    $appointment = getAll("tbl_appointments");
                                    $totalAppointment = mysqli_num_rows($appointment);
                                    echo $totalAppointment;
                                ?>
                            </span>
                        </b>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-center shadow bg-body-tertiary rounded">
                    <div class="card-header bg-primary text-white">
                        <small>Patients Feedback</small>
                    </div>
                    <div class="card-body">
                        <b class="h3">
                            +
                            <span id="feedbackCount" class="animated-count">
                                <?php
                                    $feedback = getAllFeedback("tbl_feedback");
                                    $totalfeedback = mysqli_num_rows($feedback);
                                    echo $totalfeedback;
                                ?>
                            </span>
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section>
    <div class="container-fluid px-4 mt-5">
        <div class="row float-end mb-3">
            <form class="d-flex" role="search">
                <input id="searchInput" class="form-control me-2" type="search" placeholder="Search Patient Name..." aria-label="Search">
            </form>
        </div>
        <table class="table table-striped table-wrapper-scroll-y my-custom-scrollbar text-center shadow p-3 mb-5 bg-body-tertiary rounded">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date & Time</th>
                    <th>Services</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="searchPatientName">
                <?php
                    $appointments = getAllAppointments();
                    if (mysqli_num_rows($appointments) > 0) {
                        while ($data = mysqli_fetch_assoc($appointments)) {
                            ?>
                            <tr>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['appointment_date']; ?></td>
                                <td><?= $data['service']; ?></td>
                                <td><?= $data['status']; ?></td>
                                <td>
                                    <a href="<?= $data['id']; ?>" type="button" data-bs-toggle="modal" data-bs-target="#viewApppointmentUser" title="View Appointment Details"><i class="fa-regular fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No appointments found</td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</section> -->
<?php include('inc/footer.php'); ?>

<script>
    var userCount = <?php echo $totalUsers; ?>;
    var appointmentCount = <?php echo $totalAppointment; ?>;
    var feedbackCount = <?php echo $totalfeedback; ?>;

    function animateCount(elementId, finalCount) {
        var displayCount = 0;
        var step = Math.ceil(finalCount / 200); 

        function updateCount() {
            displayCount += step;
            if (displayCount >= finalCount) {
                displayCount = finalCount;
                clearInterval(animation);
            }
            document.getElementById(elementId).textContent = displayCount;
        }

        var animation = setInterval(updateCount, 130);
    }
    animateCount('userCount', userCount);
    animateCount('appointmentCount', appointmentCount);
    animateCount('feedbackCount', feedbackCount);
</script>