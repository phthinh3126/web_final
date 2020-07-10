3<?php
  $connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");						
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$id = $_POST['id'];
		$connect = mysqli_connect("localhost", "root", "MyNewPass", "testing", "3306");
		$sql = "delete from products where id='$id'";
		if ($connect->query($sql) === TRUE) {
		  echo "deleted";
		} else {
			echo "";
		}
	}
?>

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
          <h2 class="active"> Xóa sản phẩm </h2>
        </div>
        <div class="fadeIn first">
        </div>
        <form action="del_product.php" method="post">
          <input type="text" id="id" class="fadeIn second" name="id" placeholder="mã sản phẩm">
          
		  <input type="text" id="name" class="fadeIn second" name="name" placeholder="tên sản phẩm">
          
          <input type="submit" name="submit" class="fadeIn fourth" value="Xóa nhe!!!">
        </form>
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