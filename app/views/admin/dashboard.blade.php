@if(Auth::check())
<h1>Admin Dashboard</h1>
Te has identificado correctamente como administrador, {{ Auth::user()->real_name }}.
@endif