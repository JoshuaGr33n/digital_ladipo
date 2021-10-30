
   @extends('layout')
   @section('title', 'Contact Us')
   @section('content') 
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--contact map start-->
<!-- <div class="contact_map mt-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="map-area">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--contact map end-->

<!--contact area start-->
<div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    <h3>contact us</h3>
                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                    <ul>
                        <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 Ladipo Lagos State</li>
                        <li><i class="fa fa-phone"></i> <a href="#">Infor@roadthemes.com</a></li>
                        <li><i class="fa fa-envelope-o"></i><a href="tel:0(1234)567890">0 (1234) 567 890</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact_message form">
                    <h3>Send us a message</h3>
                    @if(Session::has('success'))
                         <div class="alert alert-success">
        	        {{ Session::get('success') }}
                          </div>
                        @endif
                      
                    <form method="POST" action="{{url('contact-send')}}" >
                    {{csrf_field()}}
                        <p>
                            <label> Your Name (required)</label>
                            <input name="name" id="name" placeholder="Name *" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            <!-- <div class="text-danger error" data-error="name"></div> -->
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </p>
                        <p>
                            <label> Your Email (required)</label>
                            <input name="email" id="email" placeholder="Email *" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            <!-- <div class="text-danger error" data-error="email"></div> -->
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </p>

                        <p>
                            <label> Your Phone Number (required)</label>
                            <input name="phone" placeholder="Phone *" type="number" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                                   @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </p>
                        <p>
                            <label> Subject</label>
                            <input name="subject" placeholder="Subject *" type="text" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            
                        </p>
                        <div class="contact_textarea">
                            <label> Your Message</label>
                            <textarea placeholder="Message *" name="message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>
                        <button type="submit"> Send</button>
                       
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->
<!-- <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script> -->
<script src="{{ asset('public/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
<script>
    $('#store-user').on('submit', function(e){
    e.preventDefault();
    $('.error').html('');
    $.ajax({
     url: $(this).attr('action'),
     method: $(this).attr('method'),
     data: $(this).serialize(),
     dataType: 'json',
     success(response)
     {
       console.log('User created successfully.');
       //Do whatever you want here … 
     },
     error(error)
     {
       let errors = error.responseJSON.errors
       for(let key in errors)
       {
         let errorDiv = $(`.error[data-error="${key}"]`);
         if(errorDiv.length )
         {
             errorDiv.text(errors[key][0]);
         }
        }
     }
  });
});
    </script>
@stop
