<?php
  session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title>login</title>
</head>

<body>
<div class="container">
<div class="row justify-content-center" style="margin-top: 40px;">
  <form action="checklogin.php" method="POST">
  <h4>Login</h4>
    <div class="form-group">
      <label for="id">Your's ID</label>
      <input type="number" class="form-control" name="id" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pswd" required>
    </div>
    <button type="submit" name="submit" class="btn btn-info">Login</button>
    <a href="register.php" class="btn btn-info">Register</a>
    <?php
      if (isset($_SESSION['stk'])){
        echo('Không tìm thấy tài khoản');
        unset($_SESSION['stk']);
      }
      if (isset($_SESSION['smk'])){
        echo('Nhập sai password');
        unset($_SESSION['smk']);
      }
    ?>
  </form>
</div>
</div>
</body>
</html>