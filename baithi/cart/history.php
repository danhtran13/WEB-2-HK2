<?php
    include('../connection.php');
    $link = connect();
    $sql = "SELECT * FROM `order` WHERE 1";
    $detail = mysqli_query($link,$sql);
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
                        <td>Date</td>
                        <td>Total</td>
                        <td>Detail</td>
                    </tr>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($detail)) {
                    ?>
                        <tr>
                            <form action="detail.php" method="POST">
                            <td><?= $i++?></td>
                            <td><?= $row['Date'] ?></td>
                            <td><?= $row['Total'] ?></td>
                            <td><input type="submit" class="btn btn-info" value="Detail" name="detail"></td>
                            <input type="hidden" value="<?= $row['OrderID'] ?>" name="id">
                            </form>
                        </tr>
                    <?php } ?>
                </table>
          
        </div>

    </div>
</body>

</html>