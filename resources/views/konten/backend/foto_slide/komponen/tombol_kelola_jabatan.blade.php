<button style='margin-right:1em;' class='btn btn-primary pull-right' id='jabatan'> <i class='fa fa-th-list'></i> Jabatan</button>
<script type="text/javascript">
$('#jabatan').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("foto_slide.jabatan") }}');
});
</script>
