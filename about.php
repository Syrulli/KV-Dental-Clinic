<?php
    // session_start();
    $title = "About | About KV Dental Clinic";
    include('functions/userfunction.php');
    include('./includes/header.php');
?>
<section style="background-color:white;">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-12 col-sm-12 text-left">
                <h2 style="color:black; letter-spacing: 0px; font-size: 20px;">KV Dental<h2>
                        <h2 style="color:black; letter-spacing: 0px; font-size: 60px;"> Smile Confidentaly.</h2>
                        <Volunteer style="color:black;">Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br> Harum, et! Neque nisi odio earum voluptatem similique asperiores magni reiciendis<br> rem esse incidunt corporis vel, ut eveniet soluta veniam suscipit hic!</p>
                            <button type="button" class="btn btn-dark">Join Now!</button>
            </div>
        </div>
    </div>
</section>

<section style="background-color: white;">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6 col-sm-12 ">
                <img src="img/dummy_img_2.png" style="width: 520px;">
            </div>
            <div class="col-lg-6 col-sm-12">
                <h2 style="color: var(--first-color);">KV Dental Clinic</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, iusto magni? Voluptatem iusto necessitatibus vel reprehenderit minus velit cupiditate molestias possimus dolorum! Praesentium quam eligendi dolorem vitae itaque quibusdam odio..iusto magni? Voluptatem iusto necessitatibus vel reprehenderit minus velit cupiditate molestias possimus dolorum! Praesentium quam eligendi dolorem vitae itaque quibusdam odio.</p>
                <button type="button" class="btn btn-dark">View our Members</button>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-12 col-sm-12 text-left">
                <h1 style="text-align: center;" class="text-left mb-1">MEET OUR DENTIST</h1>
                <p style="text-align: center;" class="text-center mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime est nobis repudiandae officiis atque mollitia.</p>
                <div class="row">
                    <div class="dentist-col">
                        <img src="img/what.png">
                        <h3 style="color: black;" class="text-start">Juan DeLuna</h3>
                        <p style="color:black;" class="text-left">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quia ducimus at praesentium, harum molestias exercitationem eveniet.</p>
                    </div>
                    <div class="dentist-col">
                        <img src="img/what.png">
                        <h3 style="color: black;" class="text-left">Juan DeLuna</h3>
                        <p style="color: black;" class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda reprehenderit nemo, nostrum placeat itaque unde architecto.</p>
                    </div>
                    <div class="dentist-col">
                        <img src="img/what.png">
                        <h3 style="color: black;" class="text-left;">Juan DeLuna</h3>
                        <p style="color: black;" class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error eius blanditiis laboriosam alias beatae.</p>
                    </div>
                </div>
</section>
<?php include('./includes/footer.php'); ?>