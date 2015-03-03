<ul class="nav nav-pills">
  <li role="presentation" id='daftar_gambar'><a href="#">Daftar Gambar</a></li>
  <li role="presentation" id='upload_gambar' ><a href="#">Upload Gambar</a></li>
 </ul>
 <hr>

 <script type="text/javascript">
$('#daftar_gambar').click(function(){
	$('.modal-body').load('{!! route("admin_berita.add_gambar") !!}');
	return false;
});


$('#upload_gambar').click(function(){
	$('.modal-body').load('{!! route("admin_berita.upload_gambar") !!}');
	return false;
});


 </script>