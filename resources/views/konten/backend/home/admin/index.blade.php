@extends('layouts.admin')

@section('main_konten')

           <!-- Main content -->
                <section class="content">


@include('konten.backend.home.admin.komponen.kotak_info')












    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

@include('konten.backend.home.admin.komponen.konten_kiri')

        </section><!-- /.Left col -->


 
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
@include('konten.backend.home.admin.komponen.konten_kanan')



    </section><!-- right col -->
</div><!-- /.row (main row) -->







                </section><!-- /.content -->

@endsection





@section('style_tambahan')
	{!! HTML::style('css/ionicons.min.css') !!}
@endsection


@section('script_tambahan')
    {!! HTML::script('js/plugins/sparkline/jquery.sparkline.min.js') !!}    
    {!! HTML::script('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}    
    {!! HTML::script('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}    
    {!! HTML::script('js/plugins/jqueryKnob/jquery.knob.js') !!}    
    {!! HTML::script('js/plugins/daterangepicker/daterangepicker.js') !!}    
    {!! HTML::script('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}    
@stop


@section('title')	
	Home page

@stop






@section('konten_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@stop
