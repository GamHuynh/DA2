
<?php
  header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdoan2";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Không thể kết nối CSDL");
$conn->set_charset('utf8');
if(isset($_POST['them'])){
    $Ma = $_POST['maso'];
    $Ten = $_POST['ten'];

    if($Ma && $Ten){
        $sql = "INSERT INTO `giangvien` (`MaGV`,`TenGV`) VALUES ('$Ma','$Ten')";
        $query1 = mysqli_query($conn,$sql);      
        
        echo"<script> location.replace('TaiKhoanGV.php')</script>";
    }
     
    else{
        echo ("nhập đầy đủ");     
    }

}
?>