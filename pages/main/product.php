<?php 
        $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
        AND tbl_sanpham.id_sanpham='$_GET[id]'LIMIT 1";
        $query_chitiet=mysqli_query($mysqli,$sql_chitiet);
        while($row_chitiet=mysqli_fetch_array($query_chitiet)){
        ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/product.js" defer></script>
    <script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
    <title>CHI TIẾT SẢN PHẨM</title>
    <link rel="stylesheet" href="style/productstyles.css">
</head>
<body>
<section class="product">
    <div class=" container">
        <div class="product-top row"> 
            <p><a href=index.php>Trang chủ</p></a>  <span>&#10230;</span>  <p><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_chitiet['id_danhmuc']?>"><?php echo $row_chitiet['tendanhmuc'] ?></a></p> <span>&#10230;</span> <p><?php echo $row_chitiet['tensanpham']?></p>   
        </a></div>
        <div class="product-content row">
            <div class="product-content-left row">
                <div class="product-content-left-big-img">
                    <img src="admincp/modules/quanlysp/upload/<?php echo $row_chitiet['hinhanh']?>" alt="Ảnh sản phẩm">
                </div>
                <div class="product-content-left-small-img">
                    <img src="admincp/modules/quanlysp/upload/<?php echo $row_chitiet['hinhanhnhomot']?>" alt="Ảnh sản phẩm">
                    <img src="admincp/modules/quanlysp/upload/<?php echo $row_chitiet['hinhanhnhohai']?>" alt="Ảnh sản phẩm">
                    <img src="admincp/modules/quanlysp/upload/<?php echo $row_chitiet['hinhanhnhoba']?>" alt="Ảnh sản phẩm">
                </div>
            </div>
            <form method ="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
            <div class="product-content-right">
                <div class="product-content-right-product-name">
                    <h1><?php echo $row_chitiet['tensanpham']?></h1>
                    <p><?php echo $row_chitiet['masp']?></p>
                </div>
                <div class="product-content-right-product-price">
                    <p><?php echo number_format($row_chitiet['giasp'],0,',','.') ?><sup>đ</sup></p>
                </div>
                <div class="product-content-right-color">
                    <p><span style="font-weight: bold;">Màu sắc</span>:<?php echo $row_chitiet['mausp']?><span style="color: brown;"></span></p>
                    <div class="product-content-right-product-color-img">
                        <img src="image/spcolor.jpg" alt="">
                    </div>
                </div>
                <div class="product-content-right-product-size">
                <p style="font-weight: bold;">Size:</p>
                <div class="size">
             <?php
        $all_sizes = ['1' => 'S', '2' => 'M', '3' => 'L', '4' => 'XL', '5' => 'XXL'];
        $sizes_available = explode(',', $row_chitiet['sizesp']); 

        foreach ($all_sizes as $key => $size) {
            if (in_array($key, $sizes_available)) {
                // Size có sẵn
                echo "<span>$size</span>";
            } else {
                // Size không có sẵn
                echo "<span style='text-decoration: line-through; color: gray;'>$size</span>";
            }
        }
        ?>
                </div>
            </div>
                    
                <div class="product-content-right-button">
                    <button><i class="fa-solid fa-cart-shopping"></i><p>
                        <input class="themgiohang" name="themgiohang" type ="submit" value="Thêm vào giỏ hàng"></button></p>
                </div>
                </form>
                <div class="product-content-right-product-icon row">
                    <div class="product-content-right-product-icon-item">
                        <i class="fa-solid fa-phone"></i> <p>Hotline</p>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <i class="fa-solid fa-comment"></i><p>Comment</p>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <i class="fa-solid fa-share"></i><p>Share</p>
                    </div>
                </div>
                <div class="product-content-right-bottom"></div>
                <div class="product-content-right-bottom-top">
                    <div class="product-content-right-bottom-content-title-item-gioithieu" onclick="showContent('gioithieu')">
                        <p>GIỚI THIỆU</p>
                    </div>
                    <div class="product-content-right-bottom-content-title-item-chitiet" onclick="showContent('chitiet')">
                        <p>CHI TIẾT</p>
                    </div>
                    <div class="product-content-right-bottom-content-title-item-baoquan" onclick="showContent('baoquan')">
                        <p>BẢO QUẢN</p>
                    </div>
                </div>
                <div class="product-content-right-bottom-content-big">
                    <div class="product-content-right-bottom-content">
                        <div class="product-content-right-bottom-content-gioithieu active">
                            <p>
                            <?php echo $row_chitiet['tomtat']?>
                            </p>
                        </div>
                        <div class="product-content-right-bottom-content-chitiet">
                            <p><strong><?php echo $row_chitiet['noidung']?></p>
                        </div>
                        
                        <div class="product-content-right-bottom-content-baoquan">
                            <ul>
                                <li><strong><?php echo $row_chitiet['baoquan']?></li>
                            </ul>
                        </div>                     
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
</body>
<?php
        }
        ?>
<?php $id_sanpham = $_GET['id']; // Lấy id sản phẩm hiện tại từ URL
$sql_lienquan = "SELECT * FROM tbl_sanpham 
                 WHERE id_danhmuc = (SELECT id_danhmuc FROM tbl_sanpham WHERE id_sanpham = '$id_sanpham') 
                 AND id_sanpham != '$id_sanpham' 
                 LIMIT 4";
$query_lienquan = mysqli_query($mysqli, $sql_lienquan);
?>      
<section class="product-ralated">
    <div class="product-ralated-title">
        <p> SẢN PHẨM LIÊN QUAN</p>
    </div>
    <div class="row product-content">
        <?php while ($row_lienquan = mysqli_fetch_array($query_lienquan)) { ?>
            <div class="product-ralated-item">
                <a href="index.php?quanly=sanpham&id=<?php echo $row_lienquan['id_sanpham']?>">
                    <img src="admincp/modules/quanlysp/upload/<?php echo $row_lienquan['hinhanh']; ?>" alt="<?php echo $row_lienquan['tensanpham']; ?>">
                    <h1><?php echo $row_lienquan['tensanpham']; ?></h1>
                    <p><?php echo number_format($row_lienquan['giasp'], 0, ',', '.'); ?><sup>đ</sup></p>
                </a>
            </div>
        <?php } ?>
    </div>
</section>
</html>