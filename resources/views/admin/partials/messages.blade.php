

					@if ($errors->any())

							<div class="alert alert-danger" role="alert">...</div>
							
						<p>Corregir errores</p>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>

					@endif
