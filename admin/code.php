<?php
    // session_start();
    include('../config/dbcon.php');
    include('../functions/myfunction.php');

    // UPDATE USERS FUNCTIONS      
        if (isset($_POST['update_user_btn'])) {
            //FETCH all Values
            $tbl_user_id = $_POST['tbl_user_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            
            $update_query = "UPDATE tbl_users SET 
                name='$name', 
                email='$email', 
                phone='$phone', 
                password='$password'
                WHERE id='$tbl_user_id' 
            ";
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run){
                redirect("all_users.php?id=$tbl_user_id", "User Info Updated Successfully!");
            }else{
                redirect("all_users.php?id=$tbl_user_id", "Something Went Wrong!");
            }
        }
    // UPDATE USERS FUNCTIONS

    // DELETE USER FUNCTIONS
        else if(isset($_POST['delete_user_btn'])){
            $user_table = mysqli_real_escape_string($con, $_POST['user_table']);

            $tbl_user_query = "SELECT * FROM tbl_users WHERE id='$user_table' ";
            $tbl_user_query_run = mysqli_query($con, $tbl_user_query);
            $tbl_user_data = mysqli_fetch_array($tbl_user_query_run);

            $delete_query = "DELETE FROM tbl_users WHERE id='$user_table' ";
            $delete_query_run = mysqli_query($con, $delete_query);

            if($delete_query_run){
                echo 200;
            }else{
                echo 500;
            }
        }
    // DELETE USER FUNCTIONS

    // ADD BLOG FUNCTIONS
        else if (isset($_POST['add_blog_btn'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $links = $_POST['links'];

            // storing image in database suckss
            $image = $_FILES['image']['name'];
            $path = "../uploaded";
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time() . '.' . $image_ext;

            $blog_query = "INSERT INTO tbl_blog (
                            title,
                            description, 
                            links, 
                            image 
                    ) VALUES ('
                            $title', 
                            '$description', 
                            '$links', 
                            '$filename'
                    )";

            $blog_query_run = mysqli_query($con, $blog_query);

            if ($blog_query_run) {
                move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
                redirect("all_blog.php", "News & Blogs Added Successfully");
            } else {
                redirect("all_blog.php", "Something Went Wrong");
            }
        }
    // ADD BLOG FUNCTIONS

    // UPDATE BLOG FUNCTIONS      
        else if (isset($_POST['update_blog_btn'])) {
            //FETCH all Values
            $tbl_blog_id = $_POST['tbl_blog_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $links = $_POST['links'];
            // IMAGE STORING
            $new_image = $_FILES['image']['name'];
            $old_image = $_POST['old_image'];

            if ($new_image != "") {
                // $update_filename = $new_image;
                $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
                $update_filename = time() . '.' . $image_ext;
            } else {
                $update_filename = $old_image;
            }
            $path = "../uploaded";

            $update_query = "UPDATE tbl_blog SET 
                    title='$title', 
                    description='$description', 
                    links='$links', 
                    image='$update_filename' 

                WHERE id='$tbl_blog_id' 
            ";
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run){
                if ($_FILES['image']['name'] != ""){
                    // move new image to the folder
                    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
                    // Delete old image
                    if (file_exists("../uploaded/" . $old_image)){
                        unlink("../uploaded/" . $old_image);
                    }
                }
                redirect("all_blog.php?id=$tbl_blog_id", "News & Blog Updated Successfully!");
            }else{
                http_response_code(500);
                redirect("all_blog.php?id=$tbl_blog_id", "Something went wrong!");
            }
        }
    // UPDATE BLOG FUNCTIONS

    // DELETE BLOG FUNCTIONS
        else if(isset($_POST['delete_blog_btn'])){
            $blog_table = mysqli_real_escape_string($con, $_POST['blog_table']);

            $tbl_blog_query = "SELECT * FROM tbl_blog WHERE id='$blog_table' ";
            $tbl_blog_query_run = mysqli_query($con, $tbl_blog_query);
            $tbl_blog_data = mysqli_fetch_array($tbl_blog_query_run);
            $image = $tbl_blog_data ['image'];

            $delete_query = "DELETE FROM tbl_blog WHERE id='$blog_table' ";
            $delete_query_run = mysqli_query($con, $delete_query);

            if($delete_query_run){
                if(file_exists("../uploaded/".$image)){
                    unlink("../uploaded/".$image);
                }
                echo 200;
            }else{
                echo 500;
            }
        }
    // DELETE BLOG FUNCTIONS

    // UPDATE ACCOUNT BY USER FUNCTIONS
        else if (isset($_POST['update_acc_by_user_btn'])) {
            $tbl_user_id = $_POST['tbl_user_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            
            $update_query = "UPDATE tbl_users SET 
                name='$name', 
                email='$email', 
                phone='$phone', 
                password='$password'
                WHERE id='$tbl_user_id' 
            ";
            $update_query_run = mysqli_query($con, $update_query);
            if ($update_query_run){
                redirect("../index.php?id=$tbl_user_id", "Account Updated Successfully!");
                
            }else{
                redirect("../index.php?id=$tbl_user_id", "Something Went Wrong!");
            }
        }
    // UPDATE ACCOUNT BY USER FUNCTIONS

    else{
        header('Location: ../index.php');
    }
?>