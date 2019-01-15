<?php
include('connect.php');

// Prepare an insert statement
$sql = "INSERT INTO `categories` (ca_name,description) VALUES (?, ?)";

mysqli_set_charset($mysqli, 'UTF8');

if($stmt = $mysqli->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ss", $c_name, $c_des);
    

    /* Set the parameters values and execute
    the statement to insert a row */
    $c_name = $_POST['ca_name'];
    $c_des = $_POST['ca_des'];
    $stmt->execute();
    
    header('Location:/Website_Telephone/Admin/category/addFormCate.php');

} else{
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
    echo '<a href="/Website_Telephone/Admin/category/addFormCate.php">Trở về trang trước</a>';
}


// Close statement
$stmt->close();

// Close connection
$mysqli->close();
?>
