@extends('layouts.public')




@section('main_konten')

<a class="btn btn-primary pull-right" href="{!! route('galery.images', $img->mst_album_galery_id) !!}"> <i class='fa fa-arrow-left'></i> back</a>
    @include($base_view.'image.komponen.tombol_lock')
	<h1>@Album : {!! $img->mst_album_galery->judul !!}</h1>
	<hr>

    @if( session('album_galery_'.$img->mst_album_galery->id) == null && $img->mst_album_galery->mst_password_media_id != null)
        @include($base_view.'image.lock_album')
    @else
        <img  class="image-responsive img-thumbnail center-block" src="/upload/galery/{!! $img->nama_file !!}" alt="...">
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