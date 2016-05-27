@extends ('layout')
@section('title', 'Film' )
@section('mainContent')
@include('flash::message')
    <section class="movie-banner">
    @if( $movie['backdrop_path'] == true)
      <div id="backdrop"  style="background-image: url('https://image.tmdb.org/t/p/original/{{ $movie['backdrop_path'] }}'); background-repeat: no-repeat; background-size: cover; width: 100%; height: 394px; ">
    @else
      <div id="backdrop"  style="background-image: url('../img/not-available-bg.png'); background-repeat: no-repeat; background-size: cover; width: 100%; height: 394px; ">
    @endif
    </section>
    <section class="movie-infos">
      <div class="movie-border">
      </div>
      <div class="movie-container container">
        <div class="movie-poster-container col-md-3 col-sm-12">
          <div class="movie-poster-scroll">
            <div class="movie-poster">
              <div class="movie-poster-img">
                <div class="poster-img">
                  @if( $movie['poster_path'] == true)
                  <a href="https://image.tmdb.org/t/p/w780/{{ $movie['poster_path'] }}" data-lightbox="poster-image" title="Affiche du film {{ $movie['title'] }}">
                    <img src="https://image.tmdb.org/t/p/w780/{{ $movie['poster_path'] }}" alt="Affiche du film {{ $movie['title'] }}" />
                  </a>
                  @else
                  <img src="../img/not-available.png" alt="Affiche du film non disponible" />
                  @endif
                </div>
              </div>
              @if( Auth::check() )
              <div class="movie-features">
                @include('forms.formMovie')
              </div>
              @else
              @endif
              <div class="poster-title">
                <h2>{{ $movie['title'] }}</h2>
                @include('forms.formMovieResponsive')
              </div>
            </div>
          </div>
        </div>
        <div class="movie-details col-md-9 col-sm-12">
          <h2 class="col-md-12">{{ $movie['title'] }}</h2>
          <div class="movie-infos-1 col-md-8 col-sm-8 col-xs-8">
            <div class="movie-item rating">
              <div class="rating-background">
              </div>
              <div class="rating-background-yellow">
              </div>
              <img class="rating-star" src="../img/ratingcinq.png" alt="Étoiles représentant la note TMDB du film" />
              <strong class="rating-vote"><span class="rating-vote-note">{{ $movie['vote_average'] }}</span>/5</strong>
            </div>
            <noscript>
              <div class="movie-item rating-no-js">
                <span class="item-light">Note :</span>
                <strong><span>{{ $movie['vote_average'] }}</span>/10</strong>
              </div>
            </noscript>
            <div class="movie-item">
              <span class="item-light">Date de sortie :</span>
              <strong>{{ $movie['release_date'] }}</strong>
            </div>
            <div class="movie-item">
              <span class="item-light">Genres :</span>
              <strong>
                @foreach($movie['genres'] as $key => $genre)
                  <a href="../genre/{{ $genre['id'] }}-{{ str_slug( $genre['name'], '-' ) }}">{{ $genre['name'] }}</a>
                @endforeach
              </strong>
            </div>
            <div class="movie-item">
              <span class="item-light">Durée :</span>
              <strong>{{ $movie['runtime'] }}min</strong>
            </div>
            <div class="movie-item">
              <span class="item-light">Réalisateur  :</span>
              @if($credits['crew'] == true)
                <strong>
                  <a href="../director/{{ $credits['crew'][0]['id']}}-{{ str_slug( $credits['crew'][0]['name'], '-') }}" title="Voir la fiche de {{ $credits['crew'][0]['name'] }}">{{ $credits['crew'][0]['name'] }}</a>
                </strong>
              @else
                <span class="not-available">Nous ne disposons pas de cette informations</span>
              @endif
            </div>
            <div class="movie-item">
              <span class="item-light">Nationalité :</span>
              @if($movie['production_countries'] == true)
                <strong>
                {{ $movie['production_countries'][0]['name'] }}</a>
                </strong>
              @else
                <span class="not-available">Nous ne disposons pas de cette informations</span>
              @endif
            </div>
            <div class="movie-item">
              <span class="item-light">Titre original :</span>
              <strong>{{ $movie['original_title'] }}</strong>
            </div>
          </div>
          <div class="movie-infos-2 col-md-4 col-sm-4 col-xs-4">
            <div class="movie-trailer">
              @foreach($images['backdrops'] as $key => $image)
                @if($key < 1)
                  <img src="https://image.tmdb.org/t/p/w780/{{ $image['file_path'] }}" alt="Bande annonce de {{ $movie['title'] }}" title="Bande annonce de {{ $movie['title'] }}" alt="" />
                  <div class="see-trailer">
                    <a title="Afficher la bande annonce de {{ $movie['title'] }}" href="#">
                      <img src="../img/video.png" alt="Image du film pour regarder la video" />
                    </a>
                  </div>
                @endif
              @endforeach
            </div>
            @if( $trailers['youtube'] == true)
            <div class="movie-trailer-responsive" style="height: 233px;">
              <iframe id="youtube_player-responsive" src="https://www.youtube.com/embed/{{ $trailers['youtube'][0]['source']}}" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
            </div>
            @else
            @endif
          </div>
          <div class="movie-trailer-popup">
            <div class="movie-trailer-infos">
              <span class="video-left">Bande-annonce de {{ $movie['title'] }}</span>
              <span class="video-right"><a href="#">X</a></span>
            </div>
            <div class="movie-trailer-video">
              @if( $trailers['youtube'] == true)
                <iframe id="youtube_player" width="800" height="450" src="https://www.youtube.com/embed/{{ $trailers['youtube'][0]['source']}}" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
              @else
              @endif
            </div>
          </div>
          <div class="movie-synopsis col-md-12 col-sm-12 col-xs-12">
            @if($movie['overview'] == true)
              <p>{{ $movie['overview'] }}</p>
            @else
              <p>Nous ne disposons pas d'un résumé du film {{ $movie['title'] }}</p>
            @endif
          </div>
          <div class="movie-casting col-md-12 col-sm-12 col-xs-12">
            <span class="item-light">Casting :</span>
            @if($credits['cast'] == true)
              <table class="cast">
                <tbody>
                  @foreach($credits['cast'] as $key => $casting)
                      <tr>
                        <td class="cast-actor"><a href="../person/{{ $casting['id'] }}-{{ str_slug( $casting['name'], '-') }}" title="voir la fiche de {{ $casting['name'] }}">{{ $casting['name'] }}</a></td>
                        <td class="cast-character">{{ $casting['character'] }}</td>
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
          @if($images['backdrops'] == true)
            <div class="movie-galery">
              <div class="movie-galery-container">
                @foreach($images['backdrops'] as $key => $image)
                  <div class="galery-img">
                    <a href="https://image.tmdb.org/t/p/w780/{{ $image['file_path'] }}" data-lightbox="slider-film" title="Afficher l'image du film {{ $movie['title'] }}">
                      <img src="https://image.tmdb.org/t/p/w780/{{ $image['file_path'] }}" alt="image du film {{ $movie['title'] }}" title="{{ $movie['title'] }}">
                    </a>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="movie-galery-button">
              <a title="Voir l'image précédente" class="galery-prev" href="#"></a>
              <a title="Voir l'image suivante" class="galery-next" href="#"></a>
            </div>
          @else
            <div class="movie-galery" style="display:none"></div>
            <div class="movie-galery-button" style="display:none"></div>
          @endif
          <div class="movies_similar col-md-12 col-sm-12 col-xs-12">
            <span class="item-light">Quelques films similaires à {{ $movie['title'] }} :</span>
            <ul>
              @foreach($similar['results'] as $key => $value)
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
                      <a title="En savoir plus sur {{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">{{ $value['title'] }}</a>
                    </div>
                  </li>
                @endif
              @endforeach
            </ul>
          </div>
          <div class="actor-movie-next col-md-12">
            <a title="Afficher tous les films" href="#">Voir tous les films</a>
          </div>
        </div>
      </div>
    </section>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js"></script> <!-- important -->
    <script src="//code.jquery.com/jquery.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
      $('#flash-overlay-modal').modal();
    </script>
    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
          if ( $(window).width() > 991 ) {
            var poster = $('.movie-poster');
            var fixedLimit = (poster.offset().top) - 50;
            var windowScroll = $(window).scrollTop();

            $(window).scroll(function(e){
              windowScroll = $(window).scrollTop();
              if( windowScroll >= fixedLimit ){
                poster.addClass('fixed');
              } else if ( windowScroll < fixedLimit ) {
                poster.removeClass('fixed');
              } else {
                poster.removeClass('fixed');
              }
            });
          }
        });
      })(jQuery);
    </script>
@endsection
