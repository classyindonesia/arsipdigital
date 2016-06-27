<div class="row">

  @foreach($album as $list_album)

    <div class=" col-md-4">
        <div style="height:340px;overflow:hidden;" class="thumbnail">
        @if(count($list_album->mst_galery)<=0)
          <img src="/upload/album_kosong.jpg" alt="...">
          @else

          @include($base_view.'list_album.list_foto')

        @endif
            <div class="caption">
              <h3>{!! $list_album->judul !!}   
              @if($list_album->mst_password_media_id != null)

                @if( session('album_galery_'.$list_album->id) != null && $list_album->mst_password_media_id != null)
                  <i class='fa fa-lock text-success'></i>
                @else
                  <i class='fa fa-lock text-danger'></i>
                @endif
              @endif
              </h3>
              <p>{!! $list_album->keterangan !!}</p>
            </div>
        </div>
   </div>

  @endforeach
</div>

{!! $album->render() !!}