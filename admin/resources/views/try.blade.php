@extends('layout')
        @section('content') 
        @section('title', 'Add Product')

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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <form id="formValidate" enctype="multipart/form-data" method="Post" action="storeProducts">
              {{ csrf_field() }}
                <div class="element-info">
                    <div class="element-info-with-icon">
                        <div class="element-info-icon"><div class="os-icon os-icon-wallet-loaded"></div></div>
                        <div class="element-info-text">
                            <h5 class="element-inner-header">Add Product Try</h5>
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
                    <label for=""> Name</label><input class="form-control" data-error="Required" placeholder="" required="required" type="text"  name="name"/>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for=""> Main Category</label>
                    <select class="form-control select2" multiple="true" id='main_cate' name='main_cate[]'>
                    @foreach($mainCategoriesData['data'] as $mainCategory)
                    @if(!empty($mainCategory->main_category))
                    <option value='{{ $mainCategory->id }}' data-id="{{ $mainCategory->id }}">{{$mainCategory->main_category }} </option>
                    @endif
                    @endforeach
                    </select>
                    
                </div> 
                <div class="form-group">
                    <label for=""> Parent Category</label>
                    <select class="form-control select2" multiple="true" id='second_cate' name='second_cate[]'>
                        <option value='0'>-- Select Employee --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""> Sub Category</label>
                    <select class="form-control select2" multiple="true" id='third_cate' name='third_cate[]'>
                        <option value='0'>-- Select Employee --</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">Price</label><input class="form-control" data-error="Required" placeholder="" required="required" name="price" />
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">Old Price</label><input class="form-control"  placeholder="" name="old_price" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" style="height:200px" name="description" required="required" data-error="Required:: Place a description for this product"></textarea>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>

                <fieldset class="form-group">
                    <legend><span>Featured section</span></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for=""> Add to Slider </label><input type="checkbox" style="margin:8px;" name="slider" value="Yes" id="slider" onclick="myFunction()"/><p id="text" style="display:none"><a data-target="#sliderModal" data-toggle="modal" role="button" class="btn btn-success" style="color:#fff; width:300px; margin-left:150px">Select</a></p><br/>
                                <label for=""> Add to Featured Products </label><input type="checkbox" style="margin:8px;" name="featured" value="Yes"/><br/>
                                <label for=""> Add to Special Offers </label><input type="checkbox" style="margin:8px;" name="special" value="Yes" /><br/>
                                <label for=""> Add to Banner </label><input type="checkbox" style="margin:8px;" name="banner" value="Yes"/>
                            </div>
                        </div>
                    </div>
                </fieldset>
                @include('modals.add_slider_pic_modal')
                <div class="form-buttons-w"><button class="btn btn-primary" type="submit" style="width:300px; margin-left:150px">Submit</button></div>
            </form>
        </div>
    </div>
 </div>
 

 <!-- Script -->
 <script type='text/javascript'>

$(document).ready(function(){

  // Department Change
  $('#main_cate').change(function(){

     // Department id
     var id = $(this).val();

     // Empty the dropdown
     $('#second_cate').find('option').not(':first').remove();

     // AJAX request 
     $.ajax({
       url: 'secondCategories/'+id,
       type: 'get',
       dataType: 'json',
       success: function(response){

         var len = 0;
         if(response['data'] != null){
           len = response['data'].length;
         }

         if(len > 0){
           // Read data and create <option >
           for(var i=0; i<len; i++){

             var id = response['data'][i].id;
             var second_category = response['data'][i].second_category;

             var option = "<option value='"+id+"'>"+second_category+"</option>"; 

             $("#second_cate").append(option); 
           }
         }

       }
    });
  });

});

</script>


<!-- Script -->
<script type='text/javascript'>

$(document).ready(function(){

  // Department Change
  $('#second_cate').change(function(){

     // Department id
     var id = $(this).val();

     // Empty the dropdown
     $('#third_cate').find('option').not(':first').remove();

     // AJAX request 
     $.ajax({
       url: 'thirdCategories/'+id,
       type: 'get',
       dataType: 'json',
       success: function(response){

         var len = 0;
         if(response['data'] != null){
           len = response['data'].length;
         }

         if(len > 0){
           // Read data and create <option >
           for(var i=0; i<len; i++){

             var id = response['data'][i].id;
             var third_category = response['data'][i].third_category;

             var option = "<option value='"+id+"'>"+third_category+"</option>"; 

             $("#third_cate").append(option); 
           }
         }

       }
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