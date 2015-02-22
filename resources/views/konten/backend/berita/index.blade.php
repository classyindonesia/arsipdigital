@extends('layouts.admin')

 

@section('title_header')	
 @include('konten.backend.berita.tombol_add')

 <h1 class='title_header '>Daftar Berita  </h1>
<hr>
@stop



@section('main_konten') 
@include('konten.backend.berita.komponen.nav_atas')

<div class="col-md-6 col-md-offset-6" style='margin-bottom:4px;'> 
	@include('konten.backend.berita.form_search')

</div>

	@include('konten.backend.berita.list_data')
@endsection



@section('title')
	 Daftar Berita
@endsection