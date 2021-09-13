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
        <h1>Cart</h1>
        <?php
            include('../connection.php');
            session_start();
            $link = connect();
            $id = !empty($_POST['id']) ? (Int)$_POST['id'] : 0;
            $quantity = 1;
            $action = !empty($_POST['buy']) ? (int)$_POST['buy'] : 'add';
            $query = $link->query("select * from vegetable where VegetableID='$id'");
            $pro = $query->fetch_object();
            if ($pro && $action == 'add') {
                if (isset($_SESSION['cart'][$id])) {
                    if (($_SESSION['cart'][$id]['checksoluong']-1)<$_SESSION['cart'][$id]['amount']) {
                        echo'Vượt quá số lượng kho';
                    }
                    else{
                        $_SESSION['cart'][$id]['amount'] += $quantity;
                    }
                }
                else {
                    $item = [
                        "id"=>$pro->VegetableID,
                        "name"=>$pro->VegetableName,
                        "picture"=>$pro->Image,
                        "amount"=>$quantity,
                        "price"=>$pro->Price,
                        "checksoluong"=>$pro->Amount
                    ];
                    $_SESSION['cart'][$id] = $item;

                }
            }
        ?>

        <form id="cart-form" action="../cart/saveorder.php" method="POST">
            <table class="table">
                <tr>
                    <th class="product-number">#</th>
                    <th class="product-name">Name</th>
                    <th class="product-img">Picture</th>
                    <th class="product-quantity">Amount</th>
                    <th class="product-price">Price</th>
                </tr>
    
                <?php
                $num = 1;
                $quantity1 = 0;
                $total = 0;
                $product = !empty($_SESSION['cart']) ? $_SESSION['cart'] :[];
                foreach($product as $row) : ?>
                    <tr>
                        <td class="product-number"><?= $num++?></td>
                        <td class="product-name"><?= $row['name']?></td>
                        <td class="product-img"><img src="../<?= $row['picture']?>" style="width: 50px;"></td>
                        <td class="product-quantity"><?= $row['amount']?></td>
                        <td class="product-price"><?= $row['price']?></td>
                    </tr>
                    <?php 
                    $quantity1 += $row['amount'];
                    $total += $row['amount']*$row['price'];
                    endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?= $quantity1?></td>
                        <td><?= $total?></td>
                        <input type="hidden" name="total" value="<?= $total?>">
                    </tr>
            </table>
            <input type="submit" class="btn btn-danger" value="Order" name="order">
            </form>
</body>

</html>