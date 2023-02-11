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
</head>

<body>
    <div class="container">
        <div class="row">
            <div cclass="col-sm-6">
                <div class="cart-table">
                    <h2>Những sản phẩm được thanh toán nhiều nhất khi thêm vào giỏ hàng</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list1 as $item)
                                <tr>
                                    <td class="cart-pic first-row">
                                        <img src="{{ $item->image_url }}" alt="">
                                    </td>
                                    <td class="cart-title first-row">{{ $item->name }}</td>
                                    <td class="p-price first-row">{{ number_format($item->price) }}₫</td>
                                    <td class="qua-col first-row">{{ number_format($item->totalProduct) }}</td>
                                    <td class="size-td first-row">{{ $item->size }}</td>
                                    <td lass="color-td first-row">{{ $item->color }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div cclass="col-sm-6">
                <div class="cart-table">
                    <h2>Những sản phẩm bị xóa nhiều nhất khi thêm vào giỏ hàng</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list2 as $item)
                                <tr>
                                    <td class="cart-pic first-row">
                                        <img src="{{ $item->image_url }}" alt="">
                                    </td>
                                    <td class="cart-title first-row">{{ $item->name }}</td>
                                    <td class="p-price first-row">{{ number_format($item->price) }}₫</td>
                                    <td class="qua-col first-row">{{ number_format($item->totalProduct) }}</td>
                                    <td class="size-td first-row">{{ $item->size }}</td>
                                    <td lass="color-td first-row">{{ $item->color }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
