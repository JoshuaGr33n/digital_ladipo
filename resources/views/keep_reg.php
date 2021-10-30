 <!--register area start-->
         

 <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Register</h2>
                    @if(Session::has('success'))
                <div class="alert alert-success">
                     {{ Session::get('success') }}
                  </div>
                     @endif
                     @if(Session::has('email_duplicate_error'))
                   <div class="alert alert-danger">
                     {{ Session::get('email_duplicate_error') }}
                  </div>
                     @endif
                     @if(Session::has('phone_duplicate_error'))
                   <div class="alert alert-danger">
                     {{ Session::get('phone_duplicate_error') }}
                  </div>
                     @endif

                     @if(Session::has('phone_email_duplicate_error'))
                   <div class="alert alert-danger">
                     {{ Session::get('phone_email_duplicate_error') }}
                  </div>
                     @endif

                    <form action="create-account" method="post">
                    {{csrf_field()}}
                        <div class="input-radio">
                        <span class="custom-radio"><input type="radio" value="M" name="gender"> Male</span>
                        <span class="custom-radio"><input type="radio" value="F" name="gender"> Female</span>
                        </div> <br>
                         <label>First Name <span>*</span></label>
                         <input type="text" name="fname">
                         <label>Last Name <span>*</span></label>
                         <input type="text" name="lname">
                         <p>
                            <label>Phone <span>*</span></label>
                            <input type="text" name="phone">
                        </p>
                        <p>
                            <label>Email address <span>*</span></label>
                            <input type="text" name="email">
                        </p>
                        <p>
                            <label>Retype Email address <span>*</span></label>
                            <input type="text" name="retype_email">
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password">
                        </p>
                        <p>
                            <label> Retype Passwords <span>*</span></label>
                            <input type="password" name="retype_password">
                        </p>
                        <div class="login_submit">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->

























            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Register</h2>
                    @if(Session::has('success'))
                <div class="alert alert-success">
                     {{ Session::get('success') }}
                  </div>
                     @endif
                     @if(Session::has('email_duplicate_error'))
                   <div class="alert alert-danger">
                     {{ Session::get('email_duplicate_error') }}
                  </div>
                     @endif
                     @if(Session::has('phone_duplicate_error'))
                   <div class="alert alert-danger">
                     {{ Session::get('phone_duplicate_error') }}
                  </div>
                     @endif

                     @if(Session::has('phone_email_duplicate_error'))
                   <div class="alert alert-danger">
                     {{ Session::get('phone_email_duplicate_error') }}
                  </div>
                     @endif

                     <form id="contact_us" method="post" action="javascript:void(0)">
                    {{csrf_field()}}
                        <div class="input-radio">
                        <span class="custom-radio"><input type="radio" value="M" name="gender"> Male</span>
                        <span class="custom-radio"><input type="radio" value="F" name="gender"> Female</span>
                        </div> <br>
                         <label>First Name <span>*</span></label>
                         <input type="text" name="fname">
                         <p><span class="text-danger">{{ $errors->first('fname') }}</span> </p>
                         <label>Last Name <span>*</span></label>
                         <input type="text" name="lname">
                         <p>
                            <label>Phone <span>*</span></label>
                            <input type="text" name="phone">
                        </p>
                        <p>
                            <label>Email address <span>*</span></label>
                            <input type="text" name="email">
                        </p>
                        <p>
                            <label>Retype Email address <span>*</span></label>
                            <input type="text" name="retype_email">
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password">
                        </p>
                        <p>
                            <label> Retype Passwords <span>*</span></label>
                            <input type="password" name="retype_password">
                        </p>
                         <div class="alert alert-success d-none" id="msg_div">
                             <span id="res_message"></span>
                         </div>
                        <div class="login_submit">
                            <button type="submit" id="send_form">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->