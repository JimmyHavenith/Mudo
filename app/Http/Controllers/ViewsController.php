<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use Session;
use App\User;
use App\View;
use App\Movies;
use Flash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class ViewsController extends Controller
{
      /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */

      public function index(Request $request)
      {
        if(\Auth::check()){
          $views = \Auth::user()->views()->get();
        }else{
          return view('auth/login');
        }
        return view('markview.markview', compact('views'));
      }
      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */

      public function store(Request $request)
      {
       $view = new App\View($request->all());
       $view->user_id = \Auth::id();
       $view->movie_id = $request->input('movie_id');
       $existing_view = View::where('movie_id', '=' ,$view->movie_id)->whereUserId(\Auth::id())->first();

       if($existing_view) {
          $existing_view->delete();
          Flash::overlay('Le film a bien été supprimé de ta markview !', 'Film supprimé');
          return redirect()->back();
       }else{
          $view->save();
          Flash::overlay('Le film a bien été ajouté à ta markview !', 'Film ajouté');
          return redirect()->back();
       }
     }
}
