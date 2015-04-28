@extends('layouts.public')

@section('main_konten')

 

<a class='btn btn-primary pull-right' href="{!! URL::route('pengguna.search') !!}"> <i class='fa fa-angle-left'></i> kembali ke hasil pencarian</a>
<h2>Detail Data  </h2>
<hr>
<div class="col-md-5">

<?php

$path  = public_path('upload/avatars/'.md5($pengguna->mst_user->email).'.jpg');

if(!file_exists($path)){
	$path = '/upload/user.jpg';
}else{
  $path = '/upload/avatars/'.md5($pengguna->mst_user->email).'.jpg';
}
?>

<img src="{!! $path !!}" class="img-responsive img-thumbnail" alt="Responsive image">

</div>
<div class='col-md-7'>
 	<table class='table table-bordered'>
  		<tr>
  			<td>Nama</td>
  			<td>{!! $pengguna->nama !!}</td>
  		</tr>
  		<tr>
  			<td>TTL</td>
  			<td>{!! $pengguna->tempat_lahir !!}, {!! Fungsi::date_to_tgl($pengguna->tgl_lahir) !!}
  			</td>
  		</tr>  		
  		<tr>
  			<td>Email</td>
  			<td>{!! $pengguna->mst_user->email !!}</td>
  		</tr>  		
  		<tr>
  			<td>Alamat</td>
  			<td>{!! $pengguna->alamat !!}</td>
  		</tr>    		

  		<tr>
  			<td>Kota tmpat tgl</td>
  			<td> @if(count($pengguna->ref_kota)>0) {!! $pengguna->ref_kota->nama !!} @else - @endif </td>
  		</tr>    
  		<tr>
  			<td>NO HP</td>
  			<td>{!! $pengguna->no_hp !!}</td>
  		</tr> 
  		<tr>
  			<td>Home Base</td>
  			<td> @if(count($pengguna->ref_homebase)>0) {!! $pengguna->ref_homebase->nama !!} @else - @endif </td>
  		</tr>   
  	</table> 
</div>




@endsection
