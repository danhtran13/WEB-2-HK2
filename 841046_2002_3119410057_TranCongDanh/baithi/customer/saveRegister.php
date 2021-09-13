<?php
      include ('../connection.php');
      if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $password = $_POST['pswd'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $link = connect();
        $sql = "INSERT INTO customers (Password, Fullname, Address, City) VALUES ('$password', '$fname', '$address', '$city')";
        $result = $link->query($sql);
        $link->close();
        echo "Đăng kí thành công. <a href='javascript: history.go(-1)'>Trở lại</a>";
      }
?>