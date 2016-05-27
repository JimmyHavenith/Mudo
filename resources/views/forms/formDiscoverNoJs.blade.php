{!! Form::open(
    array(
        'action' => 'DiscoversController@store',
        'class' => 'form form-no-js',
        'novalidate' => 'novalidate')) !!}
{!! Form::label('primary_release_date', 'Année', null, ['class' => 'form-control']) !!}
{!! Form::select('primary_release_date', $annees, null, ['class' => 'form-control']) !!}
{!! Form::label('discover-sortby-select', 'Trier par') !!}
{!! Form::select('discover-sortby-select', [
       'popularity.desc' => 'Popularité descendante',
       'popularity.asc' => 'Popularité ascendante',
       'vote_average.asc' => 'Notes descendantes',
       'vote_average.desc' => 'Notes ascendantes'],
       null,
       [
       'class' => 'form-control'
       ]
) !!}
{!! Form::label('discover-with_genres-select[]', 'Genres') !!}
{!! Form::select('discover-with_genres-select[]', $selectData, null, ['class' => 'form-control', 'multiple' => 'multiple', 'title' => 'Filtrer par genres...']) !!}
{!! Form::label('discover-with_tags-select[]', 'Mots-clés') !!}
{!! Form::select('discover-with_tags-select[]', $selectTags, null, ['class' => 'form-control', 'data-live-search' => 'true', 'multiple' => 'multiple', 'data-size' => '4', 'title' => 'Filtrer par mots-clés...']) !!}
{!! Form::label('', '') !!}
{!! Form::submit( 'Rechercher', ['class' => 'btn btn-danger discover-submit']) !!}
{!! Form::close() !!}
