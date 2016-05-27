@extends ('layout-error')
@section('title', 'Connexion' )
@section('mainContent')
  <section class="form-user">
    <div class="form-background connect-bg">
    </div>
    <div class="form-container container">
      <div class="formulaire col-md-5 col-sm-5 col-xs-12">
        <h2>Connexion</h2>
        <p>
          Connecte toi pour profiter de toutes les fonctionnalités que te propose Müdo !  Il y a encore tant de choses à voir ou à revoir.
        </p>
        <form method="POST" class="register" action="/auth/login">
          {!! csrf_field() !!}
          @include('errors.userErrors')
          <div>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
          </div>
          <div>
            <label for="password">Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <div class="checkbox">
            <label>
              <input name="remember" type="checkbox"> Se souvenir de moi
            </label>
          </div>
          <div>
            <button class="btn btn-success" type="submit">Se connecter</button>
          </div>
          <div>
            <p class="not-register">
              Tu n'as pas encore de compte ? <a href="{!! action('Auth\AuthController@getRegister') !!}">Inscris-toi</a>
            </p>
            <p class="return-home">
              <a title="Clique ici pour revenir sur la page d'accueil de Müdo" href="/">> Clique ici pour revenir à l'accueil <</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
