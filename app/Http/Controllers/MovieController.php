<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Favorite;
use App\Tag;
use DB;
use App\View;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{

    public function show($id)
    {
      $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
      $client = new \Tmdb\Client($token, ['secure' => false]);
      $movie = $client->getMoviesApi()->getMovie($id, array('language' => 'fr'));
      $credits = $client->getMoviesApi()->getCredits($id);
      $images = $client->getMoviesApi()->getImages($id);
      $keywords = $client->getMoviesApi()->getKeywords($id);
      $similar = $client->getMoviesApi()->getSimilar($id);
      $response = $client->getDiscoverApi()->discoverMovies([
          'page' => 1,
          'language' => 'fr',
      ]);

      foreach($keywords['keywords'] as $key => $keyword)
      {
        $kid = $keyword['id'];
        $kname = $keyword['name'];
        $kexist = Tag::where('tag_id', '=', $kid)->where('tag_name', '=', $kname)->first();
        if(!$kexist){
          $tag = DB::table('tags')->insert([
            ['tag_id' => $kid,
            'tag_name' => $kname]
          ]);
        }
      }

      $trailers = $client->getMoviesApi()->getTrailers($id);
      $favoris_exist = Favorite::where('movie_id', '=', $id)->whereUserId(\Auth::id())->first();
      $view_exist = View::where('movie_id', '=', $id)->whereUserId(\Auth::id())->first();
      return view('movies/movie', [
          'movie' => $movie,
          'credits' => $credits,
          'images' => $images,
          'response' => $response,
          'trailers' => $trailers,
          'favoris_exist' => $favoris_exist,
          'view_exist' => $view_exist,
          'keywords' => $keywords,
          'similar' => $similar,
      ]);
    }
}
