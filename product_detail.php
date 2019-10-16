<?php
include("connection.php");
$s1 = "select * from user ";
$re = mysqli_query($con, $s1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<title>Product Detail</title>
<!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
</head>

<body>


  



  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Bookie Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">หน้าหลัก
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">เกี่ยวกับเว็ปเรา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">บริการ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ติดต่อ</a>
          </li>
        </ul>
		<?php
                   
                    while($ro = mysqli_fetch_array($re))
					{
						?>
	
		<a class="nav-link" href="">สวัสดีคุณ&nbsp;:&nbsp;<?php echo $ro["Firstname"];?></a> 
      </div>
    </div>
	<a href="index.php">Logout</a>
  </nav>
  <?php
					}
					?>
<table width="600" border="0" align="center" class="square">
  <tr><td colspan="3" bgcolor="#CCCCCC"><b>Product</b></td></tr>
  <br></br>
<?php
//connect db
    include("connect.inc");
	$p_id = $_GET['p_id']; //สร้างตัวแปร p_id เพื่อรับค่า
	
	$sql = "select * from product where p_id=$p_id";  //รับค่าตัวแปร p_id ที่ส่งมา
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	//แสดงรายละเอียด
	echo "<tr>";
  	echo "<td width='85' valign='top'><b>Title</b></td>";
    echo "<td width='279'>" . $row["p_name"] . "</td>";
    echo "<td width='70' rowspan='4'><img src='images/" . $row["p_pic"] . " ' width='100'></td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Detail</b></td>";
    echo "<td>" . $row["p_detail"] . "</td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'><b>Price</b></td>";
    echo "<td>" .number_format($row["p_price"],2) . "</td>";
  	echo "</tr>"; 
  	echo "<tr>";
    echo "<td colspan='2' align='center'>";
    echo "<a href='cart.php?p_id=$row[p_id]&act=add'> เพิ่มลงตะกร้าสินค้า </a></td>";
    echo "</tr>";
?>
</table>

<p><center><a href="home.php">กลับไปหน้ารายการสินค้า</a></center>
 </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</body>

</html>
