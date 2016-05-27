@extends ('layout-error')
@section('title', 'Erreur 404' )
@section('mainContent')
  <section class="page-error">
    <div class="container">
      <div class="div-page-error">
        <h2 class="title-page-error">404 <span>Page non trouvée</span></h2>
        <div class="content-page-error">
          <h3 class="message-page-error">
            Oups, cette page n'existe pas !
          </h3>
          <p>
            <a href="/">Retour sur la page d'accueil</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="../js/bootstrap.min.js"></script> <!-- important -->
@endsection
