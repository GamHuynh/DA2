
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbdoan2") or die("Không thể kết nối CSDL");
$Sua = false;
$TenTaiKhoan='';
$MatKhau= '';
$VaiTro= '';

//  Nút thêm tài khoản sinh viên
if(isset($_POST['them'])){
    $TenTaiKhoan = $_POST['TenTaiKhoan'];
    $MatKhau = $_POST['MatKhau'];
    $VaiTro = $_POST['VaiTro'];

   
    if($TenTaiKhoan && $MatKhau && $VaiTro){
        $sql = "INSERT INTO `taikhoan`(`TenTaiKhoan`,`MatKhau`,`VaiTro`) VALUES ('$TenTaiKhoan','$MatKhau','$VaiTro')";
        $query1 = mysqli_query($conn,$sql);      
        
        echo"<script> location.replace('TaiKhoanSV.php')</script>";
    }
     
    else{
        echo "<script> alert (nhập lại)</script>";     
    }

}
// Nút sửa
if(isset($_GET['sua']))
{   
    $Sua = true;
   $TenTaiKhoan = $_GET['sua'];
   $result = $conn->query("SELECT * FROM taikhoan WHERE TenTaiKhoan='$TenTaiKhoan'");
   if(mysqli_num_rows($result)>0){
       
        $row = $result->fetch_array();
        $MatKhau = $row['MatKhau'];
        $VaiTro = $row['VaiTro'];

   }
}
if(isset($_POST['sua']))
{
        $TenTaiKhoan = $_POST['TenTaiKhoan'];
        $MatKhau = $_POST['MatKhau'];
        $VaiTro = $_POST['VaiTro'];

  
    $result = $conn->query("UPDATE taikhoan SET MatKhau = '$MatKhau', VaiTro = '$VaiTro' WHERE  TenTaiKhoan = '$TenTaiKhoan'") or die($conn->error);
$_SESSION ['message']= "Đã cập nhật thành công";

    echo"<script> location.replace('TaiKhoanSV.php')</script>";

}

?>