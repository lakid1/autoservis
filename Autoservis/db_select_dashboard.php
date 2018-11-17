<?php
require "db_connect.php";

$query = "SELECT servisni_objednavka_id, CONCAT(jmeno,' ', prijmeni) AS provozovatel,CONCAT(znacka,' ', model)AS auto,
datum, telefon, stav 
FROM servisni_objednavka INNER JOIN provozovatel USING(provozovatel_id) INNER JOIN auto USING(auto_id)
WHERE datum < ADDDATE(LOCALTIME(), INTERVAL 10 DAY) AND stav LIKE 'přijato'
ORDER BY datum";

$result = $conn->query($query);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $data[] = $row;

}

header("Content-Type: application/json");
if (empty($data) != true) {

    $output = '{"data":' . json_encode($data) . '}';

} else {
    $output = '{"data": [
        {

            "provozovatel": "Empty Table",
            "auto": "Empty Table",
            "datum": "Empty Table",
            "telefon":"Empty Table",
            "stav": "Empty Table"
         }
    ]}';
}
echo $output;
$conn->close();