@extends('layouts.public')

@section('main_konten')

 




 <div class='col-md-8  animated fadeIn' style='padding-top:3px;'>

    <a class='btn btn-primary pull-right' href="/">beranda</a>

      <h3 style='margin-top: 0px;font-weight:bold;'> <i class='fa fa-angle-right'></i> Daftar Berita</h3>
      <hr>


      @include('konten.frontend.berita.daftar_berita.form_pencarian')





  <div class='col-md-12'>


    @foreach($berita as $list)
      <b> <i class='fa fa-caret-right'></i> {{ $list->judul }}</b>
      <br>
      {{ str_limit(strip_tags($list->artikel), $limit = 170, $end = '') }} 
        <a style='font-weight:bold;' href="{!! URL::route('berita.public_berita', $list->slug) !!}">selengkapnya...</a>
      <hr style='margin:1px;'>
    @endforeach

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


 