<?php
    include('../connection.php');
    $link = connect();
    if (isset($_POST['detail'])) {
        $orderid = $_POST['id'];
        $qty = 0;
        $total = 0;
        $sql = "select * from orderdetail, vegetable where orderdetail.VegetableID=vegetable.VegetableID and orderdetail.OrderID='$orderid' ";
        $detail = mysqli_query($link,$sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>History</h3>
                <table class="table">
                    <tr> 
                        <td>#</td>
                        <td>Name</td>
                        <td>Image</td>
                        <td>Amount</td>
                        <td>Price</td>
                    </tr>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($detail)) { ?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $row['VegetableName'] ?></td>
                            <td><img src="../<?= $row['Image'] ?>" style="width: 100px;"/></td>
                            <td><?= $row['Quantity'] ?></td>
                            <td><?= $row['Price'] ?></td>
                        </tr>
                    <?php $qty+=$row['Quantity'];$total+=$row['Quantity']*$row['Price']; } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td><?= $qty?></td>
                        <td><?= $total?></td>
                    </tr>
                </table>
          
        </div>

    </div>
</body>

</html>