	<?php $no=1; ?>
  @foreach($list_album->mst_galery as $list)
    @if($no==1)
          
      <a href="{!! route('galery.images', $list_album->id) !!}"> 
       @if($list_album->mst_password_media_id == null)
  	         <img style="height:240px;overflow:hidden;" src="/upload/galery/thumbnail_{!! $list->nama_file !!}" alt="...">
  	   @else
            @if( session('album_galery_'.$list_album->id) != null && $list_album->mst_password_media_id != null)
               <img style="height:240px;overflow:hidden;" src="/upload/galery/thumbnail_{!! $list->nama_file !!}" alt="...">
            @else
              <img src="/upload/album_lock.jpg" alt="...">
            @endif
       @endif           
     </a>
      

    @endif
   <?php $no++; ?>
  @endforeach

