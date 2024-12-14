<?php
include('../../config/config.php');

$tenbaiviet = $_POST['tenbaiviet'];

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;

$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];

// Thêm bài viết
if (isset($_POST['thembaiviet'])) {
    $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,hinhanh,id_danhmuc,tinhtrang) VALUE('".$tenbaiviet."','".$tomtat."','".$noidung."','".$hinhanh."','".$danhmuc."','".$tinhtrang."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}

// Sửa bài viết
elseif (isset($_POST['suabaiviet'])) {
    // Lấy hình ảnh cũ
    $sql = "SELECT * FROM tbl_baiviet WHERE id_bv = '$_GET[idbaiviet]' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    $hinhanh_cu = $row['hinhanh'];

    if (!empty($_FILES['hinhanh']['name'])) {
        // Xóa hình ảnh cũ
        unlink('uploads/'.$hinhanh_cu);
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        $sql_update = "UPDATE tbl_baiviet SET tenbaiviet ='".$tenbaiviet."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',id_danhmuc='".$danhmuc."',tinhtrang='".$tinhtrang."' WHERE id_bv='$_GET[idbaiviet]'";
    } else {
        $sql_update = "UPDATE tbl_baiviet SET tenbaiviet ='".$tenbaiviet."',tomtat='".$tomtat."',noidung='".$noidung."',id_danhmuc='".$danhmuc."',tinhtrang='".$tinhtrang."' WHERE id_bv='$_GET[idbaiviet]'";
    }
    
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}

// Xóa bài viết
else {
    $id = $_GET['idbaiviet'];
    $sql = "SELECT * FROM tbl_baiviet WHERE id_bv = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_baiviet WHERE id_bv ='".$id."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}
?>