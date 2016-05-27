@extends ('layout')
@section('title', 'résultats' )
@section('mainContent')
  <div class="page-discovers-title">
    <div class="movie-discovers container">
      <h2 class="col-md-7 movie-results-title"><span class="discovers-title">Résultats de votre recherche pour : "{{ $word }}"</span></h2>
    </div>
  </div>
  <div class="page-watchlist">
    <div class="movies-result container favorites">
      <ul>
        @forelse($searchs['results'] as $value)
          @if($value['media_type'] == 'movie')
            <li class="col-md-2 col-sm-3 col-xs-4">
              <div class="proposal-image">
                @if($value['poster_path'] == true)
                <a title="Clique ici pour accéder à la page du film {{ $value['title'] }}" href="#">
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
                <a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}"> {{ $value['title'] }} </a>
              </div>
            </li>
          @elseif($value['media_type'] == 'person')
            <li class="col-md-2 col-sm-3 col-xs-4">
              <div class="proposal-image">
                @if($value['profile_path'] == true)
                <a href="#" title="Clique ici pour accéder à la page de {{ $value['name'] }}">
                  <img src="https://image.tmdb.org/t/p/w780/{{ $value['profile_path'] }}" alt="Photo de {{ $value['name']}}" title="{{ $value['name'] }}"/>
                </a>
                @else
                <img src="../img/not-available.png" alt="Affiche du film non disponible" />
                @endif
                <div class="overlay">
                  <a href="/person/{{ $value['id'] }}"  title="Clique ici pour accéder à la page de {{ $value['name'] }}">
                    <img src="../img/more.png" alt="Image pour en savoir davantage sur le film {{ $value['title'] }}" />
                  </a>
                </div>
              </div>
              <div class="proposal-details">
                <a href="/person/{{ $value['id'] }}" title="Clique ici pour accéder à la page de {{ $value['name'] }}"> {{ $value['name'] }} </a>
              </div>
            </li>
          @else
          <li class="col-md-2 col-sm-3 col-xs-4" style="display: none"></li>
          @endif
        @empty
          <h3 class="movie-empty">Pas de résultats correspondant à ta recherche... <span><a href="/discover">Fais une nouvelle recherche</a> pour découvrir de nouveaux films !</span></h3>
        @endforelse
      </ul>
    </div>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js"></script> <!-- important -->
@endsection
