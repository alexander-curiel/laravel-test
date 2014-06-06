<h1>Login</h1>

{{ Form::open(array('url' => 'login')) }}

<!-- if there are login errors, show them here -->
@if ($error = $errors->first('password'))
<div class="alert alert-danger">
	{{ $error }}
</div>
@endif

<p>
	{{ Form::label('email', 'Email:') }}
	{{ Form::text('email', Input::old('email')) }}
</p>
<p>

	{{ Form::label('password', 'Password:') }}
	{{ Form::password('password') }}
</p>
<p>{{ Form::submit() }}</p>
{{ Form::close() }}