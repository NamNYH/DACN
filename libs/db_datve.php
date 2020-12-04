
<?php

 	include ("libs/db_connect.php"); 
	if (isset($_POST['datve'])) {
	 
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $sdt = $_POST['phone'];
	  $Soluong =$_POST['soluong'];
	  $Giave =$_POST['ve'];
	  $Loaive = $_POST['loaive'];
	  $Thanhtien = $_POST['thanhtien'];
	  $Nganhang =$_POST['nganhang'];

	  if($con -> query("INSERT INTO datve(name,email,sdt,Soluong,Giave,Loaive,Thanhtien,Nganhang)
	        VALUES ('$name', '$email','$sdt','$Soluong','$Giave','$Loaive','$Thanhtien',$Nganhang')")){
	          echo "<script>
	          alert('Đặt vé thành công !');</script>";
	        }else {
	          echo "<script>
	          alert('Đặt vé thất bại !');</script>";
	        }
	      }
	     
	      $con->close();
    


?> 