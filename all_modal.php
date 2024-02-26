<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    }else{
                        echo "User Not Found for given ID";
                    }
                ?>
            </div>
        </div>
    </div>
</div>