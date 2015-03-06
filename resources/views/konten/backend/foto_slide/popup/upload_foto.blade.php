
@if(File::isWritable(public_path('upload/foto_slide')))
    @include('konten.backend.foto_slide.popup.form_upload')
@else
    <h3>Upload Foto Slide</h3>
    <hr>
    <div class='alert alert-danger'>
        error! permision folder <b>public/upload/foto_slide</b> masih bermasalah!
    </div>

@endif


