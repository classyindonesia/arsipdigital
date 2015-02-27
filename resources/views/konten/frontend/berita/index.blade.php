@extends('layouts.public')

@section('main_konten')

 

<h1 style='margin:2px;'> <a href="/"><i class='fa fa-arrow-left'></i></a> </h1>

<h2>{{ $berita->judul }}</h2>
<i class='fa fa-calendar'></i> {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($berita->created_at))) }}
||
<i class='fa fa-clock-o'></i> {{ date('H:i', strtotime($berita->created_at)) }} [WIB]
 <hr>


{!! $berita->artikel !!}

@if(count($berita->berita_to_lampiran)>0)
  <hr>
  <b>File Lampiran :</b><br>
  <ul>
    @foreach($berita->berita_to_lampiran as $list_lampiran)
        @if(count($list_lampiran->mst_lampiran)>0)
    		<?php
    		$id = $hashids->encode(1000, 2000, $list_lampiran->mst_lampiran->id);
    		?>

        <li> <a class='label bg-yellow' target='__blank' href="{!! URL::route('berita.download_lampiran', $id) !!}">
           <i class='fa fa-cloud-download'></i> {!! $list_lampiran->mst_lampiran->nama !!}</a> </li>
        @endif
    @endforeach
  </ul>
@endif
    

<hr>

@if($berita->komentar == 1)
  @include('konten.frontend.berita.komentar')
@endif


@endsection



@section('script_bottom')
    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '{!! env("DISQUS_SHORTNAME") !!}'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
@endsection