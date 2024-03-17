<!-- ADD NEWS & BLOGS MODAL -->
<div class="modal fade" id="add_blog_btn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">News & Blogs</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Links</label>
                                <input type="text" name="links" class="form-control" placeholder="Enter links">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea rows="4" type="text" name="description" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-lg-12 mb-2">
                            <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="add_blog_btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ADD NEWS & BLOGS MODAL -->

<!-- VIEW FEEDBACKS MODAL -->
<div class="modal fade" id="viewFeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: hidden !important;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white d-flex justify-content-center" style="background-color: var(--first-color);">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">Patient Feedback</h1>
            </div>
            <div class="modal-body">
                <?php
                $feedback = getAllFeedback("tbl_feedback");
                if (mysqli_num_rows($feedback) > 0) {
                    $feedback = mysqli_fetch_array($feedback);
                ?>
                    <form action="#" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-regular fa-id-card"></i> ID</label></small>
                                    <input required type="text" name="id" class="form-control" value="<?= $feedback['id'] ?> " placeholder="Name" readonly disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-solid fa-tag"></i> Name</label></small>
                                    <input required type="text" name="name" class="form-control" value="<?= $feedback['name'] ?> " placeholder="Name" readonly disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-solid fa-at"></i> Email</label></small>
                                    <input required type="email" name="email" class="form-control" value="<?= $feedback['email'] ?> " placeholder="Email" readonly disabled>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><small><i class="fa-regular fa-message"></i> Patient Feedback</label></small>
                                    <textarea rows="7" type="text" name="message" class="form-control" readonly disabled><?= $feedback['message'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                    echo "Patient Feedback Not Found for given ID";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- VIEW FEEDBACKS MODAL -->
