<?php 
    $severname="localhost";
    $username="root";
    $password="";
    $database="busbooking";
    $con = mysqli_connect('localhost','root','','busbooking');
    if(!$con){
    	echo("Kết nối không thành công");
    }else {
        echo("Kết nối thành công");
    }


 ?>
 