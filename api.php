<?php

$mysqli = new mysqli("localhost", "root", "", "php_gexton");

if ($mysqli->connect_error) {
    die('Connection Failed' . $mysqli->connect_error);
}
$result = mysqli_query($mysqli, "SELECT * from qr");


if (isset($_POST['generate'])) {
    $code = $_POST['text_code'];
    $text_code = $_POST['text_code'];

    $file = uniqid() . ".png";
    $query = "INSERT into qr(pname,qrImage) values ('$text_code','$code')";
    if ($mysqli->query($query) == true) {

        header("Location: http://localhost/qrcode_google/api.php");


        // echo "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$code&choe=UTF-8'>";
    } else {
        header('location:addQrCode.php?msg=data failed ');
    }
    QRcode::png($item, $file, $ecc, $pixel_size, $frame_size);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style>
    .center {
        margin: auto;
        width: 50%;
        border: 3px solid skyblue;
        padding: 10px;
    }
    .img11{
        width: 43px;
    }
</style>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <h1 class="center">Employee QR Code Data</h1>
        <div class="center">
        <table class="table table-bordered">
<?php
                if (mysqli_num_rows($result) > 0) {
                ?>
  <thead>
    <tr> 
        <th scope="col">Employee ID</th>
      <th scope="col">Employee QR</th>
      <th scope="col">Employee QR Image</th>
    </tr> 
</thead>
  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["pname"]; ?></td>
                            <td><?php echo $row["qrImage"]; ?></td>
                            <td><img class="img11"src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo $row["pname"] ?>"></td>


                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
            </table>
        <?php
                } else {
                    echo "No result found";
                }
        ?>


        </div>
    </div>

</body>

</html>

