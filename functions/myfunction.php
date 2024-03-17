<?php 
    session_start();
    include('../config/dbcon.php');

    // ADMIN SIDE FUNC 
        function getByID($tbl_users, $id){
            global $con;
            $q = "SELECT * FROM $tbl_users WHERE id='$id' ";
            return $q = mysqli_query($con, $q);
        }

        function getAll($tbl_users){
            global $con;
            $q = "SELECT * FROM $tbl_users";
           return $q = mysqli_query($con, $q);
        }

        function getAllBlog($tbl_users){
            global $con;
            $q = "SELECT * FROM $tbl_users";
           return $q = mysqli_query($con, $q);
        }
        
        function getAllBlogId($tbl_blog, $id){
            global $con;
            $q = "SELECT * FROM $tbl_blog WHERE id='$id' ";
           return $q = mysqli_query($con, $q);
        }

        function getAllFeedback($tbl_feedback){
            global $con;
            $q = "SELECT * FROM $tbl_feedback";
           return $q = mysqli_query($con, $q);
        }

        // function getAllAppointments() {
        //     global $con;
        //     $query = "SELECT A.id, U.name, U.phone, U.email, A.appointment_date, A.dentist, A.service, A.status
        //             FROM tbl_appointments AS A
        //             JOIN tbl_users AS U ON A.user_id = U.id";
        //     $result = mysqli_query($con, $query);
        //     return $result;
        // }
    // END ADMIN SIDE FUNC 

    // MESSAGE NOTI FUNC 
        function redirect($url, $message){
            $_SESSION['message'] =  $message;
            header('Location:' .$url);
            exit();
        }
    // END MESSAGE NOTI FUNC 
?>