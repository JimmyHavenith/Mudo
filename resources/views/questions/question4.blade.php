@extends ('layout')
@section('title', 'quiz' )
@section('mainContent')
	<section class="movie-banner movie-quiz">
		<div class="movie-banner-img">
			<img src="../img/television.png" alt="">
			<div class="quiz container">
				<div class="end-quiz">
					<p>
						Voici les films correspondant à vos trois réponses positives !
					</p>
				</div>
				<div class="restart-quiz">
					<p>
						<a title="Clique ici pour recommencer le quiz" class="restart-link" href="/question">
							<span class="restart-txt">Recommencer le quiz ?</span>
							<span class="restart-bg"></span>
						</a>
					</p>
				</div>
			</div>
		</div>
		<div class="movie-border">
		</div>
		<div class="movie-border-txt">
			<div class="container">
				<p class="col-md-5">
					Les films correspondants à vos envies :
				</p>
				<div class="col-md-7">
					<div class="green">
						<img src="../img/bulle-green.png" alt="Film correspondant à tous les critères" />
						<span>Tous les critères</span>
					</div>
					<div class="orange">
						<img src="../img/bulle.png" alt="Film correspondant à une partie des critères" />
						<span>Une partie des critères</span>
					</div>
					<div class="green">
						<img src="../img/bulle-blue.png" alt="Film correspondant à un seul critère" />
						<span>Un seul critère</span>
					</div>
				</div>
			</div>
		</div>
	</section>
  <section>
		<div class="movies-result container">
			<ul>
				@foreach($resultats['results'] as $key => $value)
					<li class="col-md-2 col-sm-3 col-xs-4 results-quiz-movies">
						<div class="proposal-image">
							<a title="Accéder au film {{ $value['title'] }}" href="#">
								<img src="https://image.tmdb.org/t/p/w185/{{ $value['poster_path'] }}" alt="affiche du film {{ $value['title'] }}"/>
							</a>
							<div class="overlay">
								<a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">
									<img src="../img/more.png" alt="Image pour en savoir davantage sur le film {{ $value['title'] }}" />
								</a>
							</div>
						</div>
						<div class="detector">
							<img class="bulle-detector" src="../img/bulle.png" alt="Film correspondant à une partie des critères" />
						</div>
						<div class="proposal-details">
							<a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">{{ $value['title'] }}</a>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
  </section>
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js"></script> <!-- important -->
@endsection
