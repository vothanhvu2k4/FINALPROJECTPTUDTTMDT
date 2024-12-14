document.getElementById('sortSelect').addEventListener('change', function() {
    var productList = document.getElementById('productList');
    var items = Array.from(productList.getElementsByClassName('cartegory-right-content-item'));

    // Lấy giá trị sắp xếp được chọn
    var sortOption = this.value;
    console.log('Sort option:', sortOption); // Kiểm tra giá trị của sortOption

    // Hàm để lấy giá trị giá sản phẩm từ data-price, loại bỏ "vnđ" và chuyển thành số
    function getProductPrice(item) {
        var priceStr = item.getAttribute('data-price'); // Lấy giá trị từ data-price
        return parseFloat(priceStr); // Chuyển sang số mà không cần xử lý thêm
    }

    // Sắp xếp theo giá từ cao đến thấp hoặc thấp đến cao
    if (sortOption === "high-to-low") {
        items.sort(function(a, b) {
            return getProductPrice(b) - getProductPrice(a); // Sắp xếp từ cao đến thấp
        });
    } else if (sortOption === "low-to-high") {
        items.sort(function(a, b) {
            return getProductPrice(a) - getProductPrice(b); // Sắp xếp từ thấp đến cao
        });
    }

    // Xóa tất cả sản phẩm hiện tại
    productList.innerHTML = '';

    // Thêm các sản phẩm đã được sắp xếp vào lại danh sách
    items.forEach(function(item) {
        productList.appendChild(item);
    });
});
