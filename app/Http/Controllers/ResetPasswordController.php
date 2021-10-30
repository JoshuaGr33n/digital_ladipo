<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use Mail; 
use Illuminate\Support\Str;
use App\User; 
use Hash;
use Auth;
use Redirect;

class ResetPasswordController extends Controller
{
  public function forgot_password()
  {
         if (Auth::check()) {
             return Redirect::to('login');
         }
     return view('forgot-password.forgot-password');
  }

 public function forgot_password_process(Request $request)
  {
    $messages = [

        'email.exists' => 'Wrong Email',
        'email.email' => 'Invalid Email',
    ];
    $request->validate([
        'email' => 'required|email|exists:users',
    ],$messages);

    // $token = str_random(64);
    $token = Str::random(64);

      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );
    
      Mail::send('forgot-password.reset-password-message', ['token' => $token, 'email' => $request->email], function($message) use($request){
          $message->to($request->email);
          $message->from($request->email);
          $message->subject('Reset Password Notification from Digital Ladipo');
      });

      return back()->with('success_message', 'We have e-mailed your password reset link!');
  }







  public function getPassword($email,$token) {

    if (Auth::check()) {
        return Redirect::to('login');
    }

    $check = DB::table('password_resets')
                      ->where(['token' => $token])
                      ->first();

                      if(!$check){
                        return redirect('login');

                      }

                      if(empty($email)){
                        return redirect('login');
                      }
                      if(empty($token)){
                        return redirect('login');
                      }


     return view('forgot-password.reset-password', ['token' => $token,'email' => $email]);
  }

  public function resetPasswordProcess(Request $request)
  {

  $request->validate([
      'email' => 'required|email|exists:users',
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required',

  ]);

  $updatePassword = DB::table('password_resets')
                      ->where(['email' => $request->email, 'token' => $request->token])
                      ->first();

  if(!$updatePassword)
      return back()->withInput()->with('error', 'Invalid token!');

    $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    return redirect('login')->with('password_reset_success', 'Password Reset Successful!');

  }
}
