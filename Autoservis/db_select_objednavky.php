<?php
require "db_connect.php";

$query = "SELECT servisni_objednavka_id,datum, CONCAT(jmeno,' ', prijmeni) AS provozovatel,CONCAT(znacka,' ', model)AS auto,
stav FROM servisni_objednavka INNER JOIN provozovatel USING(provozovatel_id)
INNER JOIN auto USING(auto_id) WHERE datum <= LOCALTIME() ORDER BY datum DESC ";

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
            "datum": "Empty Table",
            "provozovatel": "Empty Table",
            "auto": "Empty Table",
            "stav": "Empty Table"
         }
    ]}';
}
echo $output;