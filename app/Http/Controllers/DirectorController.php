<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DirectorController extends Controller
{

    public function show($id)
    {
      $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
      $client = new \Tmdb\Client($token, ['secure' => false]);
      $person = $client->getPeopleApi()->getPerson($id, array('language' => 'fr'));
      $credits = $client->getPeopleApi()->getMovieCredits($id);
      return view('persons/director', [
          'person' => $person,
          'credits' => $credits,
      ]);
    }

}
