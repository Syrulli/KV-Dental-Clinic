<?php
  session_start();
  include('../config/dbcon.php');
  include('userfunction.php');

  if (isset($_POST['update_appointment_by_user_btn'])) {
    $appointment_id = $_POST['update_appointment_by_user_btn'];
    $appointment_date = $_POST['appointment_date'];
    $dentist = $_POST['dentist'];
    $service = $_POST['service'];
    $price = getPriceForService($service);

    $update_query = "UPDATE tbl_appointments SET 
      appointment_date='$appointment_date', 
      dentist='$dentist', 
      service='$service', 
      price='$price'
      WHERE id='$appointment_id' 
    ";
    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run) {
      redirect("../appointment_history.php?id=$appointment_id", "Appointment schedule updated successfully!");
    } else {
      echo "Something went wrong with the update.";
    }
  }
  function getPriceForService($service){
    switch ($service) {
      case 'Cleaning & polishing':
        return '4000.00';
      case 'Deep scaling':
        return '5000.00';
      case 'Tooth filling':
        return '5100.00';
      case 'Fluoride treatment':
        return '8060.00';
      case 'Pit & fissure sealant':
        return '4925.00';
      case 'Orthodontic braces':
        return '6000.00';
      case 'Oral Surgery':
        return '50000.00';
      case 'Cosmetic Dentistry':
        return '4805.00';
      case 'Endodontics':
        return '8620.00';
      case 'Pediatric Dentistry':
        return '5660.00';
      case 'Dentures':
        return '6081.00';
      case 'Crowns & bridges':
        return '6990.00';
      case 'Veneers/Laminates':
        return '80.00';
      case 'Dental Implants':
        return '5200.00';
      default:
        return '';
    }
  }
?>
