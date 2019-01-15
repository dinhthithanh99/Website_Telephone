<?php

session_start();

unset($_SESSION["admin"]);

unset($_SESSION["adminname"]);

header("location:index.php");
?>