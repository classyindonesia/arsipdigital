@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')
 
<div class="col-lg-3 col-xs-6 animated fadeIn">
 	@include('konten.backend.home.web.komponen.box_jml_berita')
 	@include('konten.backend.home.web.komponen.box_jml_lampiran')
 	@include('konten.backend.home.web.komponen.box_jml_album_galery')
</div>
<div class=' col-md-9 '>
 	@include('konten.backend.home.web.komponen.berita_terakhir')
</div>

    
@endsection



@section('title')
Admin Dashboard
@endsection


 