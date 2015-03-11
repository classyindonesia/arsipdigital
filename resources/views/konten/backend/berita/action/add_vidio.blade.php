 
<span style='cursor:pointer' id='add_vidio' class='label bg-light-blue'> <i class='fa fa-file-video-o'></i> add vidio</span>
<script type="text/javascript">
$('#add_vidio').click(function(){
	$('#myModal').modal('show');
	$('.modal-dialog').addClass('modal-lg');
	$('.modal-body').load('{!! URL::route("admin_berita.add_vidio") !!}');
})
</script>
