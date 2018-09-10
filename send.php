<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'autoservis';

$db_spojeni = mysqli_connect($host, $user, $password, $database);
if ($db_spojeni) {
    mysqli_query($db_spojeni, "SET NAMES 'utf8'");

} else {
    echo 'Připojení se nezdařilo';
    mysqli_connect_error();
    exit();
}

$jmeno = $_POST['jmeno'];
$prijmeni = $_POST['prijmeni'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];

$query = "INSERT INTO ZAKAZNIK (jmeno,prijmeni,telefon,email) VALUES('$jmeno','$prijmeni','$telefon','$email')";
mysqli_query($db_spojeni,$query);
header("Location: index.html");
?>