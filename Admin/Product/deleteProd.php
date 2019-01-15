<?php 
require_once('connect.php'); 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql     = "DELETE FROM products WHERE id='$id'";

	if ($mysqli->query($sql) === TRUE) {
    //Nếu kết quả kết nối thành công, trở về trang list product.
		header('Location: /Website_Telephone/Admin/Product/listProd.php');
	} else { echo "Không được".$mysqli-> error ;}
}

// Close connection
	$mysqli->close();
	?>
