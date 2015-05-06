@extends('layouts.public')




@section('main_konten')
<a class="btn btn-primary pull-right" href="{!! route('galery.index') !!}"> <i class='fa fa-arrow-left'></i> back</a>

	<h1>Images @ album : {!! $album->judul !!}</h1>
	<hr>

	@include($base_view.'images.list_data')

 @endsection