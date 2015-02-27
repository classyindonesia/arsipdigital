@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Config App </h1>
<hr style='margin-top:2px;'>
@stop






@section('main_konten')

<table class='table table-bordered'>
    <tr>
        <td class='text-center' width='5%'>No.</td>
        <td>Nama Config</td>
        <td>Status/Value</td>
        <td width='15%'>Action</td>
    </tr>
    @include('konten.backend.config.list_config.akses_pencarian_publik')
    @include('konten.backend.config.list_config.akses_password_publik')

</table>

 
    
@endsection



@section('title')
Config App
@endsection