<?php
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
	$Firstname = $_POST["Firstname"];
	$Lastname = $_POST["Lastname"];
	$Username = $_POST["Username"];
	$Password = $_POST["Password"];
	$Email = $_POST["Email"];
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO user( Firstname, Lastname, Username, Password, Email,Userlevel)
			 VALUES('$Firstname', '$Lastname', '$Username', '$Password', '$Email','M')";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Register Succesfuly');";
	echo "window.location = 'login.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to register again');";
	echo "</script>";
}
?>