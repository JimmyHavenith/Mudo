@extends ('layout')
@section('title', 'Markview' )
@section('mainContent')
@include('flash::message')
  <div class="page-watchlist-title">
    <div class="movie-favorites container">
      <h2 class="col-md-6"><span class="fav-title">Ma Markview</span></h2>
      <p class="col-md-6"><span class="nb-films-view"></span></p>
    </div>
  </div>
  <div class="page-watchlist">
    <div class="movies-result container favorites">
      <ul>
        @forelse($views as $view)
          <li class="col-md-2 col-sm-3 col-xs-4">
            <div class="proposal-image">
              <a title="Accéder au film {{ $view->movie_title}}" href="#">
                <img src="https://image.tmdb.org/t/p/w780/{{ $view->movie_poster }}" alt="affiche du film {{ $view->movie_title}}" title="Accéder au film{{ $view->movie_title}}"/>
              </a>
              <div class="overlay">
                <a href="/movies/{{ $view->movie_id }}-{{ str_slug( $view->movie_title, '-') }}" title="Accéder au film {{ $view->movie_title}}">
                  <img src="../img/more.png" alt="Image pour en savoir davantage sur le film {{ $view->movie_title }}" />
                </a>
              </div>
            </div>
            <div class="proposal-details">
              <a href="/movies/{{ $view->movie_id }}-{{ str_slug( $view->movie_title, '-') }}" title="Accéder au film {{ $view->movie_title}}">{{ $view->movie_title}}</a>
            </div>
          </li>
          @empty
            <h3 class="movie-empty">Pas de films dans ta markview pour l'instant. <span>Si tu ne veux plus qu'on te propose un film que tu as déjà vu, n'hésites pas à le rajouter ici !</span></h3>
          @endforelse
      </ul>
    </div>
  </div>
  <script src="//code.jquery.com/jquery.js" type="text/javascript"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
  <script>
    $('#flash-overlay-modal').modal();
  </script>
@endsection
