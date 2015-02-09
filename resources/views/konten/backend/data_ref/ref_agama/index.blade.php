@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Daftar Agama  <small>control panel</small> </h1>
<hr style='margin-top:2px;'>
@stop






@section('main_konten')

@include('konten.backend.data_ref.ref_agama.tombol_add')


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
                <?php $no = $agama->currentPage(); ?>
                @foreach($agama as $list)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $list->nama }}</td>
                        <td> @include('konten.backend.data_ref.ref_agama.action') </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach            
            </tbody>
        </table>
{!! $agama->render() !!}
</div>


 
    
@endsection



@section('title')
Admin Dashboard
@endsection