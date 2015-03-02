@extends('layouts.public')




@section('main_konten')





<h2>Daftar File Lampiran Berita</h2>


<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
   <li class="active">Daftar File Lampiran Berita</li>
</ol>


<hr>

<ul>
@foreach($file as $list)
<?php
$id = $hashids->encode(1000, 2000, $list->id);
?>
	<li style='margin-left:-15px;'> <a href="{!! URL::route('berita.download_lampiran', $id) !!}">{!! $list->nama !!}</a> </li>

@endforeach
</ul>


{!! $file->render() !!}

@endsection