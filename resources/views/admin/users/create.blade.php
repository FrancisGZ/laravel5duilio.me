@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo usuario</div>

				<div class="panel-body">

					@include('admin.partials.messages')

					<div class="alert alert-danger" role="alert">...</div>

					@if ($errors->any())

						<p>Corregir errores</p>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>

					@endif

          {!! Form::open(['route' => 'admin.users.store','method' => 'POST']) !!}


                    @include('admin.users.partials.fields')
                 
                  <button type="submit" class="btn btn-default">Crear usuario</button>

          {!! Form::close() !!}

        
			
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
