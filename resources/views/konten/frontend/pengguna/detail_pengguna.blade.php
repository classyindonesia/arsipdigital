@extends('layouts.public')

@section('main_konten')

 

<a class='btn btn-primary pull-right' href="{!! URL::route('pengguna.search') !!}"> <i class='fa fa-angle-left'></i> kembali ke hasil pencarian</a>
<h2>Detail Data Pengguna</h2>
<hr>

<div class='col-md-7'>
 	<table class='table table-bordered'>
  		<tr>
  			<td>Nama</td>
  			<td>{!! $pengguna->nama !!}</td>
  		</tr>
  		<tr>
  			<td>Email</td>
  			<td>{!! $pengguna->mst_user->email !!}</td>
  		</tr>  		
  	</table> 

 

</div>
@endsection
