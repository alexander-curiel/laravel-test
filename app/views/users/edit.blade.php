{{--
@extends('users.scaffold')

@section('main')
--}}

<h1>Actualizar Usuario</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
<ul>
	<li>
		{{ Form::label('real_name', 'Real Name:') }}
		{{ Form::text('real_name') }}
	</li>
	<li>
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email') }}
	</li>
	<li>
		{{ Form::label('password','Password:') }}
		{{ Form::password('password') }}
	</li>
</ul>

{{ Form::submit('Actualizar Usuario') }}
{{ Form::close() }}






{{-- COMMENTS --}}
{{--
Create a list with numbers ranging from 10 to 20.
{{Form::selectRange('number', 10, 20);}}
 
// Create a list with years ranging from 1900 to 2000.
{{Form::selectYear('year', 1900, 2000);}}
 
// Creates a list with month names.
{{Form::selectMonth('month');}}
-->

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop
--}}