@extends ('layout')
@section('title', 'genre' )
@section('mainContent')
  <div class="page-discovers-title">
    <div class="movie-discovers container">
      <h2 class="col-md-7 movie-results-title"><span class="discovers-title">{{ $name['name'] }}</span></h2>
    </div>
  </div>
  <div class="page-watchlist">
    <div class="movies-result container favorites">
      <ul>
        @forelse($genres['results'] as $key => $value)
          <li class="col-md-2 col-sm-3 col-xs-4">
            <div class="proposal-image">
              @if($value['poster_path'] == true)
              <a href="#" title="En savoir plus sur {{ $value['title'] }}">
                <img src="https://image.tmdb.org/t/p/w780/{{ $value['poster_path'] }}" alt="affiche du film {{ $value['title']}}" title="{{ $value['title'] }}"/>
              </a>
              @else
              <img src="../img/not-available.png" alt="Affiche du film non disponible" />
              @endif
              <div class="overlay">
                <a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">
                  <img src="../img/more.png" alt="Image pour en savoir davantage sur le film {{ $value['title'] }}" />
                </a>
              </div>
            </div>
            <div class="proposal-details">
              <a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">{{ $value['title'] }}</a>
            </div>
          </li>
        @empty
          <h3 class="movie-empty">Pas de résultats correspondant à ta recherche... <span><a title="Faire une nouvelle recherche" href="/discover">Revenir à la page précédente pour faire une nouvelle recherche</a> pour découvrir de nouveaux films !</span></h3>
        @endforelse
      </ul>
    </div>
  </div>
  <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="../js/bootstrap.min.js"></script> <!-- important -->
@endsection
