<?php
session_start();
$id= $_GET['id'];
if($id != "") {
if(isset($_SESSION['giohang'][$id])){
$_SESSION['giohang'][$id]++;}
else {
$_SESSION['giohang'][$id] = 1; 
}}else{} 
if(isset($_SESSION['uid']))
header('Location: profile.php');
else
header('Location: index.php');

?>
