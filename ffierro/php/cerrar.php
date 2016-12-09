<?php 
mysqli_close();
session_destroy();
header("location: ../index.php");
?>