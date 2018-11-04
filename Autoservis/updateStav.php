<?php
require "db_connect.php";
if ($_POST) {
    $servisni_objednavka_id = $_POST['servisni_objednavka_id'];

    $query = "UPDATE servisni_objednavka SET stav = 'storno' WHERE servisni_objednavka_id = $servisni_objednavka_id;";

    if ($conn->query($query) === true) {
        header("Location: dashboard.html");
    } else {
        echo "Error: " . $query . "<br>" . $conn->connect_error;
    }

}
