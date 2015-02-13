@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')

 


{{-- env('EKSTENSI_GAMBAR') --}}

 	@include('konten.backend.home.user.komponen.box_jml_arsip')



<div class=' col-md-9 '>
 	@include('konten.backend.home.user.komponen.pesan')
 	@include('konten.backend.home.user.komponen.arsip_terakhir')
</div>

  



    
@endsection



@section('title')
Admin Dashboard
@endsection


@section('script_tambahan')
  <script type="text/javascript" src="/plugins/moment/moment.min.js"></script>
@endsection