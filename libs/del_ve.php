<?php 
	include ("libs/db_connect.php"); 
	if(isset($_GET['xoa'])){
		$id = $_GET['xoa'];
		$sql -> query("DELETE FROM datve WHERE id=$id");
		 if (mysqli_query($con, $sql)) {
	       
	         echo "alert('Xóa vé thành cong')";
    		 header("Location : http://localhost/busbooking/datve_view.php");     
    } else {
        echo "Lỗi xóa vé " . mysqli_error($sql);
    }
    mysqli_close($con);        
	}
?>

