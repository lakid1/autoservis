<?php
require "db_connect.php";

$quarry = "SELECT firma,jmeno + ' ' + prijmeni,telefon,email,ulice,cislo_popisne,mesto,psc FROM provozovatel INNER JOIN adresa USING(adresa_id)";
?>