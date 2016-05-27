<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use Session;
use App\User;
use App\Favorite;
use App\Movies;
use Flash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FavoritesController extends Controller
{
      /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */

      public function index(Request $request)
      {
        if(\Auth::check()){
          $favorites = \Auth::user()->favorites()->get();
        }else{
          return view('auth/login');
        }
        return view('watchlist.watchlist', compact('favorites'));
      }
      /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */

      public function store(Request $request)
      {
       $favorite = new App\Favorite($request->all());
       $favorite->user_id = \Auth::id();
       $favorite->movie_id = $request->input('movie_id');
       $existing_fav = Favorite::where('movie_id', '=' ,$favorite->movie_id)->whereUserId(\Auth::id())->first();

       if($existing_fav) {
         $existing_fav->delete();
         Flash::overlay('Le film a bien été supprimé de ta watchlist !', 'Film supprimé');
         return redirect()->back();
       }else{
          $favorite->save();
          Flash::overlay('Le film a bien été ajouté à ta watchlist !', 'Film ajouté');
          return redirect()->back();
       }
     }
}
