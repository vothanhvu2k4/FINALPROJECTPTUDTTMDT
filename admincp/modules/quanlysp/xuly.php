<?php
include('../../config/config.php');
$tensanpham = isset($_POST['tensanpham']) ? $_POST['tensanpham'] : null;
$masp = isset($_POST['masp']) ? $_POST['masp'] : null;
$giasp = isset($_POST['giasp']) ? $_POST['giasp'] : null;
$mausp = isset($_POST['mausp']) ? $_POST['mausp'] : null;
$sizesp = isset($_POST['sizesp']) ? $_POST['sizesp'] : null;
$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : null;
$noidung = isset($_POST['noidung']) ? $_POST['noidung'] : null;
$tomtat = isset($_POST['tomtat']) ? $_POST['tomtat'] : null;
$baoquan = isset($_POST['baoquan']) ? $_POST['baoquan'] : null;
$tinhtrang = isset($_POST['tinhtrang']) ? $_POST['tinhtrang'] : null;
$danhmuc = isset($_POST['danhmuc']) ? $_POST['danhmuc'] : null;
// Xử lý hình ảnh chính
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
if ($hinhanh != '') {
    $hinhanh = time().'_'.$hinhanh;
    move_uploaded_file($hinhanh_tmp, 'upload/'.$hinhanh);
} else {
    $hinhanh = null; // Hoặc gán giá trị mặc định nếu cần
}

// Xử lý hình ảnh nhỏ 1
$hinhanhnhomot = $_FILES['hinhanhnhomot']['name'];
$hinhanhnhomot_tmp = $_FILES['hinhanhnhomot']['tmp_name'];
if ($hinhanhnhomot != '') {
    $hinhanhnhomot = time().'_'.$hinhanhnhomot;
    move_uploaded_file($hinhanhnhomot_tmp, 'upload/'.$hinhanhnhomot);
} else {
    $hinhanhnhomot = null; // Hoặc gán giá trị mặc định
}
// Xử lý hình ảnh nhỏ 2
$hinhanhnhohai = $_FILES['hinhanhnhohai']['name'];
$hinhanhnhohai_tmp = $_FILES['hinhanhnhohai']['tmp_name'];
if ($hinhanhnhohai != '') {
    $hinhanhnhohai = time().'_'.$hinhanhnhohai;
    move_uploaded_file($hinhanhnhohai_tmp, 'upload/'.$hinhanhnhohai);
} else {
    $hinhanhnhohai = null; // Hoặc gán giá trị mặc định
}

