<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Session;
use App\Http\Controllers\Controller;
use App\Page;
use App\View;
use App\Question;
use Carbon\Carbon;
use DB;
use Input;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::orderByRaw('RAND()')->take(1)->get();
        return view('questions.question', [
          'questions' => $questions,
        ]);
    }
    public function show($tag)
    {
        $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
        $client = new \Tmdb\Client($token, ['secure' => false]);
        $questions = Question::orderByRaw('RAND()')->take(1)->get();
        session(['ids'=>$tag]); // on stock l'id dans le tag
        session(['ids2'=>$tag]); // on stock l'id dans le tag

        // $nbPages = $client->getDiscoveryApi()->discoverMovies(['page' => 1, 'language' => 'fr', 'with_keywords' => $ids])['total_pages'];
        // $PageNum = 1;
        // do{
        //   $responseOu = $client->getDiscoveryApi()->discoverMovies(['page' => $PageNum, 'language' => 'fr', 'with_keywords' => $ids]);
        //
        //   foreach($responseOu['results'] as $key => $value){
        //         $tabResultsOr[] = $value;
        //   }
        //   $PageNum++
        // }
        // while($PageNum <= $nbPages);

        $response = $client->getDiscoverApi()->discoverMovies([
            'page' => 1,
            'language' => 'fr',
            'with_keywords' => $tag,
        ]);
        $responses=array();
        foreach($response['results'] as $key => $value){
            $inMarkview = View::where('movie_id', '=' , $value['id'])->whereUserId(\Auth::id())->first();
            if(is_null($inMarkview)){
              $responses[$key] = $value;
            }
        }
        return view('questions/question2', [
            'response' => $responses,
            'questions' => $questions,
        ]);
    }
    public function showDeux($tag)
    {
        $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
        $client = new \Tmdb\Client($token, ['secure' => false]);
        $questions = Question::orderByRaw('RAND()')->take(1)->get();

        // $request = (!empty($requestEt))?$requestEt:$requestOu;

        $ids = session('ids'); // on récupère l'id
        $ids.='|'.$tag;
        session(['ids'=>$ids]); // on stock l'id

        $requestOu = array(
          'page' => 1,
          'language' => 'fr',
          'sort_by' => 'popularity.desc',
          'with_keywords' => $ids,
        );

        $responseOu = $client->getDiscoverApi()->discoverMovies(
            $requestOu
        );

        $and = session('ids2');
        $and.=','.$tag;
        session(['ids2'=>$and]);

        $requestEt = array(
          'page' => 1,
          'language' => 'fr',
          'sort_by' => 'popularity.desc',
          'with_keywords' => $and,
        );

        $responseEt = $client->getDiscoverApi()->discoverMovies(
            $requestEt
        );

        return view('questions/question3', [
            'responseEt' => $responseEt,
            'responseOu' => $responseOu,
            'questions' => $questions,
        ]);
    }
    public function showTrois($tag)
    {
      $token  = new \Tmdb\ApiToken('579fa093874ff0018a90f6279b579e86');
      $client = new \Tmdb\Client($token, ['secure' => false]);
      $questions = Question::orderByRaw('RAND()')->take(1)->get();

      // Récupérer tous les films avec un tag
      $ids = session('ids'); // on récupère l'id
      $ids.='|'.$tag;
      session(['ids'=>$ids]); // on stock l'id
      $responseOu = $client->getDiscoverApi()->discoverMovies([
          'page' => 1,
          'language' => 'fr',
          'with_keywords' => $ids,
      ]);


      // Récupérer tous les films avec tous les tags
      $and = session('ids2');
      $and.=','.$tag;
      session(['ids2'=>$and]);
      $responseEt = $client->getDiscoverApi()->discoverMovies([
          'page' => 1,
          'language' => 'fr',
          'with_keywords' => $and,
      ]);

      // Récupérer tous les films avec au deux tags sur trois
      $minDeux = session('ids2');
      $minDeux = explode(',', $minDeux);

      $minZU = $minDeux[0].','.$minDeux[1];
      $minZD = $minDeux[1].','.$minDeux[2];
      $minDU = $minDeux[2].','.$minDeux[0];

      $responseZU = $client->getDiscoverApi()->discoverMovies([
          'page' => 1,
          'language' => 'fr',
          'with_keywords' => $minZU,
      ]);
      $responseZD = $client->getDiscoverApi()->discoverMovies([
          'page' => 1,
          'language' => 'fr',
          'with_keywords' => $minZD,
      ]);
      $responseDU = $client->getDiscoverApi()->discoverMovies([
          'page' => 1,
          'language' => 'fr',
          'with_keywords' => $minDU,
      ]);

      $resultats = array_merge($responseEt, ["---"], $responseZU, $responseZD, $responseDU, ["---"], $responseOu);

      return view('questions/question4', [
          'questions' => $questions,
          'resultats' => $resultats,
      ]);
    }
}
