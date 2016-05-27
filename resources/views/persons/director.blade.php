@extends ('layout')
@section('title', 'Réalisateur' )
@section('mainContent')
    <section class="movie-infos person-actor">
      <div class="movie-container container">
        <div class="movie-poster-container col-md-3 col-sm-12">
          <div class="movie-poster-scroll">
            <div class="movie-poster">
              <div class="movie-poster-img">
                <div class="poster-img">
                  @if($person['profile_path'] == true )
                  <a href="https://image.tmdb.org/t/p/original/{{ $person['profile_path'] }}" data-lightbox="poster-actor" title="afficher la photo de {{ $person['name'] }}"></a>
                    <img class="profil_actor" src="https://image.tmdb.org/t/p/original/{{ $person['profile_path'] }}" alt="photo de profil de l'acteur {{ $person['name'] }}" title="{{ $person['name'] }}">
                  </a>
                  @else
                    <img class="profil_actor" src="../img/not-available.png" alt="photo de profil de l'acteur non dispinble" title="{{ $person['name'] }}">
                  @endif
                </div>
              </div>
              <div class="poster-title">
                <h2>{{ $person['name'] }}</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="movie-details col-md-9 col-sm-12">
          <h2 class="col-md-12">{{ $person['name'] }}</h2>
          <div class="movie-infos-1 col-md-8 col-sm-8 col-xs-8">
            <div class="movie-item">
              <span class="item-light">Date de naissance :</span>
              <strong>
                @if( $person['birthday'] == true )
                  {{ $person['birthday'] }}
                @else
                  Cette information n'est pas disponible
                @endif
              </strong>
            </div>
            @if( $person['deathday'] == true )
            <div class="movie-item">
              <span class="item-light">Date de décès :</span>
              <strong>
                {{ $person['deathday'] }}
              </strong>
            </div>
            @else
            @endif
            <div class="movie-item">
              <span class="item-light">Originaire de :</span>
              <strong>
                @if( $person['place_of_birth'] == true )
                  {{ $person['place_of_birth'] }}
                @else
                  Cette information n'est pas disponible
                @endif
              </strong>
            </div>
          </div>
          <div class="movie-synopsis col-md-12 col-sm-12 col-xs-12">
            @if($person['biography'] == true)
              <p>{{ $person['biography'] }}</p>
            @else
              <p>Nous ne disposons pas de la biographie de {{ $person['name'] }}</p>
            @endif
          </div>
          <div class="movie-casting col-md-12 col-sm-12 col-xs-12">
            <span class="item-light">Filmographie :</span>
            @if($credits['crew'] == true)
              <table class="cast">
                <tbody>
                  @foreach($credits['crew'] as $key => $casting)
                      <tr>
                        <td class="movie-year-actor">{{ $casting['release_date']}}</td>
                        <td class="cast-actor"><a title="{{ $casting['title'] }}" href="/movies/{{ $casting['id'] }}-{{ str_slug( $casting['title'], '-') }}">{{ $casting['title'] }}</a></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <p>Ces informations ne sont pas disponibles</p>
            @endif
            <span class="movie-casting-next"><a class="more" href="#">Voir au complet</a></span>
            <span class="movie-casting-next"><a class="less" href="#">Réduire</a></span>
          </div>
          <div class="movies_actor col-md-12 col-sm-12 col-xs-12">
            <span class="item-light">Vous avez peut-être vu l'un de ses films :</span>
            <ul>
              @foreach($credits['crew'] as $key => $value)
                @if($key < 4)
                  <li class="col-md-3 col-sm-3 col-xs-4">
                    <div class="proposal-image">
                      <img src="https://image.tmdb.org/t/p/w780/{{ $value['poster_path'] }}" alt="film dans lequel a joué l'acteur">
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
                @endif
              @endforeach
            </ul>
            <div class="actor-movie-next">
              <a title="Clique ici pour afficher davantage de films" href="#">Voir tous ses films</a>
            </div>
          </div>
      </div>
    </section>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js"></script> <!-- important -->
@endsection
