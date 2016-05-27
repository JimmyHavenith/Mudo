<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Favorite;
use App\Tag;
use DB;
use App\View;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{

    public function show($id, $slug)
    {
      $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
      $client = new \Tmdb\Client($token, ['secure' => false]);
      $genre = $client->getGenresApi()->getMovies($id, array('language' => 'fr'));
      $genreName = $client->getGenresApi()->getGenre($id, array('language' => 'fr'));
      return view('movies/genre', [
        'genres' => $genre,
        'name' => $genreName,
      ]);
    }
}
