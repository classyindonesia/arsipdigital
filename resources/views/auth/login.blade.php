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


  


      <div class='col-md-6  animated fadeIn' style='padding-top:3px;'>

      <div class='col-md-12 jumbotron nimated fadeIn'>
	      <h1 style='margin-top: 0px;'> <i class='fa fa-cubes'></i> Arsip Digital</h1>
	      <hr style='margin:2px;'>
	        {!! env('DESKRIPSI_APP') !!}
      </div>


      <div class='col-md-12 nimated fadeIn'>
	      <h3 style='margin-top: 0px;font-weight:bold;'> <i class='fa fa-angle-right'></i> Latest News</h3>
	      <hr style='margin:2px;'>
			<?php 
			$berita = \App\Models\Mst\Berita::orderBy('id', 'DESC')->whereIsPublished(1)->paginate(4);
			?>
			@foreach($berita as $list)
				<b> <i class='fa fa-caret-right'></i> {{ $list->judul }}</b>
				<br>
				{{ str_limit(strip_tags($list->artikel), $limit = 170, $end = '') }} 
					<a style='font-weight:bold;' href="{!! URL::route('berita.public_berita', $list->slug) !!}">selengkapnya...</a>
				<hr style='margin:1px;'>
			@endforeach

			{!! $berita->render() !!}

      </div>

      </div>





<div class='col-md-6'>
	<div class="row">
 

		<div class="col-md-8 col-md-offset-2">

 


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
							<div class="col-md-6">
								<a href="/password/email">Forgot Your Password?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
 

 
@endsection
