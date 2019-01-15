<?php
include('connect.php');

$id          = $_POST['p_id'];
$ten          = $_POST['p_name'];
$gia          = $_POST['p_price'];
$date          = $_POST['p_date'];
$sl         = $_POST['p_quan'];
$cate = $_POST['p_cate'];
$status     = $_POST['p_status'];
$img = $_POST["link"];

if (!is_dir('uploads')) {
        mkdir('uploads');
    }
    if (isset($_FILES['fileUpload'])) {
       if ($_FILES['fileUpload']['error'] > 0)
           echo "Upload lỗi rồi!";
       else {
           move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' . $_FILES['fileUpload']['name']);
           
       }
if (empty($_FILES['fileUpload']['name'])) {
	$p_img = $img;
}else {
	move_uploaded_file($_FILES['fileUpload']['tmp_name'], '/Website_Telephone/Admin/Product/uploads/' . $_FILES['fileUpload']['name']);
	$p_img = "/Website_Telephone/Admin/Product/uploads/".$_FILES['fileUpload']['name'];
}}



//Code xử lý, update dữ liệu vào table dựa theo điều kiện WHERE tại id = 1
$sql = "UPDATE products SET p_name='$ten', price='$gia',dates = '$date', quantity='$sl',cate_id = '$cate',img = '$p_img',status='$status' WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
    //Nếu kết quả kết nối thành công, trở về trang view.
	header('Location: /Website_Telephone/Admin/Product/listProd.php');
} else {
    //Nếu kết quả kết nối không được thì trở về update.php đồng thời gán giá trị error=1, dựa theo giá trị này trang update.php có thể thông báo lỗi cần thiết.
	header('Location: /website_Telephone/Admin/Product/editFormProd.php?error=1');
}

// Close connection
$mysqli->close();
?>
