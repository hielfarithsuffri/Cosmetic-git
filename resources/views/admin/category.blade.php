
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
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2font{
            font-size: 40px;
            padding-bottom: 40px;
            color: black;
        }
    
        .input_color{
            color: black;
            padding-bottom: 40px ;
        }
        .center{
            margin: auto;
            width: 50%;
            padding: 10px;
            text-align: center;
            margin-top: 30px;
            border: 3px solid #C0C0C0;
            color: black;
        }

        .header_color{
            background-color: #C0C0C0;
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
                    <div class=div_center>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                        @endif
                            <h2 class="h2font">Add Category</h2>
                            <form action="{{ url('/add_category') }}" method="POST">
                                @csrf
                                <input class="input_color" type="text" name="category" placeholder="Write a Category name">
                                <input type="submit" class="btn btn-primary" name= "submit" value="Add Category">
                            </form>


                    </div>
                        <table class="center">
                            <tr class="header_color">
                                <th >Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($data as $data)
                            <tr>
                                <td>{{ $data->category_name }}</td>
                                <td><a class= "btn btn-danger" href="{{ url('/edit_category', $data->id) }}">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure you want to delete this category?')" class= "btn btn-danger" href="{{ url('/delete_category', $data->id) }}">Delete</a></td>
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