<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unique Password Generator or Unique id hash</title>
    <style>
        body {
            background: #5f9ea0;
            text-align: center;
        }
    </style>
</head>
<body>
<h2>Unique Password Generator or Unique id hash</h2>
<?php
include('includes/dbcon.php');

$string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$code = "";
$limit = 10;
$i = 0;
while ($i <= $limit) {
    $rand = rand(0, 61);
    $code .= $string[$rand];
    $count = strlen($code);
    $i++;
}
echo 'Unique Password Generator = <span style="color: #fff">' . $code . ' (' . $count . ')' . '</span>';
echo '<br>';
echo '<br>';
?>

<table border="1" width="100%">
    <tr>
        <th>Id</th>
        <th>Password</th>
        <th>Length</th>
    </tr>
    <?php
    mysqli_query($con, "INSERT INTO password_generator(code) VALUES('$code')") or die(mysqli_error($con));
    $result = mysqli_query($con, "SELECT * FROM password_generator");
    //$result = mysqli_query($con, "SELECT * FROM reservation");
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['code']; ?></td>
            <td><?= strlen($row['code']); ?></td>
        </tr>
    <?php }  ?>
</table>


</body>
</html>
