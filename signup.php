<?php
  function reg(){							
    $connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
    if($_POST['password1'] == $_POST['password2']){
      $sql = "INSERT INTO user(name,password,address,phoneNumber)
              values('{$_POST['name']}','{$_POST['password1']}','{$_POST['register']}','{$_POST['sdt']}')";  
      if ($connect->query($sql) === TRUE) {
        echo "";
      } else {
        echo "trùng username";
      }
    }
    else{
      echo "mật khẩu k giống nhau";
    }
  }
  if(array_key_exists('reg',$_POST)){
    reg();	
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
</head>
<body>
  <div class="register">
    <div class="register-form wrapper fadeInDown">
        <div id="formContentRegister">
          <div class="form-title">
            <h2 class="active"> Đăng kí </h2>
          </div>
          <div class="fadeIn first">
          </div>
          <div class="fadeIn first">
          </div>
          <form class="form-input" action="signup.php" method="post">
       
			<div class="form-display">
              <input type="text" id="name" class="fadeIn second" name="name" placeholder="Tài khoản" maxLength="20">
              <input type="text" id="password" class="fadeIn third pass" name="password1" placeholder="Mật khẩu" autocomplete="off" maxLength="20">
            </div>
            <div class="form-display">
              <input type="text" id="password" class="fadeIn third" name="password2" placeholder="Nhập lại mật khẩu">
              <input type="text" id="address" class="fadeIn third" name="register" placeholder="Địa chỉ">
            </div>
            <div>
              <input type="text" id="sdt" class="fadeIn third" name="sdt" placeholder="Số điện thoại">
            </div>
			
            <div class="register-submit">
              <input type="submit" class="fadeIn fourth" name="reg" value="Đăng kí">
            </div>
			
          </form>
        </div>
      </div>
    </div>
</body>
</html>