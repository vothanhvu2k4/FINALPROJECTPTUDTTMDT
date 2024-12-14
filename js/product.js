const bigImg = document.querySelector(".product-content-left-big-img img");
const smallImgs = document.querySelectorAll(".product-content-left-small-img img");
smallImgs.forEach(function (imgItem) {
  imgItem.addEventListener("click", function () {
    bigImg.src = imgItem.src;
  });
});
function showContent(section) {
    // Xóa class active khỏi tất cả các nút
    document.querySelectorAll('.product-content-right-bottom-top div').forEach(item => {
        item.classList.remove('active');
    });

    // Xóa class active khỏi tất cả nội dung
    document.querySelectorAll('.product-content-right-bottom-content > div').forEach(item => {
        item.classList.remove('active');
    });

    // Thêm class active vào nút và nội dung được chọn
    document.querySelector(`.product-content-right-bottom-content-title-item-${section}`).classList.add('active');
    document.querySelector(`.product-content-right-bottom-content-${section}`).classList.add('active');
}
// Lắng nghe sự kiện submit trên form
document.querySelector('form').addEventListener('submit', function (event) {
  const sizes = document.querySelectorAll('.size span');
  let sizeSelected = false;

  // Kiểm tra xem có size nào được chọn không
  sizes.forEach(size => {
      if (size.classList.contains('selected')) {
          sizeSelected = true;
      }
  });

  // Nếu không có size nào được chọn, ngừng hành động submit và hiển thị cảnh báo
  if (!sizeSelected) {
      event.preventDefault(); // Ngừng submit form
      alert('Vui lòng chọn size trước khi thêm vào giỏ hàng!');
  }
});

// Xử lý sự kiện click trên các size để chọn size
document.querySelectorAll('.size span').forEach(size => {
  size.addEventListener('click', function () {
      // Bỏ class 'selected' khỏi tất cả các size
      document.querySelectorAll('.size span').forEach(s => s.classList.remove('selected'));

      // Thêm class 'selected' cho size được chọn
      this.classList.add('selected');
  });
});
document.querySelectorAll('.size span').forEach(size => {
  size.addEventListener('click', function () {
      // Bỏ class 'selected' khỏi tất cả các size
      document.querySelectorAll('.size span').forEach(s => s.classList.remove('selected'));

      // Thêm class 'selected' cho size được chọn
      this.classList.add('selected');
  });
});
