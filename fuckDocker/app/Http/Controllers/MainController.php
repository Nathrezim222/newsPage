<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
   public function home(){
       $reviews = new Contact();
       return view('home', ['reviews'=>$reviews->all()]); // обращение к объуекту в БД
   }

    public function about(){
        return view('about');
    }
    public function review(){
        return view('review');
    }
    public function review_check(Request $request){
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500'
        ]);

        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect('/review');  //ларавел 8!!
    }
}
