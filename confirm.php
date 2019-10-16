<?php
	session_start();
    include("connect.inc");  
?>
<?php
include("connection.php");
$s1 = "select * from user ";
$re = mysqli_query($con, $s1);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
<title>Checkout</title>
</head>
<body>
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
					<br></br>
<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
    </tr>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where p_id=$p_id";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['p_price']*$qty;
		$total	+= $sum;
    echo "<tr>";
    echo "<td>" . $row["p_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['p_price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>
</table>
<p>    
<table border="0" cellspacing="0" align="center">
<tr>
	<td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
</tr>
<tr>
    <td bgcolor="#EEEEEE">ชื่อ</td>
    <td><input name="name" type="text" id="name" required/></td>
</tr>
<tr>
    <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
    <td width="78%">
    <textarea name="address" cols="35" rows="5" id="address" required></textarea>
    </td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">อีเมล</td>
  	<td><input name="email" type="email" id="email"  required/></td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
  	<td><input name="phone" type="text" id="phone" required /></td>
</tr>
<tr>
	<td colspan="2" align="center" bgcolor="#CCCCCC">
	<input type="submit" name="Submit2" value="สั่งซื้อ" />
</td>
</tr>
</table>
</form>
</div>
    <!-- /.row -->

  </div>
</body>
</html>