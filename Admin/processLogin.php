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
function login($username,$password){
global $mysqli;
$email = mysqli_real_escape_string($mysqli, $username);
$sql4 = "SELECT * FROM admin where username = '$username' and password = '$password';";
$run_query = $mysqli->query($sql4);
if (mysqli_num_rows($run_query) > 0) {
$row = mysqli_fetch_array($run_query);
$_SESSION["admin"] = $row["id"];
$_SESSION["adminname"] = $row["username"];
echo '<meta http-equiv="refresh" content="15;url=/website_telephone/admin/admin.php">';
}else{
echo 'Tài khoản hoặc mật khẩu sai!'.$mysqli-> error;
}
}
}
?>