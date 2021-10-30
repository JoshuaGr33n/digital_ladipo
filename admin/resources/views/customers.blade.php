
        @extends('layout')
        @section('content') 
        @section('title', 'Customers')


<div class="content-box">
    <div class="element-wrapper">
        <h6 class="element-header">Customers</h6>
        <div class="element-box">
            <h5 class="form-header">Customers</h5>
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
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                            
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                   
                    <tbody>
                        @foreach ($customers as $customers)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $customers->fname }} {{ $customers->lname }}</td>
                            <td>{{ $customers->gender }}</td>
                            <td>{{ $customers->email }}</td>
                            
                            <td>{{ $customers->phone }}</td>
                            
                          <td>

                              <form action="" method="POST">
                          
                                  <!-- <a href="details.html" class="btn btn-info btn-xs"><i class="os-icon os-icon-external-link"></i></a> -->
                                  {{-- @csrf
                                   @method('DELETE') --}} 
                    
                                   {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button type="button" class="btn btn-danger btn-xs" style="margin-left:0px" data-target="#myModal{{$customers->id}}" class="trigger-btn" data-toggle="modal"><i class="os-icon os-icon-ui-15"></i></button>
                                  @include('modals.customers_delete_modal')
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