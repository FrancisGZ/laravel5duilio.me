@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios</div>

				<div class="panel-body">
					
          <a class="btn btn-info" href="{{ route('admin.users.create') }}" role="button">Crear usuario</a>

          <!--<p>Hay {{ $users->total()}} registros</p>-->

					<table class="table table-striped">
  						<tr>
  							<td>#</td>
  							<td>Nombre</td>
  							<td>Email</td>
  							<td>Acciones</td>
  						</tr>
  							@foreach ($users as $user)
  						<tr>
  							<td>{{ $user->id }}</td>
  							<td>{{ $user->full_name }}</td>
  							<td>{{ $user->email  }}</td>
  							<td>
  								<a href="">Editar</a>
  								<a href="">Eliminar</a>
  							</td>
  						</tr>
  							@endforeach
					</table>
					{!! $users->render() !!} <!--PAginacion-->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
