<?php
session_start();
include('../config/dbcon.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_SESSION['auth_user']['user_id'])) {
    $user_id = $_SESSION['auth_user']['user_id'];
    $appointment_date = $_POST['appointment_date'];
    $dentist = $_POST['dentist'];
    $service = $_POST['service'];
    $price = getPriceForService($service);

    $existing_appointment_query = $con->prepare("SELECT * FROM tbl_appointments WHERE user_id = ?");
    $existing_appointment_query->bind_param("i", $user_id);
    $existing_appointment_query->execute();
    $existing_appointment_result = $existing_appointment_query->get_result();

    if ($existing_appointment_result->num_rows > 0) {
      echo json_encode(array("success" => false, "message" => "You already have a scheduled appointment."));
      exit;
    }

    $appointment = $con->prepare("INSERT INTO tbl_appointments (user_id, appointment_date, dentist, service, price) VALUES (?, ?, ?, ?, ?)");
    $appointment->bind_param("isssd", $user_id, $appointment_date, $dentist, $service, $price);

    if ($appointment->execute()) {
      echo json_encode(array("success" => true, "message" => "Appointment scheduled successfully!"));
    } else {
      echo json_encode(array("success" => false, "message" => "Error scheduling appointment: " . $con->error));
    }

    $appointment->close();

    if (isset($existing_appointment_query)) {
      $existing_appointment_query->close();
    }
    $con->close();
  } else {
    echo json_encode(array("success" => false, "message" => "User not logged in"));
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