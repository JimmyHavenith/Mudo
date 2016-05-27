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

class DiscoversController extends Controller
{

    public function index(request $request)
    {
      if(\Auth::check()){
        $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
        $client = new \Tmdb\Client($token, ['secure' => false]);
        $annees = array(0 => 'Aucune date');
        for($i = date('Y'); $i >= 1900; $i--)
        {
          $annees[$i] = $i;
        }
        $genres = $client->getGenresApi()->getGenres([
          'language' => 'fr',
        ]);
        $keywords = DB::table('tags')->orderBy('tag_name', 'asc')->get();
        $select = array();
        foreach($genres['genres'] as $key => $genre)
        {
          $select[$genre['id']] = $genre['name'];
        }
        $selectTags = array();
        foreach($keywords as $key => $keyword)
        {
          $selectTags[$keyword->tag_id] = $keyword->tag_name;
        }
        return view('discovers.discover', [
          'genres' => $genres,
          'selectData' => $select,
          'annees' => $annees,
          'selectTags' => $selectTags,
        ]);
      }else{
        return view('auth/login');
      }
    }

    public function store()
    {
      $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
      $client = new \Tmdb\Client($token, ['secure' => false]);
      $year = Input::get('primary_release_date');
      $sortby = Input::get('discover-sortby-select');
      $genre = Input::get('discover-with_genres-select');
      $keywords = Input::get('discover-with_tags-select');

      $request = array(
        'page' => 1,
        'language' => 'fr',
        'sort_by' => $sortby,
      );

      if(is_array($genre)){
        $request['with_genres'] = implode(',', Input::get('discover-with_genres-select'));
      }
      if(is_array($keywords)){
        $request['with_keywords'] = implode(',', Input::get('discover-with_tags-select'));
      }
      if($year != '0'){
        $request['year'] = $year;
      }
      $discover = $client->getDiscoverApi()->discoverMovies($request);

      //Ne plus l'afficher si le film est dans la markview
      $discovers = array();
      foreach($discover['results'] as $key => $value){
        $inMarkview = View::where('movie_id', '=' , $value['id'])->whereUserId(\Auth::id())->first();
        if(is_null($inMarkview)){
          $discovers[$key] = $value;
        }
      }

      return view('discovers.discovers', [
        'discover' => $discovers,
      ]);
    }
}
