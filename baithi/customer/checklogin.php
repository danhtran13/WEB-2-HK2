<?php
if (isset($_POST['submit'])) {
    include '../connection.php';
    $id = $_POST['id'];
    $password = $_POST['pswd'];
    $link = connect();
    $sql = "SELECT CustomerID, Password, Fullname FROM customers WHERE CustomerID='$id'";
	$query = mysqli_query($link,$sql);
    if (mysqli_num_rows($query) == 0) {
        session_start();
        $_SESSION['stk'] = 1; 
        header('location:login.php');
        exit;
    }
    $row = mysqli_fetch_array($query);
    if ($password != $row['Password']) {
        session_start();
        $_SESSION['smk'] = 1;
        header('location:login.php');
        exit;
    }
    $idname = $row['CustomerID'];
    $username = $row['Fullname'];
    session_start();
    $_SESSION['Fullname'] = $username;
    $_SESSION['idname'] = $idname;
    header('location:../vegetable/index.php');
    die();
}
?>