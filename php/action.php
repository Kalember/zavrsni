<?php
///dodavanje azila
$link = new mysqli('localhost', 'root','', 'dogdb');

if ($link->connect_error) { // konektovan ?
    die("Connection failed: " . $link->connect_error);}
//varijable
$naziv = mysqli_real_escape_string($link, $_POST['naziv']);
$mesto = mysqli_real_escape_string($link, $_POST['mesto']);
$adresa = mysqli_real_escape_string($link, $_POST['adresa']);
$telefon = mysqli_real_escape_string($link, $_POST['telefon']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$opis = mysqli_real_escape_string($link, $_POST['opis']);
$slika = mysqli_real_escape_string($link, $_FILES["image"]["name"]);
$path= "php/azili/".$slika;

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['name'];
    $file_type=$_FILES['image']['type'];
    $tmp = explode('.', $_FILES['image']['name']);
    $file_ext = end($tmp);
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="Podržani formati slike su JPEG, JPG i PNG";
    }
    //velicina fajl
    if($file_size > 2097152){
       $errors[]='Dozvoljena veličina je 2MB';
    }
    //putanja
    $uploads_dir = "azili/";
    if (file_exists($uploads_dir . $_FILES["image"]["name"])) {
        echo $_FILES["image"]["name"] . " Datoteka pod tim imenom vec postoji";
        echo '<br><a href="http://localhost/zavrsniprojekat/admin.php"><button class="btn btn-primary text-dark">Povratak na pocetnu</button></a>';}
    if(empty($errors)==true){
       move_uploaded_file($_FILES["image"]["tmp_name"], $uploads_dir . $_FILES["image"]["name"]);
    }else{
       print_r($errors);
    }
 }
//
$sql = "INSERT INTO azili (naziv, mesto, adresa, telefon, email, opis, slika) VALUES ('$naziv', '$mesto','$adresa','$telefon', '$email','$opis','$path')";
if(mysqli_query($link, $sql)){
    echo "Uspesno ucitavanje fajla na server";
    echo '<br><a href="http://localhost/zavrsniprojekat/admin.php"><button class="btn btn-primary text-dark">Povratak na pocetnu</button></a>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>