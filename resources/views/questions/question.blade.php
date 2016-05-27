@extends ('layout')
@section('title', 'quiz' )
@section('mainContent')
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
						<p><a title="Je répond positivement à cette question" href="/question2/{{ $tag }}">YES</a></p>
					</div>
					<div class="no col-md-6 col-sm-6 col-xs-6">
						<p><a title="Je répond négativement à cette question" href="/question">NO</a></p>
					</div>
				</div>
			</div>
			<div class="movie-border">
			</div>
			<div class="movie-border-txt">
				<p class="container">
					Les films correspondants à vos envies :
				</p>
			</div>
		</section>
		<section class="movies-container container">
			<div class="loading">
				<p>Répondez à cette première question pour afficher quelques propositions</br><span>...</span></p>
			</div>
		</section>
		<script src="../js/jquery.js" type="text/javascript"></script>
		<script src="../js/bootstrap.min.js"></script> <!-- important -->
@endsection
