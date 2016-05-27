<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use App\Discover;
use Carbon\Carbon;
use Session;
use App\Tag;
use App\View;
use App\User;
use Form;
use DB;
use Input;

class SearchController extends Controller
{
    public function index(request $request){

      return view('layout');
    }

    public function store(){
      $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
      $client = new \Tmdb\Client($token, ['secure' => false]);

      $word = Input::get('search-word');
      $search = $client->getSearchApi()->searchMulti($word);
      return view('pages.searchs', [
        'searchs' => $search,
        'word' => $word,
      ]);
    }
}
