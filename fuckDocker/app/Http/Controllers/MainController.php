<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{

   public function home(){
       $reviews = new Contact();
      // $reviews = reviews::orderByDesc('id')->orderByRaw('id = 1', 'ASC')->Paginate(20);  take(5) ->get()
       return view('home', ['reviews'=>$reviews->orderBy('id','desc')->Paginate(3)]); // обращение к объуекту в БД
   }

    public function about(){
        return view('about');
    }
    public function review(){
        return view('review');
    }
    public function editnews($id){
        $reviews = new Contact();
        return view('editnews', ['reviews'=>$reviews->all()], ['id'=>$id]); // обращение к объуекту в БД
    }
    public function mynews(){
        $reviews = new Contact();
        return view('mynews', ['reviews'=>$reviews->all()]); // обращение к объуекту в БД
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
        $review->idowner = Auth::id();

        $review->save();
        //php artisan migrate
        return redirect('/mynews');  //ларавел 8!!
    }
    public function review_edit(Request $request){
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500'
        ]);

        $idedit = $request->input('idnews'); //TODO проверка что это тот кользователь, который владеет новостью

        DB::table('contacts')
            ->where('id', $idedit)
            ->update(['message'=> $request->input('message'),
                'email'=> $request->input('email'),
                'subject'=> $request->input('subject')]);

        //php artisan migrate
        return redirect('/mynews');  //ларавел 8!! редирет
    }

    public function review_delete(Request $request){

        $idedit = $request->input('idnews'); //TODO проверка что это тот кользователь, который владеет новостью

        DB::table('contacts')
            ->where('id', $idedit)->delete();

        //php artisan migrate
        return redirect('/mynews');  //ларавел 8!! редирет
    }
}
