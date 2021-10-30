

 @extends('layout')
 @section('title', 'Checkout')
 @section('content') 

 @php 
 use App\CategoriesModel;
 use App\Products;
 use Illuminate\Support\Facades\DB;
 @endphp

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li><a href="cart">Cart</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section mt-32">
    <div class="container">
        
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form method="post" action="submit-order">
                        <h3>Billing Details</h3>
                        <div class="row">

                        {{csrf_field()}}

              
   
                      @if(!session('cart'))
                    <script type="text/javascript">
                     window.location = "{{ url('cart') }}";
                       </script>
                         @endif

                         @if(session('cart'))
                         @foreach((array) session('cart') as $id => $details)
                         @php $product_details = Products::find($details['id']); @endphp
                         <input type="hidden" name="customer" value="James Bond"/>
                         <input type="hidden" name="item_name[]" value="{{ $product_details->name }}"/>
                          <input type="hidden" name="item_id[]" value="{{ $id }}"/>
                         <input type="hidden" name="quantity[]" value="{{ $details['quantity'] }}"/>
                         <input type="hidden" name="price[]" value="{{ $product_details->price }}"/>
                         <?php if(!empty($details['pic'])){?>
                         <input type="hidden" name="pic[]" value="{{ $product_details->pic_1 }}"/>
                         <?php }else{?>
                         <input type="hidden" name="pic[]" value=""/>
                         <?php }?>  
                          <input type="hidden" name="payment_status" value="Pending"/>
                          <input type="hidden" name="payment_method" value="Pay on Delivery"/>
                          @endforeach
                           @endif

                            <div class="col-lg-6 mb-20">
                                <label>First Name <span>*</span></label>
                                <input type="text" disabled value="{{Auth::user()->fname}}">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Last Name <span>*</span></label>
                                <input type="text" disabled value="{{Auth::user()->lname}}">
                            </div>

                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Address <span>*</span></label>
                                    <textarea  class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Delivery Address" style="height:100px">{{Auth::user()->address}}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control @error('phone') is-invalid @enderror">
                                   @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Email Address <span>*</span></label>
                                <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror">
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                           
                            
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note" name="note" placeholder="Notes about your order, e.g. special notes for delivery." style="height:50px"></textarea>
                                </div>
                            </div>
                        </div>
                          <div class="order_button">
                                <button type="submit" style="margin-left:350px;margin-bottom:20px">Submit</button>
                            </div>
                    </form>
                </div>
                @php $vat = 25.00;@endphp
                <div class="col-lg-6 col-md-6">
                    <form action="#">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(session('cart'))
                                  @foreach((array) session('cart') as $id => $details)
                                  @php $product_details = Products::find($details['id']); @endphp
                                    <tr>
                                        <td> {{ $product_details->name }} <strong> × {{ $details['quantity'] }}</strong></td>
                                        <td> ₦{{ number_format($product_details->price * $details['quantity'], 2) }}</td>
                                    </tr>
                                    @endforeach
                                    @endif 
                                    
                                </tbody>
                                <tfoot>
                                <div style="display:none"> {{ $total = 0 }}
                                 @if(session('cart'))
                                 @foreach((array) session('cart') as $id => $details)
                                 @php $product_details = Products::find($details['id']); @endphp
                                 {{$total += $product_details->price * $details['quantity']}}
     
                                   @endforeach
                                   @endif
                            </div>
                                  <tr class="order_total">
                                        <th>VAT</th>
                                        <td><strong>₦{{number_format($vat,2)}}</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>₦{{number_format($total + $vat,2)}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                           
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@stop