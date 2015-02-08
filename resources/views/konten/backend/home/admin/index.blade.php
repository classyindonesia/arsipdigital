@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')
@include('konten.backend.home.admin.komponen.box_user')
@include('konten.backend.home.admin.komponen.box_jml_arsip')
@include('konten.backend.home.admin.komponen.box_jml_rak_arsip')















<div class="col-lg-3 col-xs-6">
	    <div class="small-box bg-aqua">
		    <div class="inner">
		        <h3>
		            300
		        </h3>
		        <p>
		            Jml File Arsip
		        </p>
		    </div>
		    <div class="icon">
		       <i class="fa fa-bar-chart"></i>
		    </div>
		    <a href="#" class="small-box-footer">
		        More info <i class="fa fa-arrow-circle-right"></i>
		    </a>
		</div>
</div>






    
@endsection



@section('title')
Admin Dashboard
@endsection