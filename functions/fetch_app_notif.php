<?php
    include('../config/dbcon.php');
    
    function countUpcomingAppointments($daysAhead) {
        global $con;
        $nextDay = date('Y-m-d', strtotime('+' . $daysAhead . ' days'));
        $query = "SELECT COUNT(*) as count FROM tbl_appointments WHERE appointment_date >= '$nextDay'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }

    $upcomingAppointmentsCount = countUpcomingAppointments(1);
    echo $upcomingAppointmentsCount;
?>
