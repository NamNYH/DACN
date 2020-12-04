 
<!DOCTYPE html>
<html>
<head>
<title> DANH SÁCH KHÁCH HÀNG ĐẶT VÉ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php require_once ("libs/db_connect.php"); ?>
<?php

    $result = $con ->query("SELECT * FROM datve");
 ?>

<center>
<h1>DANH SÁCH KHÁCH HÀNG ĐẶT VÉ</h1></center>
<div class ="container-fluid">

<table class="table table-bordered table-hover">
<tr>
    <th scope="col"> Id</th>
    <th scope="col"> Name</th>
    <th scope="col"> Email</th>
    <th scope="col"> sdt</th>
    <th scope="col"> Số lượng vé</th>
    <th scope="col"> Giá vé</th>
    <th scope="col"> Loại vé</th>
    <th scope="col"> Tong tien</th>
    <th scope="col"> Ngân hàng</th>
    <th scope="col"> Xóa</th>
</tr>
<tbody>
<?php 


while ($row = mysqli_fetch_assoc($result)):?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['sdt']; ?></td>
    <td><?php echo $row['Soluong']; ?></td>
    <td><?php echo $row['Giave']; ?></td>
    <td><?php echo $row['Loaive']; ?></td> 
    <td><?php echo $row['Thanhtien']; ?></td>
    <td><?php echo $row['Nganhang']; ?></td>
    <td> <a href="libs/db_connect.php?id=<?php echo $row['id']; ?>">Xóa</a> </td>
    
    </tr>
   
<?php endwhile; ?>
</tbody>
</html>

