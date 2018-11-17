<?php
require 'db_connect.php';

$query = "SELECT * FROM typ_zasahu WHERE typ_zasahu_id != 1";

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
            "nazvev": "Empty Table",
            "cena": "Empty Table",
        }
    ]}';
}

echo $output;
$conn->close();
