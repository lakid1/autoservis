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
    $data[] = $row;
}
json_encode($data);
if (json_encode($data) != null) {
    header("Content-Type: application/json");
    $output = '{"data":' . json_encode($data) . '}';

} else {
    $output = '{"data": [
        {
            "provozovatel_id": "0",
            "jmeno": "Empty Table",
            "prijmeni": "Empty Table",
            "telefon": "Empty Table",
            "email": "Empty Table"
        }
    ]}';
}
echo $output;
   
    
} else {
    echo 'Připojení se nezdařilo';
    mysqli_connect_error();
    exit();
}



?>