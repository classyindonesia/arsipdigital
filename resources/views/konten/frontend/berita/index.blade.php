@extends('layouts.public')

@section('main_konten')


    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{!! URL::route('home.index') !!}"><i class='fa fa-cubes'></i> {!! env("NAMA_APP") !!} </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">


        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


<h1 style='margin:2px;'> <a href="/"><i class='fa fa-arrow-left'></i></a> </h1>

<h2>{{ $berita->judul }}</h2>
<i class='fa fa-calendar'></i> {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($berita->created_at))) }}
||
<i class='fa fa-clock-o'></i> {{ date('H:i', strtotime($berita->created_at)) }} [WIB]
 <hr>


{!! $berita->artikel !!}

 
<hr>

@if($berita->komentar == 1)
  @include('konten.frontend.berita.komentar')
@endif


@endsection