// Xử lý hình ảnh nhỏ 3
$hinhanhnhoba = $_FILES['hinhanhnhoba']['name'];
$hinhanhnhoba_tmp = $_FILES['hinhanhnhoba']['tmp_name'];
if ($hinhanhnhoba != '') {
    $hinhanhnhoba = time().'_'.$hinhanhnhoba;
    move_uploaded_file($hinhanhnhoba_tmp, 'upload/'.$hinhanhnhoba);
} else {
    $hinhanhnhoba = null; // Hoặc gán giá trị mặc định
}
if(isset($_POST['themsanpham'])){
    //them san pham
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,mausp,sizesp,soluong,hinhanh,hinhanhnhomot,hinhanhnhohai,hinhanhnhoba,noidung,tomtat,baoquan,tinhtrang,id_danhmuc)
    VALUE('".$tensanpham."','".$masp."','".$giasp."','".$mausp."','".$sizesp."','".$soluong."','".$hinhanh."','".$hinhanhnhomot."','".$hinhanhnhohai."','".$hinhanhnhoba."','".$noidung."','".$tomtat."','".$baoquan."','".$tinhtrang."','".$danhmuc."')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp,'upload/'.$hinhanh);
    move_uploaded_file($hinhanhnhomot_tmp,'upload/'.$hinhanhnhomot);
    move_uploaded_file($hinhanhnhohai_tmp,'upload/'.$hinhanhnhohai);
    move_uploaded_file($hinhanhnhoba_tmp,'upload/'.$hinhanhnhoba);
    header('Location:../../index.php?action=quanlysp&query=them');
}elseif(isset($_POST['suasanpham'])) {
    // Sửa sản phẩm
    
    // Lấy thông tin sản phẩm cũ từ cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1"; 
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
             
    // Cập nhật ảnh chính nếu có ảnh mới
    if ($hinhanh != '') {
        // Xóa ảnh cũ nếu có
        if (!empty($row['hinhanh']) && file_exists('upload/' . $row['hinhanh'])) {
            unlink('upload/' . $row['hinhanh']);
        }
        // Lưu ảnh mới
        move_uploaded_file($hinhanh_tmp, 'upload/' . $hinhanh);
    } else {
        $hinhanh = $row['hinhanh']; // Giữ nguyên nếu không có ảnh mới
    }

    // Cập nhật ảnh nhó 1 (hinhanhnhomot) nếu có ảnh mới
    if ($hinhanhnhomot != '') {
        // Xóa ảnh cũ nếu có
        if (!empty($row['hinhanhnhomot']) && file_exists('upload/' . $row['hinhanhnhomot'])) {
            unlink('upload/' . $row['hinhanhnhomot']);
        }
        // Lưu ảnh mới
        move_uploaded_file($hinhanhnhomot_tmp, 'upload/' . $hinhanhnhomot);
    } else {
        $hinhanhnhomot = $row['hinhanhnhomot']; // Giữ nguyên nếu không có ảnh mới
    }

    // Cập nhật ảnh nhỏ 2 (hinhanhnhohai) nếu có ảnh mới
    if ($hinhanhnhohai != '') {
        // Xóa ảnh cũ nếu có
        if (!empty($row['hinhanhnhohai']) && file_exists('upload/' . $row['hinhanhnhohai'])) {
            unlink('upload/' . $row['hinhanhnhohai']);
        }
        // Lưu ảnh mới
        move_uploaded_file($hinhanhnhohai_tmp, 'upload/' . $hinhanhnhohai);
    } else {
        $hinhanhnhohai = $row['hinhanhnhohai']; // Giữ nguyên nếu không có ảnh mới
    }

    // Cập nhật ảnh nhỏ 3 (hinhanhnhoba) nếu có ảnh mới
    if ($hinhanhnhoba != '') {
        // Xóa ảnh cũ nếu có
        if (!empty($row['hinhanhnhoba']) && file_exists('upload/' . $row['hinhanhnhoba'])) {
            unlink('upload/' . $row['hinhanhnhoba']);
        }
        // Lưu ảnh mới
        move_uploaded_file($hinhanhnhoba_tmp, 'upload/' . $hinhanhnhoba);
    } else {
        $hinhanhnhoba = $row['hinhanhnhoba']; // Giữ nguyên nếu không có ảnh mới
    }

    // Cập nhật thông tin sản phẩm trong database
    $sql_update = "UPDATE tbl_sanpham SET
        tensanpham='".$tensanpham."',
        masp='".$masp."',
        giasp='".$giasp."',
        mausp='".$mausp."',
        sizesp='" .$sizesp."',
        soluong='".$soluong."',
        hinhanh='".$hinhanh."',
        hinhanhnhomot='".$hinhanhnhomot."',
        hinhanhnhohai='".$hinhanhnhohai."',
        hinhanhnhoba='".$hinhanhnhoba."',
        noidung='".$noidung."',
        tomtat='".$tomtat."',
        baoquan='".$baoquan."',
        tinhtrang='".$tinhtrang."',
        id_danhmuc='".$danhmuc."'
        WHERE id_sanpham='$_GET[idsanpham]'";

    // Thực thi câu lệnh cập nhật
    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=quanlysp&query=them');
}
else{ 
    $id=$_GET['idsanpham'];
    // Lấy thông tin sản phẩm
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        if (!empty($row['hinhanh']) && file_exists('upload/'.$row['hinhanh'])) {
            unlink('upload/'.$row['hinhanh']);
        }
        if (!empty($row['hinhanhnhomot']) && file_exists('upload/'.$row['hinhanhnhomot'])) {
            unlink('upload/'.$row['hinhanhnhomot']);
        }
        if (!empty($row['hinhanhnhohai']) && file_exists('upload/'.$row['hinhanhnhohai'])) {
            unlink('upload/'.$row['hinhanhnhohai']);
        }
        if (!empty($row['hinhanhnhoba']) && file_exists('upload/'.$row['hinhanhnhoba'])) {
            unlink('upload/'.$row['hinhanhnhoba']);
        }
    } 
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '".$id."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysp&query=them');
}
?>

