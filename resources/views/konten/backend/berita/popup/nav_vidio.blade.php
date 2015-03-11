<ul class="nav nav-pills">
  <li role="presentation" id='daftar_vidio'><a href="#">Daftar Vidio</a></li>
  <li role="presentation" id='upload_vidio' ><a href="#">Upload Vidio</a></li>
 </ul>
 <hr>

 <script type="text/javascript">
$('#daftar_vidio').click(function(){
	$('.modal-body').load('{!! route("admin_berita.add_vidio") !!}');
	return false;
});


$('#upload_vidio').click(function(){
	$('.modal-body').load('{!! route("admin_berita.upload_vidio") !!}');
	return false;
});


 </script>