<?php
    $title = "KV Dental Clinic";
    include('functions/userfunction.php');
    include('./includes/header.php');
    include('all_modal.php');    
?>
<section style="background-image: url('img/dummy_img_3.png') !important; background-repeat: no-repeat !important; background-attachment: fixed; background-position: center; background-size: cover;">
    <div class="container home-container1-content">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-12 col-sm-12 text-left">
                <h1 id="text" style="color: white; font-size: 60px; font-size: clamp(2rem, 5vw, 5rem);"></h1>
                <p style="color:white;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos nesciunt, itaque amet ab repellat <br> vitae ducimus distinctio porro maiores laudantium mollitia ecto optio?</p>
                <a  type="button" class="btn btn-primary" href="appointment.php"><small>Book an appointment <i class="fa-regular fa-calendar-check"></i></small></a>
            </div>
        </div>
    </div>
</section>

<section class="overlap-main mb-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center">
                <h4><small><b>Trusted Services</b></small></h4>
                <p><small>Entrust your smile to professional</small></p>
            </div>
            <div class="col-lg-4 text-center">
                <h4><small><b>35+ Recovered Patients</b></small></h4>
                <p><small>Every tooth in a man's head is more valuable than a diamond</small></p>
            </div>
            <div class="col-lg-4 text-center">
                <h4><small><b>40+ Online Appointments</b></small></h4>
                <p><small>Stay fresh & fabulous with effortless online appointment</small></p>
            </div>
        </div>
    </div>
</section>

<section>
    <h2 class="text-center" style="color: var(--first-color);">Our Services</h2>
    <p class="text-center">You can get the heighest quality service here.</p>
    <div class="container text-center">
        <div class="row" style=" margin-top: 5%; display: flex; justify-content: space-between;">
            <div class="howItWorks-col" data-aos="fade-right">
                <img src="img/icons/dummy_icon_1.png" style="width: 60px;">
                <h5><small><b>Dental Implant</b></small></h5>
                <p>Dental implants are medical devices surgically implanted into the jaw to restore a person's ability to chew or their appearance.</p>
            </div>
            <div class="howItWorks-col" data-aos="fade-up">
                <img src="img/icons/dummy_icon_2.png" style="width: 60px;">
                <h5><small><b>Checkup & Cleaning</b></small></h5>
                <p>During a cleaning, your dentist or dental hygienist scrapes plaque and tartar from your teeth.</p>
            </div>
            <div class="howItWorks-col" data-aos="fade-left">
                <img src="img/icons/dummy_icon_3.png" style="width: 60px;">
                <h5><small><b>Root Canal Treatment</b></small></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi, earum dolorem aspernatur doloribus facere!</p>
            </div>
        </div>
        <div class="row" style=" margin-bottom: 5%; display: flex; justify-content: space-between;">
            <div class="howItWorks-col" data-aos="fade-right">
                <img src="img/icons/dummy_icon_4.png" style="width: 60px;">
                <h5><small><b>Veneers/Laminates</b></small></h5>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus laudantium accusantium asperiores nesciunt voluptate beatae!</p>
            </div>
            <div class="howItWorks-col" data-aos="fade-up">
                <img src="img/icons/dummy_icon_5.png" style="width: 60px;">
                <h5><small><b>Tooth filling</b></small></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi, earum dolorem aspernatur doloribus facere!</p>
            </div>
            <div class="howItWorks-col" data-aos="fade-left">
                <img src="img/icons/dummy_icon_6.png" style="width: 60px;">
                <h5><small><b>Orthodontic braces</b></small></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi, earum dolorem aspernatur doloribus facere!</p>
            </div>
        </div>
    </div>
</section>

<section style="background-color: var(--section);">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6 col-sm-12">
                <img src="img/dummy_img_2.png" style="width: 520px;">
            </div>
            <div class="col-lg-6 col-sm-12">
                <h2 style="color: var(--first-color);">Why Choose KV Dental Clinic</h2>
                <p>We use only the best <span>quality</span> materials on the market in order to provide best products to our patients.</p>
                <p><small><i class="fa-solid fa-check"></i> Top quality dental team.</small></p>
                <p><small><i class="fa-solid fa-check"></i> State of the art dental services.</small></p>
                <p><small><i class="fa-solid fa-check"></i> Easy and effortless online appointment.</small></p>
                <p><small><i class="fa-solid fa-check"></i> Top dental implant service.</small></p>
                <p><small><i class="fa-solid fa-check"></i> Committed to provide the best smile you’ve ever wanted.</small></p>
                <a type="button" href="#" class="btn btn-outline-secondary btn-sm"><small>About Us</small></a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="mt-lg-4 mb-lg-4 mt-sm-3 pt-lg-3 text-center">
        <h2 style="color: var(--first-color);">News & Blog post</h2>
    </div>
    <div class="container mb-lg-5 pt-lg-3">
        <div class="main-carousel" data-flickity='{ "freeScroll": true }'>
            <?php
                $blog = getAllBlogActive("tbl_blog");
                if (mysqli_num_rows($blog) > 0) {
                    foreach ($blog as $data) {
                    ?>
                        <div class="carousel-cell">
                            <div class="card" style="width: 90%; height: 30em;">
                                <img class="card-img-top" src="uploaded/<?= $data['image']; ?>" alt="News & Blog Image" style="width: 100%; height: 200px;">
                                <div class="card-header" style="border: none;">
                                    <h5 class="card-title"><b><?= $data['title']; ?></b></h5>
                                </div>
                                <div class="card-body" style="border: none;">
                                    <small><span><i class="fa-solid fa-blog"></i></span> Blog post</small>

                                    <p class="card-text"><small><?= $data['description']; ?></small></p>
                                </div>
                                <div class="card-footer" style="border: none;">
                                    <a href="<?= $data['links']; ?>"><small>View more <i class="fa-solid fa-arrow-right"></i></small></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }else{
                    echo "No data available";
                }
            ?>
        </div>
    </div>
</section>

<section style="padding-bottom: 100px; background-color: var(--section);">
    <div class="container">
        <div class="row align-items-center">
            <div class="row text-center mt-lg-4 mb-lg-4">
                <h1 style="color:var(--first-color);" class="pb-lg-0 mb-lg-0">Feedback</h1>
                <p>Feel free to send an email.</p>
            </div>
            <div class="col-lg-6" style="filter: grayscale(100%) invert(10%);">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15449.264382705356!2d121.04101302924295!3d14.52390322431441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9c7347ef727%3A0x4500c5215593e3de!2sKV%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1708760697895!5m2!1sen!2sph" width="600" height="450"  style="border-radius: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 offset-lg-1"> <!-- reuse offset-lg-1 value if di responsive -->
                <form id="feedback_form" method="POST">
                    <div class="mb-4">
                        <input type="text" name="name" class="form-control" placeholder="Your complete name *" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Your email *" required>
                    </div>
                    <div class="mb-4">
                        <textarea type="text" name="message" cols="30" rows="4" class="form-control" placeholder="Message *" required></textarea>
                    </div>
                    <button type="submit" value="Submit" class="btn btn-outline-secondary btn-sm">Submit <i class="fa-solid fa-envelope"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    var i = 0,
        text;
    text = "Smile Confidentaly."
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