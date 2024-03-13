<?php
    $title = "News & Blogs - KV Dental Clinic";
    include('../middleware/admin_middleware.php');
    include('inc/header.php');
    include('modal.php');
?>
<section>
    <div class="container-fluid px-4 mt-4" id="all_blog_table">
        <div class="row">
            <h3 class="float-start">News <span>&</span> Blogs</h3>
            <hr>
        </div>
        <button title="Add News & Blogs" type="button" class="btn btn-outline-primary mb-3 float-end btn-sm" data-bs-toggle="modal" data-bs-target="#add_blog_btn">
            <i class="fa-solid fa-circle-plus"></i> Add News & Blogs
        </button>
        <table class="table table-striped table-wrapper-scroll-y my-custom-scrollbar text-center shadow p-3 mb-5 bg-body-tertiary rounded">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Links</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $blog = getAllBlog("tbl_blog");
                    if (mysqli_num_rows($blog) > 0) {
                        foreach ($blog as $data) {
                            ?>
                                <tr>
                                    <td><small><?= $data['title']; ?></small></td>
                                    <td>
                                        <img style="width: 30px; height: 30px; border-radius: 30%;" src="../uploaded/<?= $data['image']; ?>">
                                    </td>
                                    <td><small><?= $data['links']; ?></small></td>
                                    <td>
                                        <a href="edit_blog.php?id=<?= $data['id']; ?>" type="button" class="me-2" title="Edit New & Blogs"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a type="button" value="<?= $data['id']; ?>" class="delete_blog_btn" title="Delete New & Blogs"><i class="fa-solid fa-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }else{
                        ?>
                            <tr><td colspan="6">No News & Blogs found</td></tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include('inc/footer.php'); ?>