<?php
require "db_connect.php";

$query = "SELECT firma, CONCAT(jmeno,' ', prijmeni) AS
provozovatel,telefon,email,ulice,cislo_popisne,mesto,psc
FROM provozovatel INNER JOIN adresa USING(adresa_id)
WHERE provozovatel_id != 1
ORDER BY provozovatel_id DESC;";

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
            "firma": "Empty Table",
            "provozovatel": "Empty Table",
            "telefon": "Empty Table",
            "email": "Empty Table",
            "ulice": "Empty Table",
            "cislo_popisne": "Empty Table",
            "mesto": "Empty Table",
            "psc": "Empty Table",
        }
    ]}';
}
echo $output;
$conn->close();
