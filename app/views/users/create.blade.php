<h1>Crear Usuario</h1>
{{ Form::open(array('route' => 'users.store')) }}
	Nombre Real: <input type="text" name="real_name"/><br>
	Email: <input type="text" name="email"/><br>
	Password: <input type="password" name="password"/><br>
	<input type="submit" value="Crear Usuario"/>
{{ Form::close() }}