    <?php 
        $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
        $query_pro=mysqli_query($mysqli,$sql_pro);
        //get danh muc
        $sql_cate="SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
        $query_cate=mysqli_query($mysqli,$sql_cate);
        $row_title=mysqli_fetch_array($query_cate);
    ?>
    <!DOCTYPE html>
    <html>
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
        <script src="js/category.js" defer></script>
        <title>WEaR Store| Danh mục</title>
        <link rel="stylesheet" href="style/categorystyle.css">     
    </head>
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-l">
                <div class="cartegory-right row">   
                    <div class="cartegory-right row">
                        <div class="cartegory-right-top-item">
                            <p>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'] ?></p>
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
                                </a>
                            </div>
                            <?php
                                }
                            ?>
                           
                        </div>            
                </div>
            </div>
        </div>
    </section>
    </html>