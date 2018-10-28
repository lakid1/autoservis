<?php
require 'db_connect.php';

$query = "SELECT CONCAT(jmeno,' ',prijmeni) AS provozovatel,spz,znacka,model,rok_vyroby,motor
FROM auto INNER JOIN provozovatel USING(provozovatel_id) WHERE auto_id NOT LIKE 1 ";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

if (json_encode($data) != null) {
    $output = '{"data":' . json_encode($data) . '}';
} else {
    $output = '{"data": [
        {
            "provozovatel": "Empty Table",
            "spz": "Empty Table",
            "znacka": "Empty Table",
            "model": "Empty Table",
            "rok_vyroby": "Empty Table",
            "motor": "Empty Table",

        }
    ]}';
}

echo $output;
