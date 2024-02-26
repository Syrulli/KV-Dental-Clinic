<?php
    include('../config/dbcon.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // FUNC NG USER VALIDATION 
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
            http_response_code(400); // Bad Request
            echo "All fields are required!";
            exit;
        }
        // FUNC NG USER INP 
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
    
        // BINDING NG PARAMS
        $feedback = $con->prepare("INSERT INTO tbl_feedback (name, email, message) 
                               VALUES (?, ?, ?)");
        $feedback->bind_param("sss", $name, $email, $message);
    
        $result = $feedback->execute();
    
        if ($result) {
            echo "Feedback submitted successfully!";
        } else {
            http_response_code(500); // Internal Server Error
            // echo "Error submitting Feedback: " . $con->error;
        }
        $feedback->close();
    }
?>