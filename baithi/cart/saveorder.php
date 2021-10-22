<?php
    session_start();
    include('../connection.php');
    $link = connect();
    if (isset($_POST['order'])) {
        if (isset($_SESSION['Fullname'])) {
            $idname = $_SESSION['idname'];
            $order_id = rand(0,9999);
            $total = $_POST['total'];
            $today = date("Y/m/d");
            $insert_order = "INSERT INTO `order`(`OrderID`, `CustomerID`, `Date`, `Total`) VALUES ('$order_id','$idname','$today','$total')";
            $result = $link->query($insert_order);
            if ($result) {
                foreach($_SESSION['cart'] as $key => $value){
                    $vegetableid = $value['id'];
                    $quantity = $value['amount'];
                    $price = $value['price'];
                    $insert_orderdetail = "insert into orderdetail(OrderID,VegetableID,Quantity,Price) value('$order_id','$vegetableid','$quantity','$price')";
                    $ketqua = $link->query($insert_orderdetail);
                }
            }
            unset($_SESSION['cart']);
            echo "Đặt hàng thành công. <a href='../vegetable/index.php'>Quay lại</a>";
        }
        else {
            echo "Vui lòng đăng nhập để đặt hàng. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
    }
?>