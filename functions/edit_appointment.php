<?php
    include('../config/dbcon.php');
    if (isset($_POST['update_appointment_by_user_btn'])) {
        $appointment_id = $_POST['update_appointment_by_user_btn'];
        $appointment_date = $_POST['appointment_date'];
        $service = $_POST['service'];
        $price = $_POST['price'];

        $update_query = "UPDATE tbl_appointments SET 
            appointment_date='$appointment_date', 
            service='$service', 
            price='$price'
            WHERE id='$appointment_id' 
        ";
        $update_query_run = mysqli_query($con, $update_query);
        if ($update_query_run) {
            header("Location: ../appointment.php?id=$appointment_id");
            exit; 
        } else {
            echo "Something went wrong with the update.";
        }
    }
    else {
        header('Location: appointment.php');
        exit;
    }
?>
