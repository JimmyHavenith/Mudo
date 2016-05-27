@if(!$fav_exist)
  {!! Form::open(
      array(
          'action' => 'FavoritesController@store',
          'class' => 'form',
          'novalidate' => 'novalidate')) !!}
  {!! Form::hidden('movie_id', $movie['id']) !!}
  {!! Form::hidden('movie_title', $movie['title']) !!}
  {!! Form::hidden('movie_poster', $movie['poster_path']) !!}
  {!! Form::submit( 'Ajouter à ma Watchlist' , ['class' => 'add-wl']) !!}
  {!! Form::close() !!}
@else
  {!! Form::open(
      array(
          'action' => 'FavoritesController@store',
          'class' => 'form',
          'novalidate' => 'novalidate')) !!}
  {!! Form::hidden('movie_id', $movie['id']) !!}
  {!! Form::hidden('movie_title', $movie['title']) !!}
  {!! Form::hidden('movie_poster', $movie['poster_path']) !!}
  {!! Form::hidden('user_id', Auth::id()) !!}
  {!! Form::submit( 'Retirer de ma Watchlist' , ['class' => 'del-wl']) !!}
  {!! Form::close() !!}
@endif
@if(!$view_exist)
  {!! Form::open(
      array(
          'action' => 'ViewsController@store',
          'class' => 'form',
          'novalidate' => 'novalidate')) !!}
  {!! Form::hidden('movie_id', $movie['id']) !!}
  {!! Form::hidden('movie_title', $movie['title']) !!}
  {!! Form::hidden('movie_poster', $movie['poster_path']) !!}
  {!! Form::submit( 'Marquer comme vu' , ['class' => 'add-mkv']) !!}
  {!! Form::close() !!}
@else
  {!! Form::open(
      array(
          'action' => 'ViewsController@store',
          'class' => 'form',
          'novalidate' => 'novalidate')) !!}
  {!! Form::hidden('movie_id', $movie['id']) !!}
  {!! Form::hidden('movie_title', $movie['title']) !!}
  {!! Form::hidden('movie_poster', $movie['poster_path']) !!}
  {!! Form::hidden('user_id', Auth::id()) !!}
  {!! Form::submit( 'Ne plus marquer comme vu' , ['class' => 'del-mkv']) !!}
  {!! Form::close() !!}
@endif
