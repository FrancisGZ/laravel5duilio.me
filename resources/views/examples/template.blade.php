@extends('examples.layout')

@section('title')
	Curso de laravel 5
@stop

@section('content')

	<p>
		@if (isset ($user))
			
			Bienvenido {{ $user }}

		 @else
		 	
		 	[login]

		 @endif
	</p>

@stop