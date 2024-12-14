<p class="titleadmin">THÊM SẢN PHẨM</p>
<table border="1" width="50%" style="border-collapse: collapse;">
     <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensanpham"></td>
    </tr>
    <tr>
        <td>Mã SP</td>
        <td><input type="text" name="masp"></td>
    </tr>
    <tr>
        <td>Giá SP</td>
        <td><input type="text" name="giasp"></td>
    </tr>
    <tr>
        <td>Màu SP</td>
        <td><input type="text" name="mausp"></td>
    </tr>
    <tr>
        <td>Size SP</td>
        <td>
        <select name="sizesp">
            <option value="1">S</option>
            <option value="2">M</option>
            <option value="3">L</option>
            <option value="4">XL</option>
            <option value="5">XXL</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td>Hình ảnh nhỏ một</td>
        <td><input type="file" name="hinhanhnhomot"></td>
    </tr>
    <tr>
        <td>Hình ảnh nhỏ hai</td>
        <td><input type="file" name="hinhanhnhohai"></td>
    </tr>
    <tr>
        <td>Hình ảnh nhỏ ba</td>
        <td><input type="file" name="hinhanhnhoba"></td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea rows="10" name="noidung" style ="resize:none"></textarea></td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea rows="10" name="tomtat" style ="resize:none"></textarea></td>
    </tr>
    <tr>
        <td>Bảo quản</td>
        <td><textarea rows="10" name="baoquan" style ="resize:none"></textarea></td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
            <select name="danhmuc">
                <?php 
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query=mysqli_query($mysqli,$sql_danhmuc);
                while ($row_danhmuc=mysqli_fetch_array($query)){
                ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php
                } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td>
            <select name="tinhtrang">
            <option value="1">Kích hoạt</option>
            <option value="0">Ẩn</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
    </tr>
</form> 
</table>  
