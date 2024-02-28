<!-- MODAL FOR EDIT ACC BY USER-->
<div class="modal fade" id="edit_by_user_btn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: hidden !important;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white d-flex justify-content-center" style="background-color: var(--first-color);">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">My Account</h1>
            </div>
            <div class="modal-body">
                <?php
                $users = getByAccId("tbl_users");
                if (mysqli_num_rows($users) > 0) {
                    $users = mysqli_fetch_array($users);
                ?>
                    <form action="admin/code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="tbl_user_id" value="<?= $users['id'] ?>">
                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-solid fa-tag"></i> Name</label></small>
                                    <input required type="name" name="name" class="form-control" value="<?= $users['name'] ?>" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-solid fa-at"></i> Email</label></small>
                                    <input required type="email" name="email" class="form-control" value="<?= $users['email'] ?>" placeholder="Email">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-solid fa-hashtag"></i> Phone No.</label></small>
                                    <input required type="number" name="phone" class="form-control" value="<?= $users['phone'] ?>" placeholder="Phone No.">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-solid fa-key"></i> Password</label></small>
                                    <div class="input-group">
                                        <input required type="password" name="password" id="password" class="form-control" value="<?= $users['password'] ?>" placeholder="Password">
                                        <button type="button" class="btn btn-outline-primary" onclick="togglePasswordVisibility()">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" value="<?= $users['id']; ?>" class="btn btn-outline-primary btn-sm" name="update_acc_by_user_btn">Update</button>
                        </div>
                    </form>
                <?php
                } else {
                    echo "User Not Found for given ID";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR EDIT APP BY USER-->
<div class="modal fade" id="edit_appointment_by_user_btn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit my appointment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                $appointment = editAppointmentByUser("tbl_appointments");
                if (mysqli_num_rows($appointment) > 0) {
                    $appointment = mysqli_fetch_array($appointment);
                ?>
                    <form action="functions/edit_appointment.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-regular fa-clock"></i> Date & Time</label></small>
                                    <input required type="datetime-local" name="appointment_date" class="form-control" value="<?= $appointment['appointment_date'] ?>">
                                </div>
                                <select for="service" id="service" name="service" class="form-select mb-3" aria-label="Large select example">
                                    <option selected><?= $appointment['service'] ?></option>
                                    <option value="Cleaning & polishing">Cleaning and polishing</option>
                                    <option value="Deep scaling">Deep scaling (gum treatment)</option>
                                    <option value="Tooth filling">Tooth filling (pasta)</option>
                                    <option value="Fluoride treatment">Fluoride treatment</option>
                                    <option value="Pit & fissure sealant">Pit and fissure sealant</option>
                                    <option value="Orthodontic braces">Orthodontic braces and clear aligners (with monthly cleaning and kit) </option>
                                    <option value="Oral Surgery">Oral Surgery (wisdom teeth removal, etc..)</option>
                                    <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                    <option value="Endodontics">Endodontics</option>
                                    <option value="Pediatric Dentistry">Pediatric Dentistry</option>
                                    <option value="Dentures">Dentures (Removable and Fixed)</option>
                                    <option value="Crowns & bridges">Crowns and bridges</option>
                                    <option value="Veneers/Laminates">Veneers/Laminates</option>
                                    <option value="Dental Implants">Dental Implants</option>
                                </select>
                                <div class="mb-3">
                                    <label for="price" class="form-label"><small><i class="fa-solid fa-peso-sign"></i></label> Price:</small>
                                    <input type="text" id="price" name="price" class="form-control" value="<?= $appointment['price'] ?> " disabled>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" value="<?= $appointment['id']; ?>" class="btn btn-outline-primary btn-sm" name="update_appointment_by_user_btn">Update</button>
                        </div>
                    </form>
                <?php
                } else {
                    echo "Something went wrong";
                }
                ?>
            </div>
        </div>
    </div>
</div>