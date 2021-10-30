
        @extends('layout')
        @section('title', 'Products')
        @section('content') 


     

        <script>
$(document).ready(function(){
    var maxLength = 100;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function(){
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});
</script>
<style>
    .show-read-more .more-text{
        display: none;
    }
</style>

<div class="content-box">
    <div class="element-wrapper">
        <h6 class="element-header">Products </h6>
        <div class="element-box">
            <h5 class="form-header">Products</h5>
            <div class="form-desc">

            @if ($delete_message = Session::get('delete_success'))
           <div class="alert alert-danger">
              <p>{{ $delete_message }}</p>
           </div>
          @endif
                
            </div>
            <div class="table-responsive">
                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Views</th>
                            <th>Item Status</th>
                            <th>Action</th>
                           
                    </thead>
                    <tfoot>
                        <tr>
                             <th>#</th>
                             <th></th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Views</th>
                            <th>Item Status</th>
                            <th>Action</th>
                           
                        </tr>
                    </tfoot>
                   
                    <tbody>
                        @php 
                        use App\CategoriesModel;
                        @endphp
                       @foreach ($products as $products)
                         <tr>
                            <td>{{ ++$i }}</td>
                            <?php if (!empty($products->pic_1)){?>
                                <td><div class="product-image"><img alt="" src="{{ asset($products->pic_1) }}" style="width:80px; height:70px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div></td>
                            <?php }else{?>
                                <td><div class="product-image"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:80px; height:70px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div></td>
                            <?php }?>
                           <?php $main_cat = CategoriesModel::find($products->main_category_id);?>
                            <td>{{ $products->name }}</td>
                           
                            <?php 
                            $trimed_category = str_replace("','", " ", $main_cat);
                            ?>
                            <td>{{ucwords($main_cat->main_category)}}</td>
                            <td>₦{{ $products->price}}</td>
                             <!-- <td class="show-read-more">{{ $products->description }}</td> -->
                            
                             <td>{{ $products->quantity}}</td>
                             @if(empty($products->view_count))
                             <td>-</td>
                             @else
                             <td>{{ $products->view_count}}</td>
                             @endif

                             @if($products->item_status == "Available")
                             <td><strong style="color:green">{{ $products->item_status}}</strong></td>
                             @else
                             <td><strong style="color:red">{{ $products->item_status}}</strong></td>
                             @endif
                             
                               <td>

                               <form action="{{ $products->id }}/delete" method="POST">
                                  <a href="product/{{ $products->id}}" class="btn btn-info btn-xs"><i class="os-icon os-icon-external-link"></i></a>
                                  <a href="edit-product/{{ $products->id}}" class="btn btn-primary btn-xs" style="margin-left:0px;"><i class="os-icon os-icon-ui-49"></i></a>
                                  <!-- <a class="text-danger" href="#"><i class="os-icon os-icon-ui-15"></i></a></td>  -->

                                  {{-- @csrf
                                   @method('DELETE') --}} 
                    
                                   {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <input type="hidden" name="sno" value="{{ $products->id }}"/>
                                  <!-- <button type="button" class="btn btn-danger btn-xs"  data-target="#myModal{{$products->id}}" class="trigger-btn" data-toggle="modal"><i class="os-icon os-icon-ui-15"></i></button> -->
                                  @include('modals.delete_products_modal')
                                </form>
                                  </td>
                         </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


 


         @stop 