@extends('layouts.public')




@section('main_konten')

<a class="btn btn-primary pull-right" href="{!! route('galery.images', $img->mst_album_galery_id) !!}"> <i class='fa fa-arrow-left'></i> back</a>

	<h1>@Album : {!! $img->mst_album_galery->judul !!}</h1>
	<hr>



<img  class="image-responsive img-thumbnail center-block" src="/upload/galery/{!! $img->nama_file !!}" alt="...">




@endsection