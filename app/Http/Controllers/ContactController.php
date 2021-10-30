<?php 

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Contact; 
use Mail; 

class ContactController extends Controller { 

     

     public function saveContact(Request $request) { 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required|min:11|max:11|regex:/(0)[0-9]{10}/',
            'message' => 'required'
        ]);

      

        \Mail::send('message',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'phone' => $request->get('phone'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('joshua@doshservices.com');
                  $message->subject('Message from Digital Ladipo');
               });

          return back()->with('success', 'Thank you for contacting us!');
        // return response()->json(['success' => true]);

    }
}