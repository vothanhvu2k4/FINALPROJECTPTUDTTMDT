    <?php
        $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC"; 
        $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
    ?>
    <p class="titleadmin">LIỆT KÊ SẢN PHẨM</p>
    <table style="width:100%" border="1" style="border-collapse: collapse;"> <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Màu sản phẩm</th>
        <th>Size sản phẩm</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
        </tr>
    <?php
        $i=0;
        while($row = mysqli_fetch_array($query_lietke_sp)){
        $i++;
        ?>
        <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><img src="modules/quanlysp/upload/<?php echo $row['hinhanh'] ?>" width="150px"></td>
        <td><?php echo $row['giasp'] ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo $row['mausp'] ?></td>
        <td>
        <?php 
        if($row['sizesp'] == 1) {
        echo 'S';
        } elseif($row['sizesp'] == 2) {
        echo 'M';
        } elseif($row['sizesp'] == 3) {
        echo 'L';
        } elseif($row['sizesp'] == 4) {
        echo 'XL';
        } elseif($row['sizesp'] == 5) {
        echo 'XXL';
    } else {
        echo 'Không xác định';
    }
    ?>
</td>
        <td ><?php echo $row['tomtat'] ?></td>
        <td><?php if($row['tinhtrang']==1){
            echo 'Kích hoạt';
        }
        else {
            echo 'Ẩn';
        }
         ?></td>
        <td>
            <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a> | 
            <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
        </td>
        </tr>
        <?php
        }
        ?>  
</table>