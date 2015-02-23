<div class='col-md-12 panel panel-default'>
	<h3 style='padding-left:0.5em;border-left: solid 4px #ccc;'>File Terbaru</h3>
	<hr style='margin:2px;'>
	<ul>
		@foreach($lampiran_berita as $list)
			<li> <a href="{!! URL::route('berita.download_lampiran', $list->id) !!}">{!! $list->nama !!}</a> </li>
		@endforeach
	</ul>

</div>