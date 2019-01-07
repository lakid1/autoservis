<?php
if ($_POST) {

    require "db_connect.php";
    session_start();
    $auto_id = $_POST['auto_id'];
    $provozovatel_id = $_SESSION['id'];
    $date = $_POST['date'];
    $query = "INSERT INTO servisni_objednavka() VALUES(null,'$date','přijato',null,$provozovatel_id,$auto_id)";

    if ($conn->query($query) === true) {
        header("Location: userDashboard.php");
    } else {
        echo "error: " . $conn->connection_error;
    }
    $conn->close();

}
