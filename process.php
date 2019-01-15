<?php
include('connect.php');
session_start();


/**
* 
*/
class User
{
protected $fullname;  
protected $email;  
protected $username;  
protected $password;  
protected $phone;  
protected $adrress; 

function __construct()
{}

function insertUser($fullname,$email,$username,$password,$phone,$address){
global $mysqli;
$this->fullname = $fullname;
$this->email = $email;
$this->username = $username;
$this->password = $password;
$this->phone = $phone;
$this->address = $address;

$sql = "INSERT INTO `user` (fullname,email,user_name,password,phone,address) VALUES (?, ?, ?,?,?,?)";
if($stmt = $mysqli->prepare($sql)){
$stmt->bind_param("ssssss",$this->fullname,$this->email,$this->username,$this->password,$this->phone,$this->address);

$stmt->execute();
}else {
echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
}}

function login($username,$password){
global $mysqli;
$email = mysqli_real_escape_string($mysqli, $username);
$sql4 = "SELECT * FROM user where user_name = '$username' and password = '$password';";
$run_query = $mysqli->query($sql4);
if (mysqli_num_rows($run_query) > 0) {
$row = mysqli_fetch_array($run_query);

$_SESSION["uid"] = $row["id"];
$_SESSION["name"] = $row["user_name"];
echo '<meta http-equiv="refresh" content="1;url=profile.php">';
}else{
echo 'Tài khoản hoặc mật khẩu sai!'.$mysqli-> error;
}
}
}
?>