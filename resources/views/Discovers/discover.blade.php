@extends ('layout')
@section('title', 'Discover' )
@section('mainContent')
<div class="page-discover">
  <div class="discover-form container">
    <div class="discover col-md-6 col-sm-6 col-xs-6">
      @include('forms.formDiscoverWithJs')
      <noscript>
        @include('forms.formDiscoverNoJs')
      </noscript>
    </div>
    <div class="discover-image col-md-6 col-sm-6 col-xs-6">
      <div class="discover-logo">
        <img src="../img/binoculars.png" alt="image figurative de l'option Discover" />
        <h2 class="discover-title">Discover</h2>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js"></script> <!-- important -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> <!-- Pour select discover -->
@endsection
