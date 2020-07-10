<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
    crossorigin="anonymous">
</head>

<body>
  <div class="login">
    <div class="login-form wrapper fadeInDown">
      <div id="formContentLogin">
        <div class="form-title">
          <h2 class="active"> Đăng nhập </h2>
        </div>
        <div class="fadeIn first">
        </div>
		
        <form action="login.php" method="post">
        
		<input type="text" id="username" class="fadeIn second" name="username" placeholder="Tài khoản">
          <input type="text" id="password" class="fadeIn third pass" name="password" placeholder="Mật khẩu" autocomplete="off">
          <input type="submit" name="submit" class="fadeIn fourth" value="Đăng nhập">
		  
		  
		
		</form>
        <form action = "user.php" name="form" method="post">
				<input type="hidden" name="username" value="<?php $_POST['username'] ?>">
		</form>
		
		<?php
      session_start();
      $connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
      if(isset($_POST['submit'])){
        if($_POST['username']== 'admin' and $_POST['password']=='admin'){
          echo '<script>alert("successful");</script>';
          header('Location: http://localhost/new1/UserLogin.php');
        }
        $query = "SELECT * FROM user ";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
            if($row['name']==$_POST['username']   and  $row['password']==$_POST['password'] ){
            header('Location: http://localhost/new1/user.php');	
            }
            else{
              echo '<script>alert("nhập sai rồi cha. nhập lại dùm con. :))))");</script>';
            }
          }
        }
      }
		?>
        <div id="formFooter">
          <a class="underlineHover" name="forget" href="" onclick="alert('gọi điện thoại tới thằng chủ dùm minh. OK?');">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>

</html>