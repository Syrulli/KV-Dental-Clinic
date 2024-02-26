<?php
    session_start();
    include('../config/dbcon.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_SESSION['auth_user']['user_id'])) {
            $user_id = $_SESSION['auth_user']['user_id'];
            $appointment_date = $_POST['appointment_date'];
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

            $appointment = $con->prepare("INSERT INTO tbl_appointments (user_id, appointment_date, service, price) VALUES (?, ?, ?, ?)");
            $appointment->bind_param("issd", $user_id, $appointment_date, $service, $price);

            if ($appointment->execute()) {
                echo json_encode(array("success" => true, "message" => "Appointment scheduled successfully!"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error scheduling appointment: " . $con->error));
            }

            $appointment->close(); // Close the prepared statement

            if (isset($existing_appointment_query)) {
                $existing_appointment_query->close();
            }

            $con->close();
        } else {
            echo json_encode(array("success" => false, "message" => "User not logged in"));
        }
    }
    function getPriceForService($service)
    {
        switch ($service) {
            case 'cleaning':
                return '4000.00';
            case 'deep_scaling':
                return '5000.00';
            case 'tooth_filling':
                return '5100.00';
            case 'fluoride_treatment':
                return '8060.00';
            case 'pit_fissure_sealant':
                return '4925.00';
            case 'braces':
                return '6000.00';
            case 'oral_surgery':
                return '50000.00';
            case 'cosmetic_dentistry':
                return '4805.00';
            case 'endodontics':
                return '8620.00';
            case 'pediatric_dentistry':
                return '5660.00';
            case 'dentures':
                return '6081.00';
            case 'crown_bridges':
                return '6990.00';
            case 'vaneers_laminates':
                return '80.00';
            case 'dental_implants':
                return '5200.00';
            default:
                return '';
        }
    }
?>