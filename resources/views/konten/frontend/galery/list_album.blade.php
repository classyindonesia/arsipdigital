<div class="row">

  @foreach($album as $list_album)

    <div class=" col-md-4">
      <div style="height:340px;overflow:hidden;" class="thumbnail">
      @if(count($list_album->mst_galery)<=0)
        <img src="/upload/album_kosong.jpg" alt="...">
        @else

      	<?php $no=1; ?>
        @foreach($list_album->mst_galery as $list)
          @if($no==1)
              <a href="{!! route('galery.images', $list_album->id) !!}"> 
        	      <img style="height:240px;overflow:hidden;" src="/upload/galery/thumbnail_{!! $list->nama_file !!}" alt="...">
       	     </a>
          @endif
         <?php $no++; ?>
        @endforeach

      @endif
        <div class="caption">
          <h3>{!! $list_album->judul !!} </h3>
          <p>{!! $list_album->keterangan !!}</p>
        </div>
      </div>
   </div>

  @endforeach
</div>

{!! $album->render() !!}