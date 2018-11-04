<?php
require "db_connect.php";

if ($_POST) {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $datum = $_POST['datum'];
    $provozovatel_id = $_POST['provozovatel'];
    $auto_id = $_POST['auto'];

    // if(strlen(strstr($datum, '-', true)) != 4){
    // $rok = strstr($datum, '-', true);
    // $datum = strtr($datum,5) . "-" . $rok;
    //echo $rok;
    //$datum = strtr($datum,'-','');
    //echo($datum);
    // echo $datum;
    //}

    $query = "INSERT INTO servisni_objednavka() VALUES(null,'$datum','přijato',$provozovatel_id,$auto_id);";

    if ($conn->query($query) === true) {
        header("Location: dashboard.html");
    } else {
        echo "Error: " . $query . "<br>" . $conn->connect_error;
    }

}
