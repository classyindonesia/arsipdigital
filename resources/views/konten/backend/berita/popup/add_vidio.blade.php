@include('konten.backend.berita.popup.nav_vidio')


<script type="text/javascript">
$(document).ready(function(){
	$('#daftar_vidio').addClass('active');
})
</script>


<h3>Daftar Vidio Berita</h3>


@foreach($vidio as $list)


 	<video style='cursor:pointer;' id='vidio_src{!! $list->id !!}' width="280" height="200" controls>
	  <source src="/upload/vidio/{!! $list->nama_file_asli !!}" type="video/mp4">
	Your browser does not support the video tag.
	</video>
 

<script type="text/javascript">
$('#vidio_src{!! $list->id !!}').click(function(){
	CKEDITOR.instances['ckeditor'].insertHtml("<video width='380' height='300' controls> <source src='/upload/vidio/{!! $list->nama_file_asli !!}'' type='video/mp4'>Your browser does not support the video tag.</video> <br>");
	console.log('modal hidden');
	$('#myModal').modal('hide');

 
});
</script>

@endforeach
<hr>

@include('konten.backend.berita.popup.add_vidio.pagination')