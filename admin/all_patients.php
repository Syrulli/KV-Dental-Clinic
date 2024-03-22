<?php
    $title = "Patients - KV Dental Clinic";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
?>
<section>
    <div class="container-fluid px-4 mt-4" id="all_patients_info_table">
        <div class="row">
            <h3 class="float-start">All Patient <span>information</span></h3>
            <hr>
        </div>
        <div class="row float-end mb-3">
            <form class="d-flex" role="search">
                <input id="searchInput" class="form-control me-2" type="search" placeholder="Search Patient Name..." aria-label="Search">
            </form>
        </div>
        <table class="table table-striped table-wrapper-scroll-y my-custom-scrollbar text-center shadow p-3 mb-5 bg-body-tertiary rounded">
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Birthdate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="searchPatientName">
                <?php
                    $users = getAll("tbl_appointments");
                    if (mysqli_num_rows($users) > 0) {
                        foreach ($users as $data) {
                            ?>
                                <tr>
                                    <td><?= $data['lname']; ?></td>
                                    <td><?= $data['email']; ?></td>
                                    <td><?= $data['phone']; ?></td>
                                    <td><?= $data['dob']; ?></td>


                                    <td>
                                        <a href="edit_patient.php?id=<?= $data['id']; ?>" type="button" class="me-2" title="Edit user information"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a type="button" value="<?= $data['id']; ?>" class="delete_patient_btn btn-sm" title="Delete patient"><i class="fa-solid fa-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }else{
                        echo "No record found.";
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include('inc/footer.php'); ?>