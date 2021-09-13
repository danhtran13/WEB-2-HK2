<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title>register</title>
</head>

<body>
<div class="container">
<div class="row justify-content-center" style="margin-top: 40px;">
  <form action="saveRegister.php" method="POST">
  <h4>Register</h4>
    <div class="form-group">
      <label for="id">Your's Fullname</label>
      <input type="text" class="form-control" name="fname" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pswd" required>
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" name="address" required>
    </div>
    <div class="form-group">
      <label for="pwd">City:</label>
      <input type="text" class="form-control" name="city" required>
    </div>
    <button type="submit" name="submit" class="btn btn-info">Register</button>
  </form>
</div>
</div>
</body>
</html>