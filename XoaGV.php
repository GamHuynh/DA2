<?php
//   header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdoan2";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Không thể kết nối CSDL");
$conn->set_charset('utf8');

if(isset($_GET['Xoa'])){
      $Ma = $_GET['Xoa'];
        $conn ->query("DELETE FROM `giangvien` WHERE MaGV = '$Ma'");   
        echo"<script> location.replace('TaiKhoanGV.php')</script>";
}
?>