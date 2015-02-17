@extends('layouts.public')

@section('main_konten')


    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{!! URL::route('home.index') !!}"><i class='fa fa-cubes'></i> {!! env("NAMA_APP") !!} </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">


        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


 






 







	<div class="row">
 

		<div class="col-md-8 col-md-offset-2">

	<ul class="nav nav-tabs">
	  <li role="presentation"  class="active"><a href="{{ URL::to('auth/login') }}">Login</a></li>
	  <li role="presentation"><a href="{{ URL::to('auth/register') }}">Register</a></li>
	 </ul>


			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
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
							<div class="col-md-6">
								<a href="/password/email">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


 


@endsection
