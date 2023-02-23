# Structured-Programing_SP-15

# Link view online product

[https://nguyenletuananh.name.vn/laravel/public/](https://nguyenletuananh.name.vn/laravel/public/)

# For running the application locally

This project was generated with [Laravel](https://laravel.com/docs/10.x).

## Quick Strat

1. Clone Project
2. Composer install
3. php artisan migrate
4. php artisan serve

## If file .env can't install

1. copy file .env.example
2. fix .env.example(copy)->.env
3. php artisan key:generate

# Hướng dẫn sử dụng 

## Màn Trang chủ

* Người dùng chọn sản phẩm muốn thêm vào giỏ hàng.
* Nếu số lượng sản phẩm còn đủ sẽ hiển thị thông báo "Thêm sản phẩm thành công".
* Nếu số lượng sản phẩm không đủ sẽ hiển thị thông báo "Số lượng sản phẩm không đủ".

## Màn giỏ hàng

* Xem thông tin của các sản phẩm đã được thêm vào giỏ hàng
* Người dùng có thế tăng giảm số lượng sản phẩm 
* Sau khi ấn lưu sẽ kiểm tra xem số lượng có hợp lệ hay không và hiển thị thông báo tướng ứng
* Người dùng có thể xóa sản phẩm không mong muốn khỏi giỏ hàng

## Màn mua lại hàng(Local chạy được, nhưng trên server báo lỗi do không nhận được dữ liệu từ link api)

* Hiển thị thống tin sản phẩm của các đơn hàng gần đây đã được thanh toán 
* Người dùng có thể chọn "Mua lại hàng", sản phẩm sẽ được chọn sẽ được thêm vào giỏ hàng người dùng

## Màn sản phẩm tương tự

* Hiển thị các sản phẩm liên quan đến các sản phẩm trong giỏ hàng
* Người dùng có thể chọn "Thêm giỏ hàng", sản phẩm sẽ được chọn sẽ được thêm vào giỏ hàng người dùng



