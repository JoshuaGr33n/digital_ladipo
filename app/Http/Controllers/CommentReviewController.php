<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\AuthAccessAuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Http\Request;
use Session;
use Mail;

use App\Products;
use App\CommentReview;
use View;
use Input;
use Redirect;
use Auth;
use App\OrdersModel;
use DB;

class CommentReviewController extends Controller
{
    

    // public function cart()
    // {
    //     return view('cart');
    // }
    public function addComment($id, Request $request)
    {
        $product =  Products::find($id);

        $comment = $request->comment;

        if(!$product) {

            abort(404);

        }

       

        $this->validate($request, [
            'comment' => 'required'
            
        ]);
        

        $add_comment = CommentReview::create([
    
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'comment' => $comment,
           
        ]);
        
        session()->put('product_id', $product->id);
        $html = view('_comment')->render();
        $html_tab_panel = view('_comment_tab_panel')->render();

        return response()->json(['msg' => 'Comment added!', 'data' => $html, 'tab_panel' => $html_tab_panel]);

     
    }

   
}