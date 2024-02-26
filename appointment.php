<?php
    $title = "Book an appointment";
    include('./includes/header.php');
    include('functions/userfunction.php');
    include('all_modal.php');    
    include('authenticate.php');
?>
<section style="background-image: url('img/dummy_img_1.png')
     !important; background-repeat: no-repeat; background-position: left !important; background-size: cover; background-attachment: fixed; ">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-12 col-sm-12 text-left">
                <h1 id="text" style="color: white; font-size: 60px;"></h1>
                <p style="color:white;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos nesciunt, itaque amet ab repellat <br> vitae ducimus distinctio porro maiores laudantium mollitia ecto optio?</p>
            </div>
        </div>
    </div>
</section>
<section class="mb-5">
    <div class="container mt-lg-5 mt-sm-5">
        <div class="row mb-lg-5">
            <div class="col-lg-7 col-sm-12">
                <h2 class="mb-2" style="color: var(--first-color);">Best dental clinic that you can trust.</h2>
                <p><small><i class="fa-regular fa-clock"></i> Monday 10:00 AM - 6:00 PM</small></p>
                <p><small><i class="fa-regular fa-clock"></i> Tuesday 10:00 AM - 6:00 PM</small></p>
                <p><small><i class="fa-solid fa-calendar-xmark"></i> Wednesday <span style="color: red !important;">CLOSED</span></small></p>
                <p><small><i class="fa-regular fa-clock"></i> Thursday10:00 AM - 6:00 PM</small></p>
                <p><small><i class="fa-regular fa-clock"></i> Friday10:00 AM - 6:00 PM</small></p>
                <p><small><i class="fa-regular fa-clock"></i> Saturday 9:00 AM - 6:00 PM</small></p>
                <p><small><i class="fa-regular fa-clock"></i> Sunday 9:00 AM - 1:00 PM</small></p>
            </div>
            <div class="col-lg-5">
                <div class="card mt-lg-3 shadow bg-body-tertiary rounded">
                    <div class="card-header text-center">Book your appointments to KV Dental Clinic</div>
                    <form id="appointmentForm">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="appointment_date" class="form-label"><small><i class="fa-regular fa-clock"></i> Date & Time</label></small>
                                <input type="datetime-local" id="appointment_date" name="appointment_date" required class="form-control">
                            </div>
                            <select for="service" id="service" name="service" class="form-select mb-3" aria-label="Large select example">
                                <option selected>Dental services offered:</option>
                                <option value="cleaning">Cleaning and polishing</option>
                                <option value="deep_scaling">Deep scaling (gum treatment)</option>
                                <option value="tooth_filling">Tooth filling (pasta)</option>
                                <option value="fluoride_treatment">Fluoride treatment</option>
                                <option value="pit_fissure_sealant">Pit and fissure sealant</option>
                                <option value="braces">Orthodontic braces and clear aligners (with monthly cleaning and kit) </option>
                                <option value="oral_surgery">Oral Surgery (wisdom teeth removal, etc..)</option>
                                <option value="cosmetic_dentistry">Cosmetic Dentistry</option>
                                <option value="endodontics">Endodontics</option>
                                <option value="pediatric_dentistry">Pediatric Dentistry</option>
                                <option value="dentures">Dentures (Removable and Fixed)</option>
                                <option value="crown_bridges">Crowns and bridges</option>
                                <option value="vaneers_laminates">Veneers/Laminates</option>
                                <option value="dental_implants">Dental Implants</option>
                            </select>
                            <div class="mb-3">
                                <label for="price" class="form-label"><small><i class="fa-solid fa-peso-sign"></i> Price:</label></small>
                                <input type="text" id="price" name="price" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="card-footer text-body-secondary text-center">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Schedule Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-lg-3" style="height: 65px !important;">
        <!-- <ul class="breadcrumb d-flex align-items-center pt-lg-4 text-black">
            <li class="breadcrumb-item"><a href="#">Appointment History</a></li>
        </ul> -->
        <p>Appointment History</p>
        <hr>
    </div>
    <div class="container mt-lg-3 mb-5 my-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Appointment Date</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $appointment = getAppointmentById();

                            if (mysqli_fetch_array($appointment) > 0) {
                                foreach ($appointment as $data) {
                                    ?>
                                        <tr>
                                            <td> <?= $data['id']; ?> </td>
                                            <td> <?= $data['appointment_date']; ?> </td>
                                            <td> <?= $data['service']; ?> </td>
                                            <td> <?= $data['price']; ?> </td>
                                            <td> <?= $data['status']; ?> </td>
                                    <?php
                                }
                            }else{
                                ?>
                                        <td colspan="5">No data</td>
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
<script>
    var i = 0,
        text;
    text = "Book an appointment now!"

    function typing() {
        if (i < text.length) {
            document.getElementById("text").innerHTML += text.charAt(i);
            i++;
            setTimeout(typing, 100);
        }
    }
    typing();
</script>
<?php include('./includes/footer.php'); ?>