			<div class="panel panel-default">
				<div class="panel-heading"> 
					<h3 style='border-left:4px solid #ccc;padding-left:5px;'> Login Sistem </h3> 
					<hr style='margin:1px;'>
					Silahkan masukkan username dan password Anda untuk masuk ke dalam sistem.

				</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/auth/login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<div class="col-md-12">
								<input placeholder='email...' type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group">
 							<div class="col-md-9">
								<input placeholder='email...' type="password" class="form-control" name="password">
							</div>
							<div class="col-md-3">
								<button type="submit" class="btn btn-primary pull-right" style="margin-right: 15px;">
									Log in
								</button>	
							</div>						
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>
									<input type="checkbox" name="remember"> Remember Me
								</label>
							</div>
 
						</div>
					</form>
				</div>
			</div>
