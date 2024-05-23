
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
        .center
        {
            margin: auto;
            width: 50%;
            margin-top: 30px;
            border: 2px solid #C0C0C0;
            padding: 10px;
        }

        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
            color: black;
        }

        .img_size{
            width: 40px;
            height: 40px;
        }

        .th_color{
            background-color: #C0C0C0;
            font-size: 15px;
        }

        .th_design{
            padding-left: 35px;
            padding-right: 35px;
            color: black;
            font-size: 15px;
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
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                    @endif



                    <table class="center">
                        <h2 class=font_size>Product Details</h2>

                        <tr class ="th_color">
                            <th class="th_design"> Product Title </th>
                            <th class="th_design"> Description </th>
                            <th class="th_design"> Quantity </th>
                            <th class="th_design"> Category </th>
                            <th class="th_design"> Price </th>
                            <th class="th_design"> Discount </th>
                            <th class="th_design"> Product Image </th>
                            <th class="th_design"> Edit </th>
                            <th class="th_design"> Delete </th>

                        </tr>

                        @foreach($product as $product)

                        <tr>
                            <td class="th_design"> {{$product->title}} </td>
                            <td class="th_design"> {{$product->description}} </td>
                            <td class="th_design"> {{$product->quantity}} </td>
                            <td class="th_design"> {{$product->category}} </td>
                            <td class="th_design"> {{$product->price}} </td>
                            <td class="th_design"> {{$product->discount_price}} </td>

                            <td class="th_design">
                                <img class="img_size" src="product/{{$product->image}}" width="100px" height="100px">
                            </td>

                            <td class="th_design"> 
                                <a class= "btn btn-success" href="{{url('update_product', $product->id)}}" > Update </a>
                            </td>
                            <td class="th_design"> 
                                <a onclick="return confirm('Are you sure you want to delete this category?')" class= "btn btn-danger" href="{{url('delete_product', $product->id)}}"> Delete </a>
                            </td>
                        </tr>

                        @endforeach
                    </table>
                        
                </div>
            </div>
            
            
        <!-- page-body-wrapper ends -->
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