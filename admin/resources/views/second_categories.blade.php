
        @extends('layout')
        @section('content') 
        @section('title', 'Menu Categories')

     <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" /> -->



<div   style="margin:auto;" width="40%">
    <div class="element-wrapper">
        <h6 class="element-header">{{$mainCat->main_category}}<a href="categories" class="mr-2 mb-2 btn btn-warning"  style="margin-left:500px">Back</a></h6>
        <div class="element-box">
            <h5 class="form-header">Categories/{{$mainCat->main_category}}<button class="mr-2 mb-2 btn btn-success" type="button" style="margin-left:300px" data-toggle="modal" data-target="#ModalAdd">Add Category+</button></h5>
            <div class="form-desc">

            


            @if ($delete_message = Session::get('delete_success'))
           <div class="alert alert-danger">
              <p>{{ $delete_message }}</p>
           </div>
          @endif

          @if ($duplicate_message = Session::get('duplicate_err'))
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
                            <th>Category</th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                   
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ ucwords($category->second_category) }} </td>
                         <td><a href="{{str_replace(' ','-',$mainCat->main_category)}}/{{str_replace(' ','-',$category->second_category)}}" class="btn btn-primary btn-sm" style="color:#fff"><i class="os-icon os-icon-external-link"></i></a> </td>
                          <td>

                                 <form action="update_second_category" method="POST">
                                   {{ csrf_field() }}
                                   {{ method_field('PATCH') }}

                                 

                                  <button type="button" class="btn btn-success btn-xs" style="margin-left:0px" data-target="#myModal{{ $category->id }}" class="trigger-btn" data-toggle="modal"><i class="os-icon os-icon-ui-49"></i></button>
                                  @include('modals.edit_second_category_modal')
                                  </form>
                                  </td>
                                  <td> 
                                  <?php 
                                      $check_category = DB::select("SELECT * FROM categories WHERE second_category_id='$category->id'");

                                    //   $check_category = DB::select("SELECT * FROM sekai_menu WHERE category like '%$category->main_category%'");
                                      ?>

                                    @php 
                                    $check_products = DB::select("SELECT * FROM products WHERE second_category_id like '%$category->id%'");
                                    @endphp
                                      
                                  <form action="delete_second_category" method="POST">
                                  {{-- @csrf
                                   @method('DELETE') --}} 
                    
                                   {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <input type="hidden" name="sno" value="{{ $category->id }}"/>
                                  <input type="hidden" value="{{$mainCat->main_category}}" name="main_category">
                                  @if(count($check_category)==0)
                                  @if(count($check_products)==0)
                                  <button type="button" class="btn btn-danger btn-xs"  data-target="#deleteModal{{$category->id}}" class="trigger-btn" data-toggle="modal"><i class="os-icon os-icon-ui-15"></i></button>
                                  @endif
                                  @endif
                                  <!-- Delete Modal HTML -->

<div id="deleteModal{{$category->id}}" class="modal fade">
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
                <h1 class="modal-title">Add Category</h1>
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
                <form  method="POST" action="{{$mainCat->main_category}}/post"  class="btn-submit" id="formValidate">
                {{ csrf_field() }}
                 
               
                    <div class="form-group">
                        <label class="control-label">Category Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="category_name"  value="" data-error="Required"  required="required">
                            <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                    </div>
                    <input type="hidden" value="{{$mainCat->main_category}}" name="main_category">
                    
                    <div class="form-group">
                        <div>
                            <button class="btn btn-success btn-xs" style="width:450px; height:40px">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



         @stop 