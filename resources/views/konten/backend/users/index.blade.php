@extends('layouts.admin')

 

@section('title_header')
 

@include('konten.backend.users.tombol.add')
@include('konten.backend.users.tombol.import')
<a class='btn btn-primary pull-right' href="{!! URL::route('users.export') !!}"> <i class='fa fa-file-excel-o'></i> export</a>
	
 <h1 class='title_header '>Daftar Pengguna  </h1>
	<hr>
@stop



@section('main_konten') 

 
 <div class="col-md-6 col-md-offset-6"> 
	@include('konten.backend.users.form_search')
</div>

	@include('konten.backend.users.list_user')
@endsection



@section('title')
Admin Dashboard
@endsection