<?php 
    include('config/dbcon.php');
    // USER SIDE FUNC 
        function getByAccId(){
            global $con;
            $userId = $_SESSION['auth_user']['user_id'];
            $q = "SELECT * FROM tbl_users WHERE id= '$userId' ";
            return $q = mysqli_query($con, $q);
        }
        function getAllBlogActive($tbl_blog){
            global $con;
            $q = "SELECT * FROM $tbl_blog";
            return $q = mysqli_query($con, $q);
        }

        function getAppointmentById(){
            global $con;
            $userId = $_SESSION['auth_user']['user_id'];
            $q = "SELECT * FROM tbl_appointments WHERE user_id = '$userId'";
            return mysqli_query($con, $q);
        }

        function editAppointmentByUser(){
            global $con;
            $userId = $_SESSION['auth_user']['user_id'];
            $q = "SELECT * FROM tbl_appointments WHERE user_id = '$userId'";
            return mysqli_query($con, $q);
        }
        
    // END USER SIDE FUNC 
    
    // connected sa auth
    function redirect($url, $message){
        $_SESSION['message'] =  $message;
        header('Location:' .$url);
        exit();
    }
?>