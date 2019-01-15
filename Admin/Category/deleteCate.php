<?php 
require_once('connect.php'); 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql     = "DELETE FROM categories WHERE id='$id'";

	if ($mysqli->query($sql) === TRUE) {
    //Nếu kết quả kết nối thành công, trở về trang view.
		
		header('Location: /Website_Telephone/Admin/Category/listCate.php');
	}else { echo "Không được".$mysqli-> error ;}}

// Close connection
	$mysqli->close();
	?>
