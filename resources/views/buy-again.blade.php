<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">


    <style>
        .cart-pic img{
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href=""><i class="fa fa-home"></i> Home</a>
                        <span>Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <div class="nav-item">
        <div class="container">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="{{url('/Cart')}}">Giỏ hàng</a></li>
                    <li><a href="{{url('/same-product')}}">Sản phẩm tương tự</a></li>
                    <li><a href="{{url('/buy-again')}}">Mua lại hàng</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id ="list-cart">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    {{-- <th>Hình ảnh</th>
                                    <th class=""></th> 
                                    {{-- <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Kích thước</th>
                                    <th>Màu sắc</th>
                                    <th>Tổng</th>
                                    <th>Lưu</th> --}}
                                    {{-- <th>Xóa</th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $item)
                                <tr>
                                    <td class="cart-pic-buy-again second-row"><img src="{{$item['img']}}" alt=""></td>
                                    <td class="cart-title second-row">
                                        <div class="row2">
                                            <div class="col-lg-12 offset-lg-24">
                                                <div class="proceed-checkout">
                                                    <ul>
                                                        <li class="subtotal">Tên sản phẩm  : <span>{{$item['productName']}}</span></li>
                                                        <li class="cart-total">Kích thước :<span>{{$item['size']}}</span></li>
                                                        <li class="cart-total">Màu sắc :<span>{{$item['color']}}</span></li>
                                                        <li class="cart-total">Giá :<span>{{number_format($item['price'])}}₫</span></li>
                                                    </ul>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row2">
                                            <div class="col-lg-4 offset-lg-8">
                                                <div class="proceed-checkout">
                                                    <a onclick="AddCart({{ $item['productId'] }})" href="javascript:" class="proceed-btn">Mua lại hàng</a>
                                                    {{-- <a href="#" class="proceed-btn-2">Xóa</a> --}}
                                                    {{-- <a href="#" class="proceed-btn-2">Xóa</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->	

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                        </div>
                        <div class="payment-pic">
                            <img src="assets/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.zoom.min.js"></script>
    <script src="assets/js/jquery.dd.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>


     <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script>
        function AddCart(id) {
            $.ajax({
                url: 'AddtoCart/' + id,
                type: 'GET',

                success: function(response) {
                    // RenderCart(response);
                    console.log(response);
                    if (response['message'] == 'Error') {
                        alertify.error('Số luọng sản phẩm không đủ');
                    } else {
                        alertify.success('Thêm sản phẩm thành công');
                    }
                },
                error: function(response, error) {
                    // handleException(request , message , error);
                    console.log(error);
                    console.log(response);
                }
            });
            console.log(id);

        }
    </script>
</body>
</html>