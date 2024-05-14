<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .img_deg
        {   
            height: 200px;
            width: 200px;
        }
    </style>
   </head>
   <body style="height: 100%;margin: 0;padding: 0;position: relative;">
      
   
         @include('home.loginheader')
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
   
        <div class="main-content content-padding-top" style="margin-top: 100px;padding-bottom: 1000px">

            <div class="container">
                <table class="table table-striped table-centered">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalprice=0 ?>
                        @foreach($cart as $cart)
                        <tr>
                            <td>{{$cart->product_title}}</td>
                            <td>{{$cart->quantity}}</td>
                            <td>{{$cart->price}}</td>
                            <td><img class="img_deg" src="/product/{{$cart->image}}"></td>
                            <td>
                                <a class = "btn btn-danger"  onclick="return confirm('Are you sure you want to remove the product from cart?');" href="{{url('delete_cart', $cart->id)}}"> X</td> 
                        </tr>
                        <?php $totalprice= $totalprice + $cart->price ?>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                    <h1> Total Price: IND {{$totalprice}}</h1>
                </div>
                <div class="text-right">
                    <a href="{{url('order_cart')}}"><button class="btn btn-primary">Continue To Payment</button></a>
                </div>
                
            </div>
        </div>
      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      
         <div class="cpy_">
            <p>© 2024 All Rights Reserved By<br>
            </p>
         </div>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <!--script js-->
      <script src="script.js"></script>
   </body>
</html>