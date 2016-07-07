@foreach($galery as $list)
	<div class="col-md-4 img-thumbnail" style="height:250px;overflow:hidden;margin-bottom:1em;">
		<i class='fa fa-times text-danger cursor' id='hapus{!! $list->id !!}' style='margin-bottom:-1em;float:right'></i>
		<img src="/upload/galery/thumbnail_{!! $list->nama_file !!}" class="img-responsive " alt="Responsive image">	
		<b>Album : </b>
		@if(count($list->mst_album_galery)>0) 
			{!! $list->mst_album_galery->judul !!} 
			@if($list->mst_album_galery->mst_password_media_id != null )
				<i class='fa fa-lock text-danger'></i>
			@endif
		@else 
		 - 
		@endif
	</div>
	
	@include($base_view.'action')

@endforeach

{!! $galery->appends(Request::all())->render() !!}

 