<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="4.css">
</head>
<body>
     <div class="wrapper fadeInDown">
  <div id="formContent">
    <h2 class="active"> Sign In </h2>
   

    
    <div class="fadeIn first">
 
    </div>

    
    <form action="login1.php" method="POST">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <input type="text" id="login" name="uname" class="fadeIn second"  placeholder="login">
      <input type="password" id="password" name="password" class="fadeIn third"  placeholder="password">
      <input type="submit" name="ver" class="fadeIn fourth" value="Log In">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

     </body>
</html>
