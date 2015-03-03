
@include('konten.backend.berita.popup.nav')



<h3>Upload Gambar Berita</h3>

@if(File::isWritable(public_path('upload/gambar_berita')))
@include('layouts.komponen.backend.src_blueimp')

@include('konten.backend.berita.popup.upload_gambar.form')



@else
    
    <div class='alert alert-danger'>
        error! permision folder <b>public/upload/gambar_berita/ </b> bermasalah


    </div>

@endif



@include('konten.backend.berita.popup.upload_gambar.script')
