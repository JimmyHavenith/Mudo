@extends ('layout-error')
@section('title', 'Inscription' )
@section('mainContent')
  <section class="form-user">
    <div class="form-background register-bg">
    </div>
    <div class="form-container container">
      <div class="formulaire col-md-5 col-sm-5 col-xs-12">
        <h2>Inscription</h2>
        <p>
          Rejoinds nous dans l'aventure pour faire de nouvelles découverte avec Discover et les fonctionnalités qui s'offre à toi !
        </p>
        <form method="POST" class="register" action="/auth/register">
          {!! csrf_field() !!}
          @include('errors.userErrors')
          <div>
            <label for="name">Pseudo</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
          </div>
          <div>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
          </div>
          <div>
            <label for="password">Mot de passe</label>
            <input class="form-control" type="password" name="password">
          </div>
          <div>
            <label for="password">Confirmer votre mot de passe</label>
            <input class="form-control" type="password" name="password_confirmation">
          </div>
          <div>
            <button class="btn btn-success" type="submit">S'inscrire</button>
          </div>
          <div>
            <p class="return-home">
              <a title="Clique ici pour revenir sur la page d'accueil de Müdo" href="/">> Clique ici pour revenir à l'accueil <</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
