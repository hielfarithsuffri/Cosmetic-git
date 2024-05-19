
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style type="text/css">
      .title{
        text-align: center;
        font-size: 25px;
        font-weight: bold;
      }
      .center
        {
            margin: auto;
            width: 50%;
            margin-top: 30px;
            border: 2px solid white;
            padding: 10px;
        }

        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

        .img_size{
            width: 150px;
            height: 150px;
        }

        .th_color{
            background-color: #333333;
        }

        .th_design{
            padding: 30px;
        }
    </style>
  </head>
  <body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar') 
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title">All Orders</h1>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_design">Name</th>
                        <th class="th_design">Email</th>
                        <th class="th_design">Phone</th>
                        <th class="th_design">Address</th>
                        <th class="th_design">User ID</th>
                        <th class="th_design">Product Title</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Image</th>
                        <th class="th_design">Product ID</th>
                        <th class="th_design">Payment Status</th>
                        <th class="th_design">Delivery Status</th>
                        <th class="th_design">Created At</th>
                        <th class="th_design">Updated At</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                        <td class="th_design">{{ $order->name }}</td>
                        <td class="th_design">{{ $order->email }}</td>
                        <td class="th_design">{{ $order->phone }}</td>
                        <td class="th_design">{{ $order->address }}</td>
                        <td class="th_design">{{ $order->user_id }}</td>
                        <td class="th_design">{{ $order->product_title }}</td>
                        <td class="th_design">{{ $order->quantity }}</td>
                        <td class="th_design">${{ $order->price }}</td>
                        <td class="th_design"><img src="/product/{{ $order->image }}" class="img_size"></td>
                        <td class="th_design">{{ $order->product_id }}</td>
                        <td class="th_design">{{ $order->payment_status }}</td>
                        <td class="th_design">{{ $order->delivery_status }}</td>
                        <td class="th_design">{{ $order->created_at }}</td>
                        <td class="th_design">{{ $order->updated_at }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>