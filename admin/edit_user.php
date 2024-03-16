<?php
    $title ="Edit Patient Information";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
?>

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active"><a href="all_users.php" class="text-black">All patients</a></li>
        <li class="breadcrumb-item"><b><span>Edit information</span></b></li>
    </ol>
    <div class="row mt-3">
        <div class="col-lg-12">
            <?php 
                if(isset($_GET['id'])){

                    $id = $_GET['id']; // fetch with id.
                    $tbl_users = getByID("tbl_users", $id);

                    if(mysqli_num_rows($tbl_users) > 0){
                        $data = mysqli_fetch_array($tbl_users);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit information form</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <input type="hidden" name="tbl_user_id" value="<?= $data['id'] ?>">
                                                    <label class="form-label"><b><small>Patient ID</small></b></label>
                                                    <input disabled type="text" name="id" value="<?= $data['id'] ?>" class="form-control" placeholder="Enter Item Name" disable>

                                                    <label class="form-label pt-1 mt-2"><b><small>Name</small></b></label>
                                                    <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" placeholder="Enter Full Name">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label"><b><small>Email</small></b></label>
                                                <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" placeholder="Enter Email">

                                                <label class="form-label pt-1 mt-2"><b><small>Phone</small></b></label>
                                                <input type="text" name="phone" value="<?= $data['phone'] ?>" class="form-control" placeholder="Enter Phone Number">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label"><small><i class="fa-solid fa-key"></i> Password</label></small>
                                                <div class="input-group">
                                                    <input type="password" name="password" value="<?= $data['password'] ?>" id="password" class="form-control">
                                                    <button type="button" class="btn btn-outline-primary" onclick="togglePasswordVisibility()">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-outline-primary" name="update_user_btn" title="Update News & Blog"><i class="fa-solid fa-check"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }else{
                        redirect("index.php", "Item Not Found");
                    }
                }else{
                    redirect("index.php", "ID Missing from URL");
                }
            ?>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>