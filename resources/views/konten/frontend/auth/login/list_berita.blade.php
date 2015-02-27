  <div class='col-md-12 jumbotron nimated fadeIn'>
      <h1 style='margin-top: 0px;'> <i class='fa fa-cubes'></i> {!! env('LOGIN_MSG_HEADER') !!}</h1>
      <hr style='margin:2px;'>
        {!! env('DESKRIPSI_APP') !!}
  </div>


  <div class='col-md-12 nimated fadeIn'>

    <a class='btn btn-primary pull-right' href="{!! URL::route('berita.daftar_berita') !!}">daftar berita</a>

      <h3 style='margin-top: 0px;font-weight:bold;'> <i class='fa fa-angle-right'></i> Latest News</h3>
      <hr style='margin:2px;'>
		@foreach($berita as $list)
			<b> <i class='fa fa-caret-right'></i> {{ $list->judul }}</b>
			<br>
			{{ str_limit(strip_tags($list->artikel), $limit = 170, $end = '') }} 
				<a style='font-weight:bold;' href="{!! URL::route('berita.public_berita', $list->slug) !!}">selengkapnya...</a>
			<hr style='margin:1px;'>
		@endforeach

		{!! $berita->render() !!}

  </div>