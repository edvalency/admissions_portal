<?php

class DB{
    private $con;
    private $host = 'localhost';
    private $dbname= 'stud_admissions';
    private $user ='eddy';
    private $password='poster456';

    public function __construct(){
        $dbcon = "mysql:host=" . $this->host . ";dbname=". $this->dbname;

    try{
     $this->con = new PDO($dbcon, $this->user, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
        echo "Connection failed:" .$e->getMessage();
    }
    }

    public function viewData($email,$pass){
        $query="SELECT * FROM users WHERE email=:email and password=:pass";
        $cmd = $this->con->prepare($query);
        $cmd->execute([":email"=>$email, ":pass"=>$pass]);
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

     public function counter($email,$pass){
        $query = "SELECT * FROM users WHERE email=:email AND password =:pass";
        $cmd = $this->con->prepare($query);
        $cmd->execute([":email"=>$email, ":pass"=>$pass]);
        $data = $cmd->rowCount();
        return $data;
    }

    public function admcounter($user,$pass){
        $query = "SELECT * FROM admin WHERE username=:user AND password =:pass";
        $cmd = $this->con->prepare($query);
        $cmd->execute([":user"=>$user, ":pass"=>$pass]);
        $data = $cmd->rowCount();
        return $data;
    }

    public function Vouchcounter($serial,$pin){
        $query = "SELECT * FROM usedvouchers WHERE serial=:serial AND pin =:pin";
        $cmd = $this->con->prepare($query);
        $cmd->execute([":serial"=>$serial, ":pin"=>$pin]);
        $data = $cmd->rowCount();
        return $data;
    }

    public function Vouchdelete($serial, $pin){
        $query = "DELETE FROM vouchers WHERE serial='$serial' AND pin ='$pin'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();

    }

    public function vouchuseddelete($serial, $pin){
        $query = "DELETE FROM usedvouchers WHERE serial='$serial' AND pin ='$pin'";
        $cmd = $this->con->prepare($query);
        $cmd->execute();

    }

    public function insertvoucher($serial,$pin){
        $query= "INSERT INTO vouchers (serial,pin) VALUES (:login,:pin)";
        $cmd = $this->con->prepare($query);
        $cmd -> execute([":login"=>$serial, ":pin"=>$pin]);
        
    }

    public function insertData($fname, $dob,$gender, $program , $email, $password, $contact){
        $query= "INSERT INTO users (fullname, dob, gender, program, email, password, contact, enrolled) VALUES 
        ('$fname', '$dob', '$gender', '$program', '$email', '$password', '$contact', NULL)";
        $cmd = $this->con->prepare($query);
        $cmd -> execute();
        
    }

    public function viewAll(){
        $query = "SELECT * FROM users";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function vouchersend(){
        $query = "SELECT * FROM vouchers";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function vouchcount(){
        $query = "SELECT * FROM vouchers";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->rowCount();
        return $data;
    }

    public function usedvoucher($serial,$pin){
        $query ="INSERT INTO usedvouchers SELECT * FROM vouchers WHERE serial ='$serial' AND pin='$pin'";
        $cmd = $this->con->prepare($query);
        $cmd ->execute();
    }

    public function adminupdate($fullname, $program, $gender,$email,$dob,$contact){
        $query= "UPDATE users SET  program='$program', gender='$gender', email='$email', dob='$dob',contact='$contact' WHERE fullname='$fullname'";
        $cmd = $this->con->prepare($query);
        $cmd -> execute();
    }

    public function update($fullname, $program, $gender,$email,$dob,$contact,$password){
        $query= "UPDATE users SET program='$program', gender='$gender', email='$email', dob='$dob',contact='$contact', password='$password' WHERE fullname='$fullname'";
        $cmd = $this->con->prepare($query);
        $cmd -> execute();
    }

    public function review(){
        $query = "SELECT * FROM users WHERE enrolled IS NULL";
        $cmd = $this->con->prepare($query);
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function enrollstat($fname,$stat){
        $query= "UPDATE users SET  enrolled='$stat' WHERE fullname='$fname'";
        $cmd = $this->con->prepare($query);
        $cmd -> execute();
    }
}




?>