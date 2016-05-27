{!! Form::open(
    array(
        'action' => 'DiscoversController@store',
        'class' => 'form form-js',
        'novalidate' => 'novalidate')) !!}
{!! Form::label('primary_release_date', 'Année') !!}
{!! Form::select('primary_release_date', $annees, null, ['class' => 'selectpicker']) !!}
{!! Form::label('discover-sortby-select', 'Trier par') !!}
{!! Form::select('discover-sortby-select', [
       'popularity.desc' => 'Popularité descendante',
       'popularity.asc' => 'Popularité ascendante',
       'vote_average.asc' => 'Notes descendantes',
       'vote_average.desc' => 'Notes ascendantes'],
       null,
       [
       'class' => 'discover-sortby selectpicker'
       ]
) !!}
{!! Form::label('discover-with_genres-select[]', 'Genres') !!}
{!! Form::select('discover-with_genres-select[]', $selectData, null, ['class' => 'discover-genre selectpicker', 'multiple' => 'multiple', 'title' => 'Filtrer par genres...']) !!}
{!! Form::label('discover-with_tags-select[]', 'Mots-clés') !!}
{!! Form::select('discover-with_tags-select[]', $selectTags, null, ['class' => 'discover-tags selectpicker', 'data-live-search' => 'true', 'multiple' => 'multiple', 'data-size' => '4', 'title' => 'Filtrer par mots-clés...']) !!}
{!! Form::label('', '') !!}
{!! Form::submit( 'Rechercher', ['class' => 'btn btn-danger discover-submit']) !!}
{!! Form::close() !!}
