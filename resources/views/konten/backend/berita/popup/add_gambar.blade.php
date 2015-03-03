@include('konten.backend.berita.popup.nav')

<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h3 style='margin:2px'>Daftar Gambar Berita</h3>
<hr style='margin:2px'>
<script type="text/javascript">
$(document).ready(function(){
	$('#daftar_gambar').addClass('active');
	$('#upload_gambar').removeClass('active');
})
</script>

@include('konten.backend.berita.popup.add_gambar.style')
 

@foreach($gambar as $list)

@include('konten.backend.berita.popup.add_gambar.konten')


	
@include('konten.backend.berita.popup.add_gambar.script')


	

@endforeach

<hr>

@include('konten.backend.berita.popup.add_gambar.pagination')



