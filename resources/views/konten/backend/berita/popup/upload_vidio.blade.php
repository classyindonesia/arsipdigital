@include('konten.backend.berita.popup.nav_vidio')


<script type="text/javascript">
$(document).ready(function(){
	$('#upload_vidio').addClass('active');
})
</script>

 

<h3>Upload Vidio Berita</h3>

@if(File::isWritable(public_path('upload/vidio')))
@include('layouts.komponen.backend.src_blueimp')

@include('konten.backend.berita.popup.upload_vidio.form')



@else
    
    <div class='alert alert-danger'>
        error! permision folder <b>public/upload/vidio/ </b> bermasalah


    </div>

@endif



@include('konten.backend.berita.popup.upload_vidio.script')
