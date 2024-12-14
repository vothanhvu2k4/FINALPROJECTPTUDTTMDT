<?php
    if(isset($_POST['timkiem'])) {
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<!DOCTYPE html>
<html>
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
    <title>WEaR Store| Tìm kiếm</title>
    <script src="js/category.js" defer></script>
    <link rel="stylesheet" href="style/categorystyle.css">    
</head>
<section class="cartegory">
        <div class="container">
        </div>
        <div class="container">
            <div class="cartegory-l">
                <div class="cartegory-right row">  
                    <div class="cartegory-right row">
                        <div class="cartegory-right-top-item">
                            <p>Từ khoá tìm kiếm: <?php echo $_POST['tukhoa']; ?></p>
                        </div>
                        <div class="cartegory-right-top-item">
                        <select id="sortSelect">
                            <option value="">Sắp xếp</option>
                            <option value="high-to-low">Giá cao đến thấp</option>
                            <option value="low-to-high">Giá thấp đến cao</option>
                         </select>
                        </div>                            
                        <div class="cartegory-right-content row" id="productList">
                        <?php while ($row_pro = mysqli_fetch_array($query_pro)) {
                                ?>                    
                            <div class="cartegory-right-content-item" data-price="<?php echo number_format ($row_pro['giasp'])?>">
                            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">  
                            <img  src="admincp/modules/quanlysp/upload/<?php echo $row_pro['hinhanh']?>" alt="ảnh sản phẩm">
                                <h1><?php echo $row_pro['tensanpham']?></h1>
                                <p><?php echo number_format ($row_pro['giasp'])?><sup>vnđ</sup></p>
                            </div>
                            <?php
                                }
                            ?>
                            </a>
                        </div>            
                </div>
            </div>
        </div>
    </section>
    </html>



