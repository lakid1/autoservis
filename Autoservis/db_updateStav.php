<?php
require "db_connect.php";
if ($_POST) {
    $servisni_objednavka_id = $_POST['servisni_objednavka_id'];
    $akce = $_POST['akce'];

    $query = "UPDATE servisni_objednavka SET stav = '$akce' WHERE servisni_objednavka_id = $servisni_objednavka_id;";

    if ($conn->query($query) === true) {
        if ($_POST['from'] == "dashboard") {
            header("Location: dashboard.html");
        }
        if ($_POST['from'] == "objednavky") {
            header("Location: objednavky.php");
        }
    } else {
        echo "Error: " . $query . "<br>" . $conn->connect_error;
    }

}