@extends('layouts.admin')

 

@section('title_header')	
 
 <h1 class='title_header '> <i class='fa fa-bar-chart'></i> Statistik Visitor  </h1>
<hr>
@stop

@section('script_tambahan')
	<script src="/plugins/highcharts/highcharts.js"></script>
	<script src="/plugins/highcharts/modules/exporting.js"></script>
@endsection


@section('main_konten') 


	@include($base_view.'statistik')



@endsection



@section('title')
	 Statistik Visitor
@endsection