<?php require_once('Connections/book.php'); ?>
<?php include("dw-upload.php"); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO product (p_name, p_detail, p_price, p_pic, c_id) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['prdName'], "text"),
                       GetSQLValueString($_POST['prdDetail'], "text"),
                       GetSQLValueString($_POST['prdPrice'], "double"),
                       GetSQLValueString(dwUpload($_FILES['img']), "text"),
                       GetSQLValueString($_POST['prdCid'], "text"));

  mysql_select_db($database_book, $book);
  $Result1 = mysql_query($insertSQL, $book) or die(mysql_error());

  $insertGoTo = "admin_page.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_book, $book);
$query_Recordset1 = "SELECT * FROM product";
$Recordset1 = mysql_query($query_Recordset1, $book) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
  <label for="prdName2">
    <div align="center">เพิ่มสินค้า<br />
      ชื่อสินค้า
        <input type="text" name="prdName" id="prdName2" />
    </div>
  </label>
  <div align="center"><br />
  </div>
  <label for="prdDetail">
    <div align="center">รายละเอียด
      <input type="text" name="prdDetail" id="prdDetail" />
    </div>
  </label>
  <div align="center"><br />
  </div>
  <label for="prdPrice2">
    <div align="center">ราคา
      <input type="text" name="prdPrice" id="prdPrice2" />
    </div>
  </label>
  <div align="center"><br />
  </div>
  <label for="img2">
    <div align="center">รูปภาพ
      <input type="file" name="img" id="img2" />
    </div>
  </label>
  <div align="center"><br />
  </div>
  <label for="prdCid">
    <div align="center">ปรพเภท
      <input type="text" name="prdCid" id="prdCid" />
    </div>
  </label>
  <div align="center">
    <input type="submit" name="prdSave" id="prdSave" value="Submit" />
    <br />
    <br />
  </div>
  <div align="center">
    <input type="hidden" name="MM_insert" value="form1" />
    <table border="1">
      <tr>
        <td>p_id</td>
        <td>p_name</td>
        <td>p_detail</td>
        <td>p_price</td>
        <td>p_pic</td>
        <td>c_id</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_Recordset1['p_id']; ?></td>
          <td><?php echo $row_Recordset1['p_name']; ?></td>
          <td><?php echo $row_Recordset1['p_detail']; ?></td>
          <td><?php echo $row_Recordset1['p_price']; ?></td>
          <td><img src="./images/<?php echo $row_Recordset1['p_pic']; ?>" width="100" /></td>
          <td><?php echo $row_Recordset1['c_id']; ?></td>
          <td><a href="update.php?p_id=<?php echo $row_Recordset1['p_id']; ?>">แก้ไข</a></td>
          <td><a href="delete.php?p_id=<?php echo $row_Recordset1['p_id']; ?>">ลบ</a></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
  </div>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
