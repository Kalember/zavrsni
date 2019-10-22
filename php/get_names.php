<?php
include ('connect.php');

$query = "SELECT * FROM dog_names where gender = 'm' ORDER BY rand() limit 1";
$result = mysqli_query($connection, $query) or die("SQL Error 1: " . mysqli_error($connection));
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $imena[] = array(
        'ime' => $row['names'],
        'pol' => $row['gender'],
        'slovo' => $row['fletter'],
        
      );
      $random_keys=array_rand($imena,1);
}
 
echo json_encode($imena);


?>
