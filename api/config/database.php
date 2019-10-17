<?php
// konekcija ka bazi kreiraj klasu DATABaSE 
class Database{
 
    private $host = "localhost";
    private $db_name = "dogdb";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // konekcija
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Nema konekcije: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>