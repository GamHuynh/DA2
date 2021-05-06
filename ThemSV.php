<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbdoan2";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Không thể kết nối CSDL");
    $conn->set_charset('utf8');
    
    require('Classes/PHPExcel.php');

    if(isset($_POST['btngui'])){

        $file = $_FILES['file']['tmp_name'];
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
        $objReader->setLoadSheetsOnly('HTTT0118');

        $objExcel = $objReader->load($file);
        $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
        $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
        for($row = 2; $row<=$highestRow;$row++){
            $mssv = $sheetData[$row]['A'];
            $ten = $sheetData[$row]['B'];
            $ngaysinh = $sheetData[$row]['C'];
            $lop = $sheetData[$row]['D'];
            $sdt = $sheetData[$row]['E'];
            $gioitinh = $sheetData[$row]['F'];
            $trangthai = $sheetData[$row]['G'];
            $khoa = $sheetData[$row]['H'];
            $nganh = $sheetData[$row]['I'];

            $sql = "INSERT INTO sinhvien(MSSV, HoVaTen, NgaySinh, Lop, SDT, GioiTinh, TrangThai, Khoa, Nganh) VALUES ('$mssv', '$ten', $ngaysinh, '$lop', $sdt, $gioitinh, $trangthai, '$khoa', '$nganh')";
            $conn->query($sql);
            // echo"<script> location.replace('DanhSachSV.php')</script>";
        }
            echo 'Thêm thành công';
    }

?>