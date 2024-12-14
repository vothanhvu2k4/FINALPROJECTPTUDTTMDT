<?php
// Kiểm tra xem biến $_GET['id'] có tồn tại hay không
if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    // Truy vấn để lấy thông tin chi tiết bài viết
    $sql_bv = "SELECT * FROM tbl_baiviet WHERE id_bv = ?";
    $stmt = $mysqli->prepare($sql_bv);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $query_bv = $stmt->get_result();
   
    // Kiểm tra xem có bài viết nào không
    if ($query_bv->num_rows > 0) {
        $row_bv = mysqli_fetch_array($query_bv);
    } else {
        // Nếu không tìm thấy bài viết, chuyển hướng về trang chính
        header('Location: index.php');
        exit;
    }
} else {
    // Nếu biến $_GET['id'] không tồn tại, chuyển hướng về trang chính
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
    <title><?php echo $row_bv['tenbaiviet']; ?> | WEaR Store</title>
    <link rel="stylesheet" href="style/fullnews.css"> <!-- Thêm CSS cho trang chi tiết -->
</head>
<body>
    <section class="fullnews">
        <div class="fullnews-top row">
            <p><a href=index.php>Trang chủ</p></a>  <span>&#10230;</span> <p> <a href="index.php?quanly=tintuc">Tin tức</p></a>
        </a></div>
        <div class="container">
            <h1><?php echo $row_bv['tenbaiviet']; ?></h1>
            <div class="news-content">
                <?php echo $row_bv['noidung']; ?>
            </div>
        </div>
    </section>
</body>
</html>

