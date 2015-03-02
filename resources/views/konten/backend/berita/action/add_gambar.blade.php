<span style='cursor:pointer' id='add_gambar' class='label bg-olive'> <i class='fa fa-image'></i> add gambar</span>
<script type="text/javascript">
$('#add_gambar').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! URL::route("admin_berita.add_gambar") !!}');
})
</script>