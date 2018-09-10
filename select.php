<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'autoservis';

$db_spojeni = mysqli_connect($host, $user, $password, $database);
if ($db_spojeni) {
    mysqli_query($db_spojeni, "SET NAMES 'utf8'");

    $query = "SELECT * FROM zakaznik";

    $result = mysqli_query($db_spojeni, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<option value=" . '$row["jmeno"]' . ">" . $row['jmeno'] . "</option>";

    }

} else {
    echo 'Připojení se nezdařilo';
    mysqli_connect_error();
    exit();
}
