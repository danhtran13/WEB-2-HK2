<?php
    include('../connection.php');
    $link = connect();
    $sql = "select * from category";
    $category = mysqli_query($link, $sql);
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
        <div class="row">
            <div class="col-md-4" style="margin-top: 30px;">
                <form action="add.php" method="POST">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" style="width: 200px;" required>
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" style="width: 200px;" required>
                    <br>
                    <input type="submit" class="btn btn-info" value="Add" name="add">
                </form>
            </div>
            <div class="col-md-6">
                <h4>Category</h4>
                <table class="table table-responsive table-trips">
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Description</td>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($category)) {
                    ?>
                        <tr>
                            <td><?= $row['CategoryID'] ?></td>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Description'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
</body>

</html>