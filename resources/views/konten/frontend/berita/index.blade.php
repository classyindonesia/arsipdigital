@extends('layouts.public')

@section('main_konten')

 
 <div class='col-md-8  animated fadeIn' style='padding-top:3px;'>

 

  <div class='col-md-12 nimated fadeIn'>
  @include($base_view.'komponen.lock_berita')
  @include($base_view.'header_berita')
  <hr>

    @if( session('berita_'.$berita->id) == null && $berita->mst_password_media_id != 0 || $berita->mst_password_media_id != "")
        @include($base_view.'lock_berita')
    @else
      
       
      {!! $berita->artikel !!}
      @include($base_view.'lampiran')
      <hr>
      @include('konten.frontend.berita.komentar')
    @endif






  </div>
 </div>



<div class='col-md-4'>
  <div class="row">
 

    <div class="col-md-10 col-md-offset-2">

 
    @include('konten.frontend.auth.login.form_login')




      
    @include('konten.frontend.auth.login.list_file')

  
    </div>
  </div>
</div>
 





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