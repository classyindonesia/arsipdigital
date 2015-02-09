@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Data Referensi  <small>control panel</small> </h1>
<hr style='margin-top:2px;'>
@stop






@section('main_konten')



@include('konten.backend.data_ref.komponen.nav_atas')

<hr>

                        <div class="col-md-6 animated fadeIn">
                            <!-- Primary tile -->
                            <div class="box box-solid bg-light-blue">
                                <div class="box-header">
                                    <h3 class="box-title"> 
                                    <i class='fa fa-info'></i> Data Referensi</h3>
                                </div>
                                <div class="box-body">
                                    <p>Data yang digunakan untuk mengisi
                                    	data master atau data utama
                                    </p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->

 
    
@endsection



@section('title')
Admin Dashboard
@endsection