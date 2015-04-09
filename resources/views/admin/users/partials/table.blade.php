<table class="table table-striped">
  						<tr>
  							<td>#</td>
  							<td>Nombre</td>
  							<td>Email</td>
  							<td>Acciones</td>
  						</tr>
  							@foreach ($users as $user)
  						<tr data-id="{{ $user->id }}">
  							<td>{{ $user->id }}</td>
  							<td>{{ $user->full_name }}</td>
  							<td>{{ $user->email  }}</td>
  							<td>
  								<a href="{{ route('admin.users.edit', $user )}}">Editar</a>
                  
  								<a href="#!" class="btn-delete">Eliminar</a>
  							</td>
  						</tr>
  							@endforeach
					</table>