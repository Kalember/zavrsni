<?php
include ('php/connect.php');

$query = "SELECT * FROM azili ORDER BY id DESC";
$result = mysqli_query($connection, $query) or die("SQL Error 1: " . mysqli_error($connection));
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $azili[] = array(
        'naziv' => $row['naziv'],
        'mesto' => $row['mesto'],
        'adresa' => $row['adresa'],
        'telefon' => $row['telefon'],
        'email' => $row['email'],
        'slika' => $row['slika'],
        'opis' => $row['opis']

      );
}
 
echo json_encode($azili);
?>
