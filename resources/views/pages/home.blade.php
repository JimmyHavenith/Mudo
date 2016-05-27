@extends ('layout')
@section('title', "Page d'accueil" )
@section('mainContent')
@include('flash::message')
    <section class="header-banner">
      <div class="banner">
        <div class="banner-img">
          <a title="Accéder à la fiche technique du film Warcraft" href="/movies/68735-warcraft">
            <img src="img/banner-warcraft.png" alt="Affiche du film Warcraft" />
          </a>
        </div>
        <div class="banner-img banner-no-js">
          <a title="Accéder à la fiche technique du film Captain america : Civil War" href="/movies/271110-captain-america-civil-war">
            <img src="img/banner-civilwar.png" alt="Affiche du film Captain America : Civil War" />
          </a>
        </div>
        <div class="banner-img banner-no-js">
          <a title="Accéder à la fiche technique du film Le livre de la jungle" href="/movies/278927-le-livre-de-la-jungle">
            <img src="img/banner-jungle.png" alt="Affiche du film Le livre de la jungle" />
          </a>
        </div>
        <div class="banner-img banner-no-js">
          <a title="Accéder à la fiche technique du film X-men : apocalypse" href="/movies/246655-x-men-apocalypse">
            <img src="img/banner-xmen.png" alt="Affiche du film X-men : apocalypse" />
          </a>
        </div>
      </div>
      <div class="banner-click container">
        <a title="Afficher l'image précédente" class="prev" href="#"></a>
        <a title="Afficher l'image suivante" class="next" href="#"></a>
      </div>
    </section>
    <section class="start-quiz">
      <div class="container">
        <div class="features-quiz">
          <p class="slogan-home">
            Fini les prises de tête pour trouver un film,
          </p>
          <p class="slogan-home">
            Passe le quiz et trouve ton bonheur
          </p>
          <p class="button-quiz">
            <a title="Clique ici pour accéder au quiz" href="/question" class="quiz-link">
              <span class="quiz-link-txt">Commencer le quiz</span>
              <span class="quiz-link-bg"></span>
            </a>
          </p>
        </div>
      </div>
    </section>
    <section class="features">
      <div class="container">
        <div class="features-todo">
          <a title="Clique ici pour commencer un quiz" href="/question">
            <div class="features col-md-3 col-sm-6 col-xs-6">
              <img class="image-todo" src="img/todo-quiz.png" alt="Image relative au quiz" />
              <h2>Quiz</h2>
              <p>
                Tu as envie d’un film mais tu n’as pas d’idées ? Laisses toi guider par notre quiz !
              </p>
            </div>
          </a>
          @if( Auth::check() )<a title="Clique ici pour aller sur la page Discover" href="/discover">@else <a href="/auth/login" title="Il faut que tu sois connecté pour avoir accès à cette fonctionnalité !">@endif
            <div class="features col-md-3 col-sm-6 col-xs-6">
              <img class="image-todo" src="img/todo-discover.png" alt="Image relative à l'option Discover" />
              <h2>Discover</h2>
              <p>
                Envie de faire une recherche en précisant chaques détails ? C’est ici que ca se passe !
              </p>
              @if( Auth::check() ) @else <img class="only-auth" src="img/cadenas.png" alt="Cadenas représentant l'obligation de se connecter pour avoir accès au contenu" /> @endif
            </div>
          </a>
            @if( Auth::check() )<a title="Clique ici pour aller sur ta watchlist" href="/watchlist">@else <a href="/auth/login" title="Il faut que tu sois connecté pour avoir accès à cette fonctionnalité !">@endif
            <div class="features col-md-3 col-sm-6 col-xs-6">
              <img class="image-todo" src="img/todo-watchlist.png" alt="Image relative à l'option Watchlist" />
              <h2>Watchlist</h2>
              <p>
                Fais autant de découvertes que possible et inscris les dans ta watchlist pour n’en oublier aucunes.
              </p>
              @if( Auth::check() ) @else <img class="only-auth" src="img/cadenas.png" alt="Cadenas représentant l'obligation de se connecter pour avoir accès au contenu" /> @endif
            </div>
          </a>
          @if( Auth::check() )<a title="Clique ici pour aller sur ta Markview" href="/markview">@else <a href="/auth/login" title="Il faut que tu sois connecté pour avoir accès à cette fonctionnalité !">@endif
            <div class="features col-md-3 col-sm-6 col-xs-6">
              <img class="image-todo" src="img/todo-markview.png" alt="Image relative à l'option Markview" />
              <h2>Markview</h2>
              <p>
                Tu as déjà vu un film et tu ne veux plus qu’on te le propose ? Il suffit de l’ajouter à ta markview.
              </p>
              @if( Auth::check() ) @else <img class="only-auth" src="img/cadenas.png" alt="Cadenas représentant l'obligation de se connecter pour avoir accès au contenu" /> @endif
            </div>
          </a>
        </div>
      </div>
    </section>
    <section class="proposal">
      <div class="container">
        <div class="proposal col-md-4 col-sm-12">
          <img src="img/cinema.png" alt="icône pour les films actuellement au cinéma" />
          <h3 class="proposal-title">Actuellement au cinéma <span>+</span></h3>
          <ul>
            @foreach($cinema['results'] as $key => $value)
              @if($key<6)
                <li>
                  <div class="proposal-image">
                    <a href="/movies/{{ $value['id'] }}" title="{{ $value['title'] }}">
                      <img src="https://image.tmdb.org/t/p/w185/{{ $value['poster_path'] }}" alt="affiche du film {{ $value['title'] }}"/>
                    </a>
                    <div class="overlay">
                      <a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">
                        <img src="img/more.png" alt="Image pour en savoir davantage sur le film {{ $value['title'] }}" />
                      </a>
                    </div>
                  </div>
                  <div class="proposal-details">
                    <a title="Accéder à la page du film {{ $value['title'] }}" href="/movies/{{ $value['id'] }}">{{ $value['title'] }}</a>
                  </div>
                </li>
              @endif
            @endforeach
          </ul>
          <span class="proposal-next"><a title="Clique ici pour afficher davantage de films" href="#">Voir la suite</a></span>
        </div>
        <div class="proposal middle col-md-4 col-sm-12">
          <img src="img/rank.png" alt="icône pour les films les plus notés" />
          <h3 class="proposal-title">Les plus notés <span>+</span></h3>
          <ul>
            @foreach($vote['results'] as $key => $value)
              @if($key<6)
                <li>
                  <div class="proposal-image">
                    <a href="/movies/{{ $value['id'] }}" title="{{ $value['title'] }}">
                      <img src="https://image.tmdb.org/t/p/w185/{{ $value['poster_path'] }}" alt="affiche du film {{ $value['title'] }}"/>
                    </a>
                    <div class="overlay">
                      <a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">
                        <img src="img/more.png" alt="Image pour en savoir davantage sur le film {{ $value['title'] }}" />
                      </a>
                    </div>
                  </div>
                  <div class="proposal-details">
                    <a title="Accéder à la page du film {{ $value['title'] }}" href="/movies/{{ $value['id'] }}">{{ $value['title'] }}</a>
                  </div>
                </li>
              @endif
            @endforeach
          </ul>
          <span class="proposal-next"><a title="Clique ici pour afficher davantage de films" href="#">Voir la suite</a></span>
        </div>
        <div class="proposal col-md-4 col-sm-12">
          <img src="img/top.png" alt="icône pour les films les plus populaires en 2016" />
          <h3 class="proposal-title">Les plus populaires en 2016 <span>+</span></h3>
          <ul>
          @foreach($popularity['results'] as $key => $value)
            @if($key<6)
              <li>
                <div class="proposal-image">
                  <a href="/movies/{{ $value['id'] }}" title="{{ $value['title'] }}">
                    <img src="https://image.tmdb.org/t/p/w185/{{ $value['poster_path'] }}" alt="affiche du film {{ $value['title'] }}"/>
                  </a>
                  <div class="overlay">
                    <a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">
                      <img src="img/more.png" alt="Image pour en savoir davantage sur le film {{ $value['title'] }}" />
                    </a>
                  </div>
                </div>
                <div class="proposal-details">
                  <a title="Accéder à la page du film {{ $value['title'] }}" href="/movies/{{ $value['id'] }}">{{ $value['title'] }}</a>
                </div>
              </li>
            @endif
          @endforeach
          </ul >
          <span class="proposal-next"><a title="Clique ici pour afficher davantage de films" href="#">Voir la suite</a></span>
        </div>
      </div>
    </section>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="//code.jquery.com/jquery.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
      $('#flash-overlay-modal').modal();
    </script>
@endsection
