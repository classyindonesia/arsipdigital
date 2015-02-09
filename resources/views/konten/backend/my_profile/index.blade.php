@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>My Profile  </h1>
	<hr>
@stop






@section('main_konten')


<div class='col-md-6 animated fadeIn'>
	@include('konten.backend.my_profile.konten_kiri')
</div>

<div class='col-md-6 animated fadeIn'>
	@include('konten.backend.my_profile.konten_kanan')
</div>



    
@endsection



@section('title')
My Profile
@endsection