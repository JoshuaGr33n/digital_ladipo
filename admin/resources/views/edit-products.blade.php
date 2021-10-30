@extends('layout')
        @section('content') 
        @section('title', $Products->name)

        <style type="text/css">
     
h2 {
    margin: 50px 0
}

.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    max-width: 100%;
    padding: 25px;
    border: 1px dashed rgba(255, 255, 255, 0.4);
    border-radius: 3px;
    transition: .2s
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}
.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    widows: 100%;
    cursor: pointer;
    opacity: 0
}

.file-input2 {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    widows: 100%;
    cursor: pointer;
    opacity: 0
}


.file-inputSlider {
         position: absolute;
         left: 0;
         top: 0;
         height: 100%;
         widows: 100%;
         cursor: pointer;
         opacity: 0
     }
        </style>


   <script>
     $(document).on('change', '.file-input', function() {


var filesCount = $(this)[0].files.length;

var textbox = $(this).prev();

if (filesCount === 1) {
var fileName = $(this).val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' file selected');
}



if (typeof (FileReader) != "undefined") {
var dvPreview = $("#divImageMediaPreview");
dvPreview.html("");
$($(this)[0].files).each(function () {
var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
var img = $("<img />");
img.attr("style", "width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}


});
    </script>





<script>
     $(document).on('change', '.file-input2', function() {


var filesCount = $(this)[0].files.length;

var textbox = $(this).prev();

if (filesCount === 1) {
var fileName = $(this).val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' file selected');
}



if (typeof (FileReader) != "undefined") {
var dvPreview = $("#divImageMediaPreview2");
dvPreview.html("");
$($(this)[0].files).each(function () {
var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
var img = $("<img />");
img.attr("style", "width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}


});
    </script>




<script>
          $(document).on('change', '.file-inputSlider', function() {
     
     
     var filesCount = $(this)[0].files.length;
     
     var textbox = $(this).prev();
     
     if (filesCount === 1) {
     var fileName = $(this).val().split('\\').pop();
     textbox.text(fileName);
     } else {
     textbox.text(filesCount + ' file selected');
     }
     
     
     
     if (typeof (FileReader) != "undefined") {
     var dvPreview = $("#divImageMediaSliderPreview");
     dvPreview.html("");
     $($(this)[0].files).each(function () {
     var file = $(this);
     var reader = new FileReader();
     reader.onload = function (e) {
     var img = $("<img />");
     img.attr("style", "width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px; padding: 10px");
     img.attr("src", e.target.result);
     dvPreview.append(img);
     }
     reader.readAsDataURL(file[0]);
     });
     } else {
     alert("This browser does not support HTML5 FileReader.");
     }
     
     
     });
         </script>


<div class="col-sm-7" style="margin:auto">
    <div class="element-wrapper">
        <div class="element-box">
         @if ($message = Session::get('success'))
           <div class="alert alert-success">
              <p>{{ $message }}</p>
           </div>
          @endif


          @if ($delete_message = Session::get('delete_success'))
           <div class="alert alert-danger">
              <p>{{ $delete_message }}</p>
           </div>
          @endif

          @if ($duplicate_message = Session::get('duplicateERROR'))
           <div class="alert alert-danger">
              <p>{{ $duplicate_message }}</p>
           </div>
          @endif

                        @php 
                        use App\CategoriesModel;
                        use App\Brands;
                        @endphp
                     
            <form id="formValidate" enctype="multipart/form-data" method="Post" action="{{ asset($Products->id) }}/update">
              {{ csrf_field() }}
                <div class="element-info">
                    <div class="element-info-with-icon">
                        <div class="element-info-icon"><div class="os-icon os-icon-wallet-loaded"></div></div>
                        <div class="element-info-text">
                            <h5 class="element-inner-header">Edit Product<a class="mr-2 mb-2 btn btn-success btn-xs" href="{{url('products')}}" style="margin-left:300px">Back</a></h5>
                            <div class="element-inner-desc">
                             
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                 <div class="col-sm-6">
                 <?php if (!empty($Products->pic_1)){?>
                            <div class="product-image" id="divImageMediaPreview"><img alt="" src="{{ asset($Products->pic_1) }}" style="width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div>
                            <?php }else{?>
                                <div class="product-image" id="divImageMediaPreview"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div>
                        <?php }?>

                         <div class="file-drop-area"> <span class="choose-file-button"></span> <span class="file-message btn btn-success btn-xs">Select Image</span> <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" name="image1"> </div>
                 </div>
                 <div class="col-sm-6">
                         <?php if (!empty($Products->pic_2)){?>
                            <div class="product-image" id="divImageMediaPreview2"><img alt="" src="{{ asset($Products->pic_2) }}" style="width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div>
                            <?php }else{?>
                                <div class="product-image" id="divImageMediaPreview2"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div>
                        <?php }?>

                         <div class="file-drop-area"> <span class="choose-file-button"></span> <span class="file-message btn btn-success btn-xs">Select Image</span> <input type="file" class="file-input2" accept=".jfif,.jpg,.jpeg,.png,.gif" name="image2"> </div>
                
                
                 </div>
               </div>

                <div class="form-group">
                    <label for=""> Name</label><input class="form-control" data-error="Required" placeholder="" required="required" type="text"  name="name" value="{{$Products->name}}"/>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for=""> Main Category</label>
                    <select class="form-control select2 main"  id='main_cate' name='main_cate[]'>
                    @php $main_cat = CategoriesModel::find($Products->main_category_id);@endphp
                    <option value='{{ $main_cat->main_category_id }}' selected="true">{{ ucwords($main_cat->main_category) }}</option>
                    @foreach($mainCategoriesData['data'] as $mainCategory)
                    @if(!empty($mainCategory->main_category))
                    <option value='{{ $mainCategory->id }}'>{{ ucwords($mainCategory->main_category) }} </option>
                    @endif
                    @endforeach
                    </select>
                </div> 
                <div id="response">
                <!--Response will be inserted here-->
                  </div>
                <div class="form-group">
                    <label for=""> Parent Category</label>
                    <select class="form-control select2 parent"  id='second_cate' name='second_cate[]'>
                        @if(!empty($Products->second_category_id))
                        @php $second_cat = CategoriesModel::find($Products->second_category_id);@endphp
                        <option value='{{ $second_cat->second_category_id }}' selected="true">{{ $second_cat->second_category }}</option>
                        @endif     
                        
                        <option value='0'>-- Select --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""> Sub Category</label>
                    <select class="form-control select2"  id='third_cate' name='third_cate[]'>
                          @if(!empty($Products->third_category_id))
                        @php $third_cat = CategoriesModel::find($Products->third_category_id);@endphp
                        <option value='{{ $third_cat->third_category_id }}' selected="true">{{ $third_cat->third_category }}</option>
                        @endif   
                        <option value='0'>-- Select --</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                             <label for="">Car Brand</label>
                             <select class="form-control select2"  data-error="Required" placeholder="" required="required" name="car_brand">
                              @php $car_brand2 = Brands::find($Products->car_brand_id);@endphp
                              <option value='{{ $car_brand2->id }}' selected="true">{{ $car_brand2->name }}</option>
                               @foreach($car_brands as $car_brand)
                               <option value='{{$car_brand->id}}'>{{$car_brand->name}}</option>
                               @endforeach
                             </select>
                        </div>
                    </div>
                       <div class="col-sm-6">
                          <div class="form-group">
                             <label for="">Part Brand</label>
                             <select class="form-control select2"  data-error="Required" placeholder="" required="required" name="part_brand">
                             @php $part_brand2 = Brands::find($Products->part_brand_id);@endphp
                              <option value='{{ $part_brand2->id }}' selected="true">{{ $part_brand2->name }}</option>
                               @foreach($part_brands as $part_brand)
                               <option value='{{$part_brand->id}}'>{{$part_brand->name}}</option>
                               @endforeach
                             </select>
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="">Price</label><input class="form-control" data-error="Required" placeholder="" required="required" name="price" value="{{$Products->price}}"/>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="">Old Price</label><input class="form-control"  placeholder="" name="old_price" value="{{$Products->old_price}}"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="">Quantity</label><input class="form-control"  data-error="Required" placeholder="" required="required" name="quantity" value="{{$Products->quantity}}"/>
                        <div class="help-block form-text with-errors form-control-feedback"></div>  
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" style="height:200px" name="description" required="required" data-error="Required:: Place a description for this product">{{$Products->description}}</textarea>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>

                <fieldset class="form-group">
                    <legend><span>Featured section</span></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              @if($Products->slider =="Yes")
                                <label for=""> Slider </label><input type="checkbox" style="margin:8px;" name="slider" value="Yes" checked id="slider" onclick="myFunction()"/><br/>
                              @else
                              <label for=""> Slider </label><input type="checkbox" style="margin:8px;" name="slider" value="Yes" id="slider" onclick="myFunction()"/><br/>
                              @endif

                              <p id="text" style="display:none"><a data-target="#sliderModal" data-toggle="modal" role="button" class="btn btn-success" style="color:#fff; width:300px; margin-left:150px">Select</a></p>
                              
                              
                              @if($Products->featured =="Yes") 
                                <label for=""> Featured Products </label><input type="checkbox" style="margin:8px;" name="featured" value="Yes" checked/><br/>
                              @else 
                               <label for=""> Featured Products </label><input type="checkbox" style="margin:8px;" name="featured" value="Yes"/><br/>
                              @endif
                              
                              @if($Products->special_offer =="Yes")
                                <label for="">Special Offers </label><input type="checkbox" style="margin:8px;" name="special" value="Yes" checked/><br/>
                              @else 
                              <label for="">Special Offers </label><input type="checkbox" style="margin:8px;" name="special" value="Yes"/><br/> 
                              @endif
                              @if($Products->banner =="Yes")
                                <label for=""> Banner </label><input type="checkbox" style="margin:8px;" name="banner" value="Yes" checked/>
                              @else
                                <label for=""> Banner </label><input type="checkbox" style="margin:8px;" name="banner" value="Yes"/> 
                                @endif 
                            </div>
                        </div>
                    </div>
                </fieldset>
                @include('modals.edit_slider_pic_modal')
                <div class="form-buttons-w"><button class="btn btn-primary" type="submit" style="width:300px; margin-left:150px">Submit</button></div>
            </form>
        </div>
    </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script>
$(document).ready(function(){
    $("select.main").change(function(){
        var selectedCountry = $(".main option:selected").val();
        $.ajax({
            type: "POST",
            url: "getsec",
            data: { country : selectedCountry } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
});
</script>


<script>
function myFunction() {
  var checkBox = document.getElementById("slider");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

@stop  