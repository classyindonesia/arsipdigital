@foreach($album as $list_album)
	

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">

    @if(count($list_album->mst_galery)<=0)
      <img src="/upload/album_kosong.jpg" alt="...">
      @else

    	@foreach($list_album->mst_galery as $list)
	      <img src="/upload/galery/thumbnail_{!! $list->nama_file !!}" alt="...">
	    @endforeach

    @endif
      <div class="caption">
        <h3>{!! $list_album->judul !!}</h3>
        <p>{!! $list_album->keterangan !!}</p>

      </div>
    </div>
  </div>
</div>


@endforeach


{!! $album->render() !!}