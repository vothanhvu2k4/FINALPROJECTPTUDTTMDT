<?php
    // Kiểm tra xem biến $_GET['id'] có tồn tại hay không
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc=? ORDER BY id_bv DESC";
        $stmt = $mysqli->prepare($sql_bv);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $query_bv = $stmt->get_result();
        //get danh muc
        $sql_danhmucbaiviet="SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet=? LIMIT 1";
        $stmt = $mysqli->prepare($sql_danhmucbaiviet);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $query_danhmucbaiviet = $stmt->get_result();
        $row_title=mysqli_fetch_array($query_danhmucbaiviet);
    } else {
        // Nếu biến $_GET['id'] không tồn tại, hãy thực hiện hành động khác
        // Ví dụ: chuyển hướng đến trang khác
        header('Location: index.php');
        exit;
    }
?>
    <!DOCTYPE html>
    <html>
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
        <title>WEaR Store| Tin tức<script src="js/category.js" defer></script></title>
        <link rel="stylesheet" href="style/newsstyle.css">    
    </head>
    <section class="cartegory">
        <div class="cartegory-top row"></div>
        <div class="container">
                    <div class="cartegory-right row">
                        <div class="cartegory-right-top-item">
                            <p>Danh mục tin tức: <?php echo $row_title['tendanhmuc_baiviet'] ?></p>
                        </div>                           
                        <div class="cartegory-right-content row" id="productList">
                        <?php while ($row_bv = mysqli_fetch_array($query_bv)) {
                                ?>                    
                            <div class="cartegory-right-content-item">
                            <a href="index.php?quanly=tintucfull&id=<?php echo $row_bv['id_bv']?>">  
                            <img  src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>" alt="ảnh tin tuc">
                                <h1><?php echo $row_bv['tenbaiviet']?></h1>
                            </div>
                            <?php
                                }
                            ?>
                            </a>
                        </div>       
                    </div>    
            </div>
         
    </section>
    </html>

