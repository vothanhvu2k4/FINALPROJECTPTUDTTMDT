<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/headerstyle.css">
<?php 
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
    $query = mysqli_query($mysqli, $sql_danhmuc);
    $sql_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet ASC";
    $query_danhmucbv = mysqli_query($mysqli, $sql_danhmucbv);
?>  
<header class="site-header">
    <div class="logo">
 <a href="index.php"><img src="images/Logo-không-nền.png" alt="Logo" /></a>
    </div>
    <nav class="navigation">
        <ul class="menu">
            <?php while ($row_danhmuc = mysqli_fetch_array($query)) { ?> 
                <li>
                    <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                        <?php echo $row_danhmuc['tendanhmuc'] ?>
                    </a>
                </li>
            <?php } ?>
            <li>
            <a href="#">Tin tức</a>
            <ul class="sub-menu">
                <?php while ($row_danhmucbv = mysqli_fetch_array($query_danhmucbv)) { ?>
                    <li>
                        <a href="index.php?quanly=tintuc&id=<?php echo $row_danhmucbv['id_baiviet'] ?>">
                            <?php echo $row_danhmucbv['tendanhmuc_baiviet'] ?>
                        </a>
                    </li>
                    <?php } ?>
        </ul>
        </li>
        </ul>
    </nav>
    <style>
        .search-bar input {
            border:1px solid #333;
        }
    </style>
    <div class="header-extras">
        <div class="search-bar">
            <form action="index.php?quanly=timkiem" method="POST">
            <input placeholder="Tìm kiếm sản phẩm..." type="text" name="tukhoa" />
            <input type="submit" name="timkiem" value=" "> <i class="fa fa-search"></i>
            </form>
        </div>
    <?php 
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1) {
        unset($_SESSION['dangky']);   
    }
    ?>
        <div class="user-icons">
        <?php
             if(isset($_SESSION['dangky'])){
        ?>
         <a href="index.php?dangxuat=1"><i class="fa-solid fa-right-from-bracket"></i></a>
        <?php   }else{
        ?>
          <a class="fa fa-user" href="index.php?quanly=dangky"></a>
        <?php
        }
        ?>          
            <a class="fa-solid fa-shop" href="index.php?quanly=danhmucsanpham&id=4"></a>
            <a href="index.php?quanly=giohang" class="cart">
                <i class="fa fa-shopping-cart"></i>
            </a>
        </div>
    </div>
</header>