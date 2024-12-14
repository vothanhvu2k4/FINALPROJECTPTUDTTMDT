<?php 
if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE email ='".$email."' AND matkhau='".$matkhau."' LIMIT 1"; 
        $row =mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
            if($count>0){
                    $row_data =mysqli_fetch_array($row);
                    $_SESSION['dangky']= $row_data['tenkhachhang'];
                    header("Location:index.php?quanly=giohang");
            }else{
                echo '<script>alert("SAI TÀI KHOẢN HOẶC MẬT KHẨU, VUI LÒNG KIỂM TRA LẠI!");</script>';
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
    <link rel="stylesheet" href="style/dangnhapstyle.css">
</head>
<div class="container"style="margin-top: 80px;">
<form action="" autcocomplete="off" method ="POST">
<table border="1" >
        <tr>
            <td colspan="2" style="color:red">Đăng nhập tài khoản WEaR</td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type ="text" name ="email" placeholder="Email....."></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type ="password" name ="password" placeholder="Mật khẩu...."></td>
        </tr>
        <tr>
            <td colspan="2"><input type ="submit" name ="dangnhap" value ="Đăng nhập"></td>
        </tr>
    </table>
</form>
</div>
