<link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">

<h1>Usuarios</h1>

@if(count($users) > 0)
<ul>
	@foreach($users as $user)
		<li>{{ $user->real_name }} - {{$user->email }} - {{ Form::delete('users/'. $user->id, 'Borrar') }} - {{ HTML::link('users/'.$user->id . '/edit', 'Actualizar Datos') }}</li>
	@endforeach
</ul>
@else
	Todavía no hay ningún usuario registrado
@endif

{{ HTML::link('users/create', 'Crear un Usuario') }}