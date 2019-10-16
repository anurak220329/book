<?php
	session_start();
	
	$p_id = $_REQUEST['p_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
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
<title>Shopping Cart</title>
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
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("connect.inc");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from product where p_id=$p_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["p_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="product.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
 </div>
    <!-- /.row -->

  </div>
  <!-- /
</body>
</html>