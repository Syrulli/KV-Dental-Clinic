<?php
include('../config/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$appointment_date = mysqli_real_escape_string($con, $_POST['appointment_date']);
  $dentist = mysqli_real_escape_string($con, $_POST['dentist']);
  $hmo = mysqli_real_escape_string($con, $_POST['hmo']);
  $service = mysqli_real_escape_string($con, $_POST['service']);
  $price = getPriceForService($service);
  $hmo = mysqli_real_escape_string($con, $_POST['hmo']);
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $mname = mysqli_real_escape_string($con, $_POST['mname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $dob = mysqli_real_escape_string($con, $_POST['dob']);

  $appointment = $con->prepare("INSERT INTO tbl_appointments (appointment_date, dentist, hmo, service, price, fname, mname, lname, email, phone, address, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $appointment->bind_param("ssssssssssss", $appointment_date, $dentist, $hmo, $service, $price, $fname, $mname, $lname, $email, $phone, $address, $dob);

  if ($appointment->execute()) {
    echo json_encode(array("success" => true, "message" => "Appointment scheduled successfully!"));
  } else {
    echo json_encode(array("success" => false, "message" => "Error scheduling appointment: " . $con->error));
  }
  $appointment->close();
  $con->close();
  exit;
}

function getPriceForService($service)
{
  switch ($service) {
    case 'Cleaning & polishing':
      return '4000.00 to 5000.00';
    case 'Deep scaling':
      return '5000.00 to 6000.00';
    case 'Tooth filling':
      return '5100.00 to 5000.00';
    case 'Fluoride treatment':
      return '8060.00 to 5000.00';
    case 'Pit & fissure sealant':
      return '4925.00 to 5000.00';
    case 'Orthodontic braces':
      return '6000.00 to 5000.00';
    case 'Oral Surgery':
      return '50000.00 to 5000.00';
    case 'Cosmetic Dentistry':
      return '4805.00 to 5000.00';
    case 'Endodontics':
      return '8620.00  to 5000.00';
    case 'Pediatric Dentistry':
      return '5660.00 to 5000.00';
    case 'Dentures':
      return '6081.00 to 5000.00';
    case 'Crowns & bridges':
      return '6990.00 to 5000.00';
    case 'Veneers/Laminates':
      return '80.00';
    case 'Dental Implants':
      return '5200.00 to 5000.00';
    default:
      return '';
  }
}
