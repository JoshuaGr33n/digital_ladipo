
        @extends('layout')
        @section('content') 
        @section('title', 'Car Brands')




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
    


     .file-input2 {
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


<div   style="margin:auto;" width="40%">
    <div class="element-wrapper">
        <h6 class="element-header">Car Brands </h6>
        <div class="element-box">
            <h5 class="form-header">Car Brands <button class="mr-2 mb-2 btn btn-success" type="button" style="margin-left:400px" data-toggle="modal" data-target="#ModalAdd">Add Brand+</button></h5>
            <div class="form-desc">

            


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

          @if ($success_message = Session::get('success'))
           <div class="alert alert-success">
              <p>{{ $success_message }}</p>
           </div>
          @endif


          @if ($edit_success_message = Session::get('update_success'))
           <div class="alert alert-success">
              <p>{{ $edit_success_message }}</p>
           </div>
          @endif

            
                
            </div>
            <div class="table-responsive">
                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Brand</th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Brand</th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                   
                    <tbody>
                        @foreach($car_brands as $brand)
                        <tr>
                            <td>{{ ++$i }}</td>
                            @if (!empty($brand->logo))
                                <td><div class="product-image"><img alt="" src="{{ asset($brand->logo) }}" style="width:80px; height:70px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div></td>
                            @else
                                <td><div class="product-image"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:80px; height:70px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div></td>
                            @endif
                            <td>{{ ucfirst($brand->name) }} </td>
                            <!-- replace " " with - -->
                           
                            <!-- replace " " with - -->
                            <td></td>
                          <td>

                                 <form action="edit-car-brand/{{ $brand->id }}" method="POST" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                   {{ method_field('PATCH') }}
                                  <button type="button" class="btn btn-success btn-xs" style="margin-left:0px" data-target="#myModal{{ $brand->id }}" class="trigger-btn" data-toggle="modal"><i class="os-icon os-icon-ui-49"></i></button>
                                  @include('modals.edit_brands_modal')
                                  </form>
                                  </td>
                                  <td> 
                                      
                                        @php 
                                         $check_products = DB::select("SELECT * FROM products WHERE car_brand_id like '%$brand->id%'");
                                        @endphp
                                      
                                  <form action="delete-car-brand/{{ $brand->id }}" method="POST">
                                  {{-- @csrf
                                   @method('DELETE') --}} 
                    
                                   {{ csrf_field() }}
                                  {{ method_field('DELETE') }}

                                  <!-- <input type="hidden" name="sno" value="{{ $brand->id }}"/> -->
                                
                                @if(count($check_products)==0)
                                  <button type="button" class="btn btn-danger btn-xs"  data-target="#deleteModal{{$brand->id}}" class="trigger-btn" data-toggle="modal"><i class="os-icon os-icon-ui-15"></i></button>
                                @endif
                               
                                  <!-- Delete Modal HTML -->

<div id="deleteModal{{$brand->id}}" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">X</i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete this record? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
              
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
                 
			</div>
		</div>
	</div>
</div> 

<!-- Delete Modal HTML -->
                                 
                                  </form>
                                </td> 
                        </tr>
                       
                       
                        
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 <!-- Modal HTML Markup -->
 <div id="ModalAdd" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add Car Brand</h1>
            </div>
            <div class="modal-body">


             @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                    @endforeach
              </ul>
              </div>
               @endif
                <form  method="POST" action="add-car-brand"  class="btn-submit" id="formValidate" enctype="multipart/form-data">
                {{ csrf_field() }}
                   
                    <div class="form-group">
                        <label class="control-label">Brand Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="brand_name"  value="" data-error="Required"  required="required">
                            <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                    </div>

                    <div class="row" style="margin-left:70px">
                      <div class="col-sm-6">
                        
                                <div class="product-image" id="divImageMediaPreview"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div>
                       

                         <div class="file-drop-area"> <span class="choose-file-button"></span> <span class="file-message btn btn-success btn-xs">Select</span> <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" name="image1"> </div>
                     </div>
                
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <button class="btn btn-success btn-xs" style="width:450px; height:40px">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<!-- <script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#ModalAdd').on('click','.btn-submit',function(e){

        e.preventDefault();

        var category_name = $("input[name=category_name]").val();
        var url = '{{ url('store_category') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
            category:category_name, 
                 
                },
           success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});

</script> -->
         @stop 