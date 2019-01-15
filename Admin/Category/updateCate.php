<?php
include('connect.php');

$id          = $_POST['ca_id'];
$ten          = $_POST['c_name'];
$des       = $_POST['c_des'];



//Code xử lý, update dữ liệu vào table dựa theo điều kiện WHERE tại id = 1
$sql = "UPDATE categories SET ca_name='$ten',description ='$des' WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
    //Nếu kết quả kết nối thành công, trở về trang view.
    header('Location: /Website_Telephone/admin/Category/listCate.php');
} else {
    //Nếu kết quả kết nối không được thì trở về update.php đồng thời gán giá trị error=1, dựa theo giá trị này trang update.php có thể thông báo lỗi cần thiết.
     header('Location: /Website_Telephone/admin/Category/editFormCate.php?error=1');
		// echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;

}

// Close connection
$mysqli->close();
?>


