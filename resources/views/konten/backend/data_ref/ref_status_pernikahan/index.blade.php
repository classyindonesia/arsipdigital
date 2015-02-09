@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Daftar Status Pernikahan  <small>control panel</small> </h1>
<hr style='margin-top:2px;'>
@stop






@section('main_konten')

@include('konten.backend.data_ref.ref_status_pernikahan.tombol_add')


@include('konten.backend.data_ref.komponen.nav_atas')

<hr>


<div class='col-md-9'>
        <table class="table table-bordered table-hover animated fadeIn">
            <thead>
                <tr>
                    <th width='5%'>No.</th>
                    <th>Nama</th>
                    <th width='10%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = $status_pernikahan->currentPage(); ?>
                @foreach($status_pernikahan as $list)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $list->nama }}</td>
                        <td> @include('konten.backend.data_ref.ref_status_pernikahan.action') </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach            
            </tbody>
        </table>
{!! $status_pernikahan->render() !!}
</div>


 
    
@endsection



@section('title')
Admin Dashboard
@endsection