<?php
$username = "";
$password = "";
$servername = "localhost";
$database = "dbdoan2";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database) or die("Không thể kết nối CSDL");
   if(isset($_POST['btn-DN']))
   {
       if($_POST['username'] == null || $_POST['password'] == null)
       {
           echo "<script> alert ('Vui lòng hãy nhập tài khoản và mật khẩu của bạn') </script>";
       }
       else
       {
         $username = $_POST['username'];
         $password = $_POST['password'];
       }  
       if($username && $password)
       { 
         $sql = "SELECT * FROM taikhoan WHERE TenTaiKhoan = '".$username."' and MatKhau = '".$password."'";
         $query = mysqli_query($conn, $sql);
         if(mysqli_num_rows($query) == 0)
         {
          echo "<script> alert ('Tài khoản hoặc mật khẩu không chính xác. Vui lòng thử lại') </script>";
         }   
         else
         {
          header('Location: Admin.html');
         }
       }
   }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website hệ thống thông tin điểm</title>
    <link rel="stylesheet" type = "text/css" href="css/styleCSS.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">   
    <script>
      	  function myFunction() {
	  var x = document.getElementById("MK")
	  var y = document.getElementById("hide1");
	  var z = document.getElementById("hide2");

	if (x.type === "password")
    {
	    x.type = "text";
	    y.style.display = "block";
	    z.style.display = "none";

	   }
	   else{
	    x.type = "password";
	    y.style.display = "none";
	    z.style.display = "block";

   }
}
    </script>
</head>
<body>
 <form action = "index.php" method = "post">
    <div class="login">
        <img alt="Logo" src="https://png2.cleanpng.com/sh/14067a7ce21d73e4723716ad7bd46d5d/L0KzQYm4UcExN6lxjpH0aYP2gLBuTfNwdaF6jNd7LXnmf7B6Tfxwb5pzReVsYXzkcr3sTgZma6V0ip9wcnHzeLrqk71mdZJuRadrZUe2R4eCVPFla5Q2Rqg8M0O1RYK6UcU1OWk8UagAN0OzRoe1kP5o/kisspng-computer-icons-login-scalable-vector-graphics-emai-5be737694adcc1.6333251315418796573066.png" 
                            height = "85px" width = "85px";> 
        <h1>Đăng nhập</h1>
        <div class="group">
        	<input type="text" name = "username" placeholder="Mã truy cập"><i class="fa fa-user"></i>
        </div>
        <div class="group">
        	<input id="MK" type="password" name = "password" placeholder="Mật khẩu">
        	<span class="eye" onclick=" myFunction()">
        		<i id="hide1" class="fa fa-eye"></i>
        		<i id="hide2" class="fa fa-eye-slash"></i>       		
        	</span>
        	</a>
        </div>
        <input type = "submit" name = "btn-DN" Value = "Đăng nhập"/>
    </div>
 </form>
</body>
</html>
