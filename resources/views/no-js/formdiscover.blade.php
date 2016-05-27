{!! Form::open(
    array(
        'action' => 'DiscoversController@store',
        'class' => 'form',
        'novalidate' => 'novalidate')) !!}
{!! Form::label('primary_release_date', 'Année') !!}
{!! Form::select('primary_release_date', $annees) !!}
{!! Form::label('discover-sortby-select', 'Trier par') !!}
{!! Form::select('discover-sortby-select', [
       'popularity.desc' => 'Popularité descendante',
       'popularity.asc' => 'Popularité ascendante',
       'vote_average.asc' => 'Notes descendantes',
       'vote_average.desc' => 'Notes ascendantes']
) !!}
{!! Form::label('discover-with_genres-select[]', 'Genres') !!}
{!! Form::select('discover-with_genres-select[]', $selectData, null, ['class' => 'form-control', 'multiple' => 'multiple', 'title' => 'Filtrer par genres...']) !!}
{!! Form::label('', '') !!}
{!! Form::submit( 'Rechercher', ['class' => 'btn btn-danger discover-submit']) !!}
{!! Form::close() !!}
