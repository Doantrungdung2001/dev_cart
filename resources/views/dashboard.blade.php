<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

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
                <canvas id="myPieChart" style="width:100%;max-width:700px"></canvas>
            </div>
            <div cclass="col-sm-6">
                <div class="cart-table">
                    <h2>Những sản phẩm được thanh toán nhiều nhất sau khi thêm vào giỏ hàng</h2>
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
                                    <td class="color-td first-row">{{ $item->color }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div cclass="col-sm-6">
                <div class="cart-table">
                    <h2>Những sản phẩm bị xóa nhiều nhất sau khi thêm vào giỏ hàng</h2>
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
                                    <td class="color-td first-row">{{ $item->color }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    data: {!! json_encode($dataset) !!},
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    position: 'left',
                    display: true

                },
                cutoutPercentage: 80,
                title: {
                    position: 'bottom',
                    display: true,
                    text: 'Người dùng:'
                },
            },
        });
    </script>
</body>

</html>
