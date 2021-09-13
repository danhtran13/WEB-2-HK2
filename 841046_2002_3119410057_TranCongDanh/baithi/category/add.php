<?php
    include('../connection.php');
    $link = connect();
    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $sql = "INSERT INTO category (Name, Description) VALUES ('$name', '$description')";
        $result = $link->query($sql);
        echo "Thêm thành công. <a href='javascript: history.go(-1)'>Trở lại</a>";
        $link->close();
    }
?>