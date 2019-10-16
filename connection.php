<?php
$con= mysqli_connect("localhost","root","12345678","book") or die("Error: " . mysqli_error($con));

mysqli_query($con, "SET NAMES 'utf8' ");
 
?>