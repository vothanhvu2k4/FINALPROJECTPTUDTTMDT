<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
    <p>Sửa sản phẩm</p>
<table border="1" width="50%" style="border-collapse: collapse;">
<?php 
    while($row = mysqli_fetch_array($query_sua_sp)){
?>
     <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
    </tr>
    <tr>
        <td>Mã SP</td>
        <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
    </tr>
    <tr>
        <td>Giá SP</td>
        <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
    </tr>
    <tr>
        <td>Màu SP</td>
        <td><input type="text" value="<?php echo $row['mausp'] ?>" name="mausp"></td>
    </tr>
    <tr>
    <td>Size SP</td>
    <td>
        <select name="sizesp">
            <?php 
            if($row['sizesp'] == 1){
            ?>
            <option value="1" selected>S</option>
            <option value="2">M</option>
            <option value="3">L</option>
            <option value="4">XL</option>
            <option value="5">XXL</option>
            <?php 
            } elseif($row['sizesp'] == 2){
            ?>
            <option value="1">S</option>
            <option value="2" selected>M</option>
            <option value="3">L</option>
            <option value="4">XL</option>
            <option value="5">XXL</option>
            <?php 
            } elseif($row['sizesp'] == 3){
            ?>
            <option value="1">S</option>
            <option value="2">M</option>
            <option value="3" selected>L</option>
            <option value="4">XL</option>
            <option value="5">XXL</option>
            <?php 
            } elseif($row['sizesp'] == 4){
            ?>
            <option value="1">S</option>
            <option value="2">M</option>
            <option value="3">L</option>
            <option value="4" selected>XL</option>
            <option value="5">XXL</option>
            <?php 
            } else {
            ?>
            <option value="1">S</option>
            <option value="2">M</option>
            <option value="3">L</option>
            <option value="4">XL</option>
            <option value="5" selected>XXL</option>
            <?php 
            }
            ?>
        </select>
        </td>
</tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh">
        <img src="modules/quanlysp/upload/<?php echo $row['hinhanh'] ?>" width="150px">
    </td>
    </tr>
    <tr>
        <td>Hình ảnh nhỏ một</td>
        <td><input type="file" name="hinhanhnhomot">
        <img src="modules/quanlysp/upload/<?php echo $row['hinhanhnhomot'] ?>" width="150px">
    </td>
    </tr>
    <tr>
        <td>Hình ảnh nhỏ hai</td>
        <td><input type="file" name="hinhanhnhohai">
        <img src="modules/quanlysp/upload/<?php echo $row['hinhanhnhohai'] ?>" width="150px">
    </td>
    </tr>
    <tr>
        <td>Hình ảnh nhỏ ba</td>
        <td><input type="file" name="hinhanhnhoba">
        <img src="modules/quanlysp/upload/<?php echo $row['hinhanhnhoba'] ?>" width="150px">
    </td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea row="10" name="noidung" style ="resize:none"><?php $row['noidung']?></textarea>
    </td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea row="10" name="tomtat" style ="resize:none"><?php $row['tomtat']?></textarea></td>
    </tr>
    <tr>
        <td>Bảo quản</td>
        <td><textarea row="10" name="baoquan" style ="resize:none"><?php $row['baoquan']?></textarea></td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
            <select name="danhmuc">
                <?php 
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query=mysqli_query($mysqli,$sql_danhmuc);
                while ($row_danhmuc=mysqli_fetch_array($query)){
                if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
                ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php
                }else{
                    ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                <?php 
                }
                 }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td>
            <select name="tinhtrang">
            <?php 
            if($row['tinhtrang']==1){
            ?>
            <option value="1">Kích hoạt</option>
            <option value="0">Ẩn</option>
            <?php 
            }else{
            ?>
            <option value="1">Kích hoạt</option>
            <option value="0" selected>Ẩn</option>
            <?php 
            }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
    </tr>
</form> 
<?php 
}
?>
</table>  
