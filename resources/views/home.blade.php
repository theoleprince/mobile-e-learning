@if(Auth::user()->hasRole('user'))
@include('admin.client.formation')

@elseif (Auth::user()->hasRole('superadministrator') ||Auth::user()->hasRole('administrator')
||Auth::user()->hasRole('formateur'))
@include('welcome')
@endif