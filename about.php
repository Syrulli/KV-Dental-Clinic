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
                        <h5 style="color:black;">Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br> Harum, et! Neque nisi odio earum voluptatem similique asperiores magni reiciendis<br> rem esse incidunt corporis vel, ut eveniet soluta veniam suscipit hic!</p>
                            <button type="button" class="btn btn-dark">Join Now!</button>
            </div>
        </div>
    </div>
</section>

<section style="background-color: var(--section);">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6 col-sm-12 ">
                <img src="img/dummy_img_2.png" style="width: 520px;">
            </div>
            <div class="col-lg-6 col-sm-12">
                <h2 style="color: var(--first-color);">KV Dental Clinic</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, iusto magni? Voluptatem iusto necessitatibus vel reprehenderit minus velit cupiditate molestias possimus dolorum! Praesentium quam eligendi dolorem vitae itaque quibusdam odio..iusto magni? Voluptatem iusto necessitatibus vel reprehenderit minus velit cupiditate molestias possimus dolorum! Praesentium quam eligendi dolorem vitae itaque quibusdam odio.</p>
                <i class="fa-brands fa-facebook"></i> <i class="fa-brands fa-linkedin"></i> <i class="fa-brands fa-square-instagram"></i> <button type="button" class="btn btn-dark">View our Members</button>
            </div>
        </div>
    </div>
</section>

<section>
    <h1 style="text-align: center;" class="text-left mb-1">MEET OUR DENTIST</h1>
    <div class="row row-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <img src="img/logo.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Juan George Luna</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam assumenda odio ex adipisci nam libero unde omnis voluptatibus ullam error mollitia placeat facilis corrupti voluptatem vel sapiente, commodi vitae maxime!</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="img/logo.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Juan George Luna</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam assumenda odio ex adipisci nam libero unde omnis voluptatibus ullam error mollitia placeat facilis corrupti voluptatem vel sapiente, commodi vitae maxime!</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="img/logo.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Juan George Luna</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur at debitis consequuntur enim doloremque, repellat aperiam reprehenderit optio reiciendis explicabo animi, et, ipsum accusamus. Laborum voluptatibus deserunt molestias deleniti a.</p>
                </div>
            </div>
        </div>

</section>
<?php include('./includes/footer.php'); ?>