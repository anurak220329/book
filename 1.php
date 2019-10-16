<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="Web2/css/login.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="2.php" >
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="Web2/css/pic/bg-01.jpg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    
      <input type="text" id="txtUsername" class="fadeIn second" name="txtUsername" placeholder="Username">
      <input type="text" id="txtPassword" class="fadeIn third" name="txtPassword" placeholder="password">
      <input type="submit" name="Submit" class="fadeIn fourth" value="Log In">
    

    <!-- Remind Passowrd -->
    <div id="formFooter">
     <input type="submit" name="Register" value="Register" formaction="register.php">
</form>

    </div>

  </div>
</div>
  
</body>
</html>