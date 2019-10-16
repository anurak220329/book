 <?php
                   
                    include("connect.inc");
  $sql = "select * from product order by p_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  
						?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bookie Shop</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  
<link href="css/heroic-features.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/icons/logo.png" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
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
		<a class="nav-link" href="login.php">ล๊อกอิน/สมัครสมาชิก</a>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <img class="d-block img-fluid" src="images/head.jpg">
      
    </header>
	<h1>ร้านหนังสือออนไลน์ ที่มีหนังสือกว่า 100,000 เล่ม </h1>
<h5>ร้านหนังสือออนไลน์ 24 ชั่วโมงหนังสือมือสอง หนังสือหายาก มีหนังสือแนะนำ พร้อมระบบสั่งซื้อแสนง่าย คิดค่าจัดส่งตามจริง เรามีหนังสือหลากหลายประเภทร้านหนังสือออนไลน์การ์ตูน นิยาย นิตยสาร ตามหาหนังสือเล่มโปรดของคุณได้ง่ายๆ แค่ค้นหาหนังสือที่คุณต้องการในช่องด้านบนหรือสอบถามผ่าน LINE @bookie เรายินดีให้บริการลูกค้าทุกท่านค่ะ</h5>
    <br></br>
	<h1>หนังสือแนะนำ</h1>
	<br></br>

    <!-- Page Features -->
    <div class="row">
         <?php
                   
                    while($row = mysqli_fetch_array($result))
					{
						?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top"  src="images/<?php echo $row["p_pic"] ; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $row["p_name"]; ?></a>
                </h4>
                <h5><?php echo number_format($row["p_price"],2); ?></h5>
                
              </div>
              <div class="card-footer">
                 <td align='center'><a href='login.php'>รายละเอียดสินค้า</a></td>
                                    
                
              </div>
            </div>
          </div>

         
         
<?php
                    }
                    ?>
          

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white"></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
