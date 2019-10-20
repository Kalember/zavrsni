<?php
$conn = new mysqli('localhost', 'root', '', 'dogdb');
$email=$_POST['email'];

//ubaci validaciju za email!

//ako validacija maila prodje, proveri da li email vec postoji u bazi

$sql="INSERT INTO `newsletter` (`email`) VALUES ('$email')";
if ($conn->query($sql) === TRUE) {
    echo "data inserted";
}
else 
{
    echo "failed";
}