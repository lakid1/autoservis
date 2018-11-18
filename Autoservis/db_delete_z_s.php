<?php
require "db_connect.php";

if ($_POST) {
    if (isset($_POST['servisak_id'])) {
        $id = $_POST['servisak_id'];
        $query = "DELETE FROM servisak WHERE servisak_id = $id";
    }else {
        $id = $_POST['typ_zasahu_id'];
        $query = "DELETE FROM typ_zasahu WHERE typ_zasahu_id = $id;";
    }

    if($conn->query($query) === true)
    {
        header("Location: nastaveni.html");
    }else{
        echo "Error: " . $conn->connect_error . "Query: " . $query;
    }
}

$conn->close();