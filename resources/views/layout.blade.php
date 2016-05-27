<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Müdo | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"> <!-- Pour select discover -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <!-- Pour mise en page générale -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet"> <!-- Pour select discover + menu -->

    <link rel="stylesheet" href="/css/main.css" media="screen" title="no title" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css" media="screen, print">
      @font-face {
        font-family: "Mohave";
        src: url('../css/Mohave.otf');
      }
      @font-face {
        font-family: "Montserrat";
        src: url('../css/Montserrat-Regular.otf');
      }
      @font-face {
        font-family: "Roboto";
        src: url('../css/Roboto-Regular.ttf');
      }
    </style>
  </head>
  <body>
    <header>
      <div class="menu">
        <div class="container">
          <noscript>
            <nav class="navbar navbar-default menu-no-script">
              <div class="container-fluid">
                <div class="navbar-header">
                  <h1><a title="Revenir sur la page d'accueil" class="navbar-brand" href="/">Müdo<img width="auto" height="auto" src="../img/mudo-logo.png" alt="Logo de Müdo" /></a></h1>
                </div>
                  {!! Form::open(
                      array(
                          'action' => 'SearchController@store',
                          'class' => 'navbar-form navbar-left',
                          'novalidate' => 'novalidate')) !!}
                  {!! Form::text('search-word') !!}
                  <img width="auto" height="auto" src="../img/loupe.png" alt="" />
                  {!! Form::close() !!}
                  <ul class="nav navbar-nav navbar-left">
                    <li><a title="Accéder au quiz" href="/question"><img width="auto" height="auto" src="../img/icon-quiz.png" alt="icône relatif au quiz" />Commencer un quiz</a></li>
                    <li><a title="Accéder au Discover" href="/discover"><img width="auto" height="auto" src="../img/icon-discover.png" alt="icône relatif à Discover" />Discover</a></li>
                    <li><a title="Accéder à ta Watchlist" href="/watchlist"><img width="auto" height="auto" src="../img/icon-watchlist.png" alt="icône relatif à la Watchlist" />Ma Watchlist</a></li>
                    <li><a title="Accéder à ta Markview" href="/markview"><img width="auto" height="auto" src="../img/icon-markview.png" alt="icône relatif à la Markview" />Ma Markview</a></li>
                    <li><a title="Se déconnecter de son compte" href="/auth/logout"><img width="auto" height="auto" src="../img/icon-disconnect.png" alt="icône relatif à la déconnexion" />Se déconnecter</a></li>
                  </ul>
              </div><!-- /.container-fluid -->
            </nav>
          </noscript>
          <nav class="navbar navbar-default menu-with-js">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <h1><a title="Revenir sur la page d'accueil" class="navbar-brand" href="/">Müdo<img width="auto" height="auto" src="../img/mudo-logo.png" alt="Logo de Müdo" /></a></h1>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse">
                {!! Form::open(
                    array(
                        'action' => 'SearchController@store',
                        'class' => 'navbar-form navbar-left',
                        'novalidate' => 'novalidate')) !!}
                {!! Form::text('search-word') !!}
                <img width="auto" height="auto" src="../img/loupe.png" alt="" />
                {!! Form::close() !!}
                <ul class="nav navbar-nav navbar-right">
                  @if( Auth::check() )
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu menu-header">
                      <li><a title="Accéder au quiz" href="/question"><img width="auto" height="auto" src="../img/icon-quiz.png" alt="icône relatif au quiz" />Commencer un quiz</a></li>
                      <li><a title="Accéder au Discover" href="/discover"><img width="auto" height="auto" src="../img/icon-discover.png" alt="icône relatif à Discover" />Discover</a></li>
                      <li><a title="Accéder à ta Watchlist" href="/watchlist"><img width="auto" height="auto" src="../img/icon-watchlist.png" alt="icône relatif à la Watchlist" />Ma Watchlist</a></li>
                      <li><a title="Accéder à ta Markview" href="/markview"><img width="auto" height="auto" src="../img/icon-markview.png" alt="icône relatif à la Markview" />Ma Markview</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a title="Se déconnecter de son compte" href="/auth/logout"><img width="auto" height="auto" src="../img/icon-disconnect.png" alt="icône relatif à la déconnexion" />Se déconnecter</a></li>
                    </ul>
                  </li>
                  @else
                  <li><a class="link-to-connect" title="Se connecter à son compte" href="/auth/login">Se connecter</a></li>
                  @endif
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </header>
		@yield('mainContent')
    <footer>
      <div class="container">
        <p>
          This product uses the TMDb API but is not endorsed or certified by TMDb
        </p>
        <a title="Accéder à la page d'accueil de themoviedb.org" href="https://www.themoviedb.org">
          <img width="auto" height="auto" src="../img/tmdb.png" alt="Logo de The Movie DataBase, l'API récupéré par Müdo" />
        </a>
      </div>
    </footer>
    <div id="body-black">
    </div>
    <script src="../js/script.js" type="text/javascript"></script>
    <script src="../js/lightbox.js" type="text/javascript"></script>
  </body>
  <div id="hamburger-menu">
    <ul>
      <li><a title="Accéder au quiz" href="/question"><img width="auto" height="auto" src="../img/icon-quiz.png" alt="icône relatif au quiz" />Commencer un quiz</a></li>
      <li><a title="Accéder à Discover" href="/discover"><img width="auto" height="auto" src="../img/icon-discover.png" alt="icône relatif à Discover" />Discover</a></li>
      <li><a title="Accéder à ta page Watchlist" href="/watchlist"><img width="auto" height="auto" src="../img/icon-watchlist.png" alt="icône relatif à la Watchlist" />Ma Watchlist</a></li>
      <li><a title="Accéder à ta page Markview" href="/markview"><img width="auto" height="auto" src="../img/icon-markview.png" alt="icône relatif à la Markview" />Ma Markview</a></li>
      <li><a title="Se déconnecter de son compte" href="/auth/logout"><img width="auto" height="auto" src="../img/icon-disconnect.png" alt="icône relatif à la déconnexion" />Se déconnecter</a></li>
    </ul>
  </div>
</html>
