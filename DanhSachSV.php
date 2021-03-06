<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdoan2";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Không thể kết nối CSDL");
$conn->set_charset('utf8');
?>

<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!--ajax nút tìm kiếm-->

    <!--Nút tìm kiếm-->
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
</head>
<body id="page-top">

    <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Admin.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>
        <!-- Menu thông tin -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Thông tin</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tài khoản:</h6>
                    <a class="collapse-item" href="TaiKhoanGV.php">Tài khoản giảng viên</a>
                    <a class="collapse-item" href="TaiKhoanSV.html">Tài khoản sinh viên</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Quản lý thông tin:</h6>
                    <a class="collapse-item" href="DanhSachSV.html" >Danh sách sinh viên</a>
                    
                </div>
                
            </div>
        </li>
        <!-- Phân môn học -->
        <li class="nav-item">
            <a class="nav-link" href="PhanMon.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Phân môn học</span></a>
        </li>
        <!-- Danh sách yêu cầu-->
        <li class="nav-item">
        <a class="nav-link" href="DanhSachYeuCau.html">
        <i class="fas fa-fw fa-list"></i>
        <span>Danh sách yêu cầu</span></a>
        </li>
        <!-- Thống kê học lực -->
        <li class="nav-item">
            <a class="nav-link" href="ThongKe.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Thống kê học lực</span>                
            </a>
        </li>
        <!-- Dải phân cách -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Thu gọn SideBar -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input id="myInput" type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button  style="margin-right: 20px;" class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        
                            <!-- <button onclick= "location.href='./ThemGV.html'" style="margin-right: -50PX;">Thêm Giảng Viên</button> -->
                            
                          
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Thông báo -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Biểu tượng thông báo -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Danh sách thông báo -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Thông báo
                            </h6>
                            <!-- Nội dung thông báo -->
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Tin nhắn -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Biểu tượng số thông báo -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Danh sách tin nhắn -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Tin nhắn
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                        alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                        alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                        alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                        alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Thông tin giao diện người dùng -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Xin chào Admin</span>
                            <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Thông tin
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cài đặt
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng xuất
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn đăng xuất ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hãy chọn "Đăng xuất" nếu như bạn đã sẵn sàng để thoát khỏi trang này.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-primary" href="TaiKhoanGV.html">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
    <h4 class="m-0 font-weight-bold text-primary">Danh sách sinh viên</h4>

    <!-- Bảng thông tin giảng viên -->
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style = "text-align: center;">
        <tr>
                <th>STT</th>
                <th>Mã số sinh viên</th>
                <th>Họ và Tên</th>
                <th>Lớp</th>          
            </tr>
            <!-- Truy vấn bảng giảng viên -->
                <?php
                 $STT = 1;
                 $sql = "SELECT MSSV,HoVaTen, Lop FROM sinhvien";
                 $query = mysqli_query($conn,$sql);
                //  Bắt đầu vòng lặp
                while($row = $query -> fetch_assoc()): ?>
                <tr>
                    <td> <?php echo $STT++;?> </td>
                    <td><?php echo $row['MSSV']; ?></td>
                    <td><?php echo $row['HoVaTen']; ?></td>
                    <td><?php echo $row['Lop']; ?></td>
                    <!-- <td> 
                      <a href='chitietGV.html' class='btn btn-primary btn-sm' > <i class='fas fa-folder'> </i> Chi tiết </a>
                      <a class='btn btn-info btn-sm' href='#'> <i class='fas fa-pencil-alt'> </i> Sửa </a>
                      <a class='btn btn-danger btn-sm' href='XoaGV.php?Xoa=<?php echo $row['MaGV'] ?>'> <i class='fas fa-trash'> </i>Xóa </a>
                      <input type = "button"  class="btn btn-danger btn-sm " onclick="XacNhan(<?php // echo $row['MaGV']; ?>)" name = delete value="Xóa"> -->
                    <!-- </td>  -->
                </tr>
                <!-- Hiển thị thông báo xác nhận -->
                <!-- <script language = "javascript">
                      function XacNhan(delid)
                      {
                          if(confirm("Bạn có muốn xóa người này ?")){
                              window.location.href = 'XoaGV.php?Xoa ='+delid+'';
                              
                          }
                      }
                </script> -->
                 <?php endwhile?>
    
    </table>
    <!-- <a href="./ThemGV.html"><input type="button" value="Thêm Giảng Viên"  style="margin-left: 500px;"/></a> -->
        </div>
        

         <!-- Khu cần hiển thị nội dung -->
         <!-- NÚT THÊM GIẢNG VIÊN -->
                 <!-- <table style="margin-top: 300px;">
                 <a class="collapse-item"  style="padding-left: 550px;">Thêm Giảng viên</a>
            <form class="user" method="POST" action ="them_GV.php">
                <div class="form-group row">
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-user" id="maGV"
                            placeholder="Mã số" name="maso" style="margin-left: 100px;">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-user" id="Hoten"
                            placeholder="Họ và Tên" name="ten"style="margin-left: 100px" >
                    </div>
                </div>
                    <div>
                        <input type="submit" value="Thêm" name="them" style="margin-left: 600px;">
                    </div>
            
            </form>
            </div>       
                 </table>
          
    </div>
    </div> -->
    
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>