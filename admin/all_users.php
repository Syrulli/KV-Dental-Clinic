<?php
    $title = "All Users - Tayouth";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">All Users</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    All Users Information
                </div>
                <div class="card-body">
                    <div class="container col-12">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td><b>ID</b></td>
                                            <td><b>Name</b></td>
                                            <td><b>Email</b></td>
                                            <td><b>Phone No.</b></td>
                                            <td><b>Password</b></td>
                                            <td><b>Action</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $users = getAll("tbl_users");
                                            if (mysqli_num_rows($users) > 0) {
                                                foreach ($users as $data) {
                                            ?>
                                                <tr>
                                                    <td><?= $data['id']; ?></td>
                                                    <td><?= $data['name']; ?></td>
                                                    <td><?= $data['email']; ?></td>
                                                    <td><?= $data['phone']; ?></td>
                                                    <td><?= $data['password']; ?></td>
                                                    <td class="">
                                                        <div class="row">
                                                            <div class="col-3" title="Edit User">
                                                                <a href="edit_user.php?id=<?= $data['id']; ?>" type="button" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            </div>
                                                            <div class="col-3" title="Delete User">
                                                                <button type="button" value="<?= $data['id']; ?>" class="btn btn-outline-danger delete_user_btn btn-sm"><i class="fa-solid fa-trash"></i></button>
                                                            </div>
                                                        </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>