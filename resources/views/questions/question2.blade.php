@extends ('layout')
@section('title', 'quiz' )
	@section ('mainContent')
		<section class="movie-banner movie-quiz">
			<div class="movie-banner-img">
				@foreach($questions as $question)
					<?php $img=$question->image; ?>
					<img src="../{{ $img }}" alt="Image relative à la question {{ $question->title }}" />
				@endforeach
				<div class="quiz container">
					<div class="quiz-title">
						@foreach($questions as $question)
						<?php $tag=$question->tag; ?>
							<p class="question-title">{{ $question->title }}</p>
						@endforeach
					</div>
					<div class="yes col-md-6 col-sm-6 col-xs-6">
						<p><a title="Je répond positivement à cette question" href="/question3/{{ $tag }}">YES</a></p>
					</div>
					<div class="no col-md-6 col-sm-6 col-xs-6">
						<p><a title="Je répond negativement à cette question" href="">NO<input type="button" onclick='window.location.reload(false)' value="Rafraichir"/></a></p>
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
		<div class="movies-result container">
			<ul>
			@foreach($response as $key => $value)
					<li class="col-md-2 col-sm-3 col-xs-4 results-quiz-movies yesmk">
						<div class="proposal-image">
							<a title="Accéder au film {{ $value['title'] }}" href="#">
								<img src="https://image.tmdb.org/t/p/w780/{{ $value['poster_path'] }}" alt="affiche du film {{ $value['title'] }}" title="{{ $value['title'] }}"/>
							</a>
							<div class="overlay">
								<a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">
									<img src="../img/more.png" alt="Image pour en savoir davantage sur le film {{ $value['title'] }}" />
								</a>
							</div>
						</div>
						<div class="detector">
							<img class="bulle-detector" src="../img/bulle-green.png" alt="Film correspondant à tous les critères" />
						</div>
						<div class="proposal-details">
							<a title="{{ $value['title'] }}" href="/movies/{{ $value['id'] }}-{{ str_slug( $value['title'], '-') }}">{{ $value['title'] }}</a>
						</div>
					</li>
			@endforeach
			</ul>
		</div>
		<div class="movie-continue container">
			<div class="continue">
				<a title="Afficher davantage de films" href="#">
					<img src="../img/continue.png" alt="Lien pour afficher davantage de film" />
				</a>
			</div>
		</div>
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="../js/bootstrap.min.js"></script> <!-- important -->
@endsection
