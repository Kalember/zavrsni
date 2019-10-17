<?php 
$sql = new mysqli('localhost', 'root','', 'dogdb');

if ($sql->connect_error) { // konektovan ?
    die("Connection failed: " . $sql->connect_error);}

$email= mysqli_real_escape_string($sql, $_POST['email']);
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$msg = 'uspesna prijava';
if(isset($_POST['email'])){
    $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Neispravan format adrese";
}

}
$query= "INSERT INTO newsletter (email) VALUES ('$email')"; 
 
mysqli_query ($sql, $query) 
or die ("Error querying database"); 
 
echo '<script type="text/javascript">alert("' . $msg . '")</script>'; 
 
mysqli_close($sql);
