<?php
require 'db_connect.php';

$query = "SELECT servisak_id, CONCAT(jmeno,' ',prijmeni) AS servisak FROM servisak;";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
header("Content-Type: application/json");
if (empty($data) != true) {
    $output = '{"data":' . json_encode($data) . '}';
} else {
    $output = '{"data": [
        {
            "servisak": "Empty Table",

        }
    ]}';
}

echo $output;
$conn->close();
