<?php 
if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['matkhau']);
        $diachi = $_POST['diachi'];
        $sql_dangky=mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo '<script>alert("BẠN ĐÃ TẠO TÀI KHOẢN THÀNH CÔNG");</script>';
            $_SESSION['dangky']=$tenkhachhang;
            $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);
            header('Location:index.php?quanly=giohang');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="style/dangkystyles.css">
</head>
<div class="container">
    <div style="margin-top: 80px;"></div> 
    <h2 style="text-align:center; font-family: Arial, sans-serif;">Đăng ký thành viên</h2>
    <style>
        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        td input:focus {
            outline-color: #4CAF50;
        }
        a{
            font-weight: bold;
        }
    </style>
<form action "" method="POST"> 
    <table>
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" size="50" name="hovaten" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" size="50" name="email" required></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="tel" size="50" name="dienthoai" required pattern="\d{10}" title="Số điện thoại phải có 10 chữ số"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="50" name="diachi" required></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" size="50" name="matkhau" required></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangky" value= "Tạo tài khoản"></td>
            <td><a href="index.php?quanly=dangnhap">Đăng nhập nếu đã có tài khoản</a></td>
        </tr>
    </table>
</div>
</form> 
