<?php 
    require 'libs/db_connect.php';
    if (isset($_POST['datve'])) {
   
      $name = $_POST['name'];
      $email = $_POST['email'];
      $sdt = $_POST['phone'];
      $Soluong =$_POST['soluong'];
      $Giave =$_POST['ve'];
      $Loaive = $_POST['loaive'];
      $Thanhtien = $_POST['thanhtien'];
      $Nganhang =$_POST['nganhang'];

    if($con->query("INSERT INTO datve(name,email,sdt,Soluong,Giave,Loaive,Thanhtien,Nganhang) VALUES ('$name', '$email','$sdt','$Soluong','$Giave','$Loaive','$Thanhtien',$Nganhang')")){
            echo "<script>
            alert('Đặt vé thành công !');</script>";
          }else {
            echo "<script>
            alert('Đặt vé thất bại !');</script>";
          }
        }
       $con->close();
        
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/*-...........................................Mua vé ....................................................-*/
.nam {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
#Thanhtoan,#Thanhtien,#datve {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#Thanhtoan:hover {
  background-color: #45a049;
}

.buy_ticket {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
/* tiêu đề bảng */
.ex {
  background-color: #7FFFD4;
}
</style>
</head>
<body>
 

<!--  Mua Vé -->
    <div id="BuyTicket" class="tabcontent">
     <div id="clock"></div>
            <h3 style="text-align: center;">Quý khách vui lòng cho biết thông tin</h3>
            <div class="buy_ticket">
              <form action="" method="POST">
                <label for="name">Họ Tên</label>
                <input type="name"  name="name" placeholder="Nhập tên của bạn" class="nam">

                <label for="email">Email</label>
                <input type="email"  name="email" placeholder="Email của bạn : xyz@gmail.com" class="nam">
                <label for="sđt">SĐT</label>
                <input type="sđt" name="phone" placeholder="Số điện thoại của bạn" class="nam">
                <label for="Soluong">Số Lượng</label>
                <input type="number" name="soluong" id="number" min="0" class="nam"><br />
			        	<label for="Giave">Giá vé</label>
                <input type="text" id="dongia" name="ve" class="nam" value="5000" readonly ><br />
      
                <label for="Loaive">Loại vé</label>
                <input type="Loaive"  name="loaive"  class="nam" value="Ve Ngay"><br />
                <label for="thanhtien">Tong tien</label>
                <input type="text"  name="thanhtien" id="tien"  class="nam" value="" readonly><br />
                <label for="Nganhang">Chọn ngân hàng</label>
                <div class="form-group">
               
                        <select name="nganhang" id="nganhang" class="nam">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                </div>
                          
                <button type="submit" id="datve" name="datve" class="ripple-container">Đặt vé</button>
                <button id="Thanhtien" type='button' onclick="myFunction()">Thành tiền</button>
              </form>
            </div>
    </div>
    <!-- End mua vé -->
    
    <script>
	function myFunction() {
    	
        document.getElementById("tien").value = document.getElementById("number").value * document.getElementById("dongia").value;
    }
 </script>

</body>
</html>  
