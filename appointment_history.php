<?php
    $title = "Appointment History";
    include('functions/userfunction.php');
    include('./includes/header.php');
    include('authenticate.php');
    include('all_modal.php');
?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="var(--first-color)" fill-opacity="1" d="M0,96L48,101.3C96,107,192,117,288,106.7C384,96,480,64,576,64C672,64,768,96,864,144C960,192,1056,256,1152,240C1248,224,1344,128,1392,80L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
<section class="appointment_history_table">
    <div class="container pt-lg-3" style="height: 65px !important;">
        <p>Appointment History</p>
        <hr>
    </div>
    <div class="container mt-lg-3 mb-5 my-5" id="appointment_history_table">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                    <thead>
                        <tr>
                            <th>Appointment Date</th>
                            <th>Dentist</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $appointment = getAppointmentById();
                        if (mysqli_fetch_array($appointment) > 0) {
                            foreach ($appointment as $data) {
                        ?>
                                <tr>
                                    <td> <?= $data['appointment_date']; ?> </td>
                                    <td> <?= $data['dentist']; ?> </td>
                                    <td> <?= $data['service']; ?> </td>
                                    <td> <?= $data['price']; ?> </td>
                                    <td> <?= $data['status']; ?> </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm edit-appointment-btn me-2" data-bs-toggle="modal" data-bs-target="#edit_appointment_by_user_btn" data-appointment-id="<?= $data['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" value="<?= $data['id']; ?>" class="btn btn-outline-danger delete_appointment_btn btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                <?php
                            }
                        } else {
                                ?>
                                <td colspan="10">No data</td>

                                </tr>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include('./includes/footer.php'); ?>