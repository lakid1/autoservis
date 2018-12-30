<?php
require "db_connect.php";

if ($_POST) {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $datum = $_POST['datum'];
    $provozovatel_id = $_POST['provozovatel'];
    $auto_id = $_POST['auto'];

    

    $query = "INSERT INTO servisni_objednavka() VALUES(null,'$datum','přijato',null,$provozovatel_id,$auto_id);";

    if ($conn->query($query) === true) {
        header("Location: dashboard.html");
    } else {
        echo "Error: " . $query . "<br>" . $conn->connect_error;
    }

}
$conn->close();
