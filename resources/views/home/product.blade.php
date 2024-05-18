<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center" style="margin-bottom:0px">
               <h2>
                  Fast Selling Product
               </h2>
            </div>
            <div class="row">

               @foreach ($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4" style="padding-left:0; padding-right:0;">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                        <a href="{{ url('product_detail', $products->id) }}" class="option1">Product Detail</a>
                           <form action="{{ url('add_cart', $products->id) }}" method="POST">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" value= "1" min="1" style="width: 100px;">
                                 
                                 </div>
                                 <div class="col-md-4">
                                    
                                    <input type="submit" value= "Add to Cart">
                                 </div>
                              </div>
                           </form>
                           
                     
                          
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}">
                     </div>
                     <div class="product-details" style="padding-left:20px" >
                        <p style="margin-bottom: 0;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">{{$products->category}}</p>
                        <p style="margin-bottom: 0; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">{{$products->title}}</p>

                           @if($products->discount_price != null)
                              <p class="product-details2" style="text-decoration: line-through; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">IDR {{$products->price}}</p>
                              <p class="product-details2" style="color: red; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">IDR {{$products->discount_price}}</p>
                           @else
                              <p>IDR {{$products->price}}</p>
                           @endif
                        
                     </div>
                  </div>
               </div>
               @endforeach

               <span>
               {!! $product->withQueryString()->Links('pagination::bootstrap-5') !!}
               
               </span>

              
            
         </div>
      </section>