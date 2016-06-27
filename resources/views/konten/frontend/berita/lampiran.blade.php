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
    