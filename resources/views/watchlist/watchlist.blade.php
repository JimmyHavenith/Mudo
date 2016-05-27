@extends ('layout')
@section('title', 'Watchlist' )
@section('mainContent')
@include('flash::message')
  <div class="page-watchlist-title">
    <div class="movie-favorites container">
      <h2 class="col-md-6"><span class="fav-title">Ma Watchlist</span></h2>
      <p class="col-md-6"><span class="nb-films-wl"></span></p>
    </div>
  </div>
  <div class="page-watchlist">
    <div class="movies-result container favorites">
      <ul>
        @forelse($favorites as $favorite)
          <li class="col-md-2 col-sm-3 col-xs-4">
            <div class="proposal-image">
              <a title="Accéder au film {{ $favorite->movie_title }}" href="#">
                <img src="https://image.tmdb.org/t/p/w780/{{ $favorite->movie_poster }}" alt="affiche du film {{ $favorite->movie_title}}" title="{{ $favorite->movie_title}}"/>
              </a>
              <div class="overlay">
                <a href="/movies/{{ $favorite->movie_id }}-{{ str_slug( $favorite->movie_title, '-') }}" title="Accéder au film {{ $favorite->movie_title }}">
                  <img src="../img/more.png" alt="Image pour en savoir davantage sur le film {{ $favorite->movie_title}}" />
                </a>
              </div>
            </div>
            <div class="proposal-details">
              <a title="Accéder au film {{ $favorite->movie_title }}" href="/movies/{{ $favorite->movie_id }}-{{ str_slug( $favorite->movie_title, '-') }}">{{ $favorite->movie_title}}</a>
            </div>
          </li>
        @empty
          <h3 class="movie-empty">Pas de films dans ta watchlist pour l'instant. <span>N'hésites pas à rajouter un film dés que tu en découvres un qui te plait !</span></h3>
        @endforelse
      </ul>
    </div>
  </div>
  <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="//code.jquery.com/jquery.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script>
    $('#flash-overlay-modal').modal();
  </script>
@endsection
