<?php
class User{
 
    // konekcija
    private $conn;
    private $table_name = "users";
 
    // specifikacija user-a
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

// kreiranje novog usera
function create(){
    
    // ubacivanje
    $query = "INSERT INTO " . $this->table_name . "
            SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
                password = :password";
 
    $stmt = $this->conn->prepare($query);
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
 
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
    
    // bezbednost passworda, snima kao nisku od 60 karaktera
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);
 
    // izvrsavanje upita i provera
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
 
//*provera da li postoji korinsik sa meail adresom u bazi
function emailExists(){
    // provera da li postoji korisnik sa istim emajlom true-postji false - ne postoji
    $query = "SELECT id, firstname, lastname, password
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 0,1";
    $stmt = $this->conn->prepare( $query );
    $this->email=htmlspecialchars(strip_tags($this->email));
    $stmt->bindParam(1, $this->email);
    $stmt->execute();
    $num = $stmt->rowCount();
    // ako postoji
    if($num>0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //*dodale vrednosti
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->password = $row['password'];
 
        // korisnik postoji
        return true;
    }
 
    // korisnik ne postoji
    return false;
}

public function updatePassword($email, $password){
    //nadji korisnika po email-u

    //ako postoji izvrsi update sa novom sifrom
}
 
// update korisnikovih podataka ostalo da se zavrsi i prepravi mozda ovo i radi na kraju
public function update(){
 
    // ako se menja pass
    $password_set=!empty($this->password) ? ", password = :password" : "";
 
    // ako nije postavljen pass ne menjaj pass
    $query = "UPDATE " . $this->table_name . "
            SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email
                {$password_set}
            WHERE id = :id";
 
    // priprema pozor...
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // povezivanje a formom
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
 
    // hash the password 
    if(!empty($this->password)){
        $this->password=htmlspecialchars(strip_tags($this->password));
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
    }
 
    // editovanje po ID koji treba da je jedinstven u bazi, ako nije zas*** si
    $stmt->bindParam(':id', $this->id);
 
    // izvrsi
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
}