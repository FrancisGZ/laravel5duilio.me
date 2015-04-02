{!! Form::open(['route' => ['admin.users.destroy',$user], 'method' => 'DELETE']) !!}
	
	<button type="submit" onclick="return confirm('Seguro que desa eliminar el resgitro')" class="btn btn-danger">Eliminar</button>
	
{!! Form::close() !!}