<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 How To Integrate Stripe Payment Gateway</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Additional CSS from the first code -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style>
        .img_deg {
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body style="height: 100%;margin: 0;padding: 0;position: relative;">
    @include('home.loginheader')
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->

    <div class="container" style="margin-top: 100px;">
        <div class='row'>
            <h1>Laravel 10 How To Integrate Stripe Payment Gateway</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        Laravel 10 How To Integrate Stripe Payment Gateway
                    </div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:22%" class="text-center">Subtotal</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalprice = 0 ?>
                                @foreach($cart as $cartItem)
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs"><img src="/product/{{ $cartItem->image }}" class="img-responsive img_deg" /></div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $cartItem->product_title }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">${{ $cartItem->price }}</td>
                                    <td data-th="Quantity">{{ $cartItem->quantity }}</td>
                                    <td data-th="Subtotal" class="text-center">${{ $cartItem->price * $cartItem->quantity }}</td>
                                    <td class="actions" data-th="">
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove the product from cart?');" href="{{ url('delete_cart', $cartItem->id) }}"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php $totalprice += $cartItem->price * $cartItem->quantity ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right"><h3><strong>Total ${{ $totalprice }}</strong></h3></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <form action="{{ route('session') }}" method="POST">
                                            @csrf
                                            <a href="{{ url('/') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                            <input type="hidden" name="total" value="{{ $totalprice }}">
                                            <input type="hidden" name="productname" value="Products in Cart">
                                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->

    <div class="cpy_">
        <p>© 2024 All Rights Reserved By<br></p>
    </div>

    <!-- Additional JS from the first code -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <script src="{{ asset('home/js/cus
