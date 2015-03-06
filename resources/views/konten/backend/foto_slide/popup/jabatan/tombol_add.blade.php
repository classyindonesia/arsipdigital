<button class='btn btn-primary pull-right' id='add_jabatan'> <i class='fa fa-plus-square'></i> create</button>
<script type="text/javascript">
$('#add_jabatan').click(function(){
 	$('.modal-body').load('{{ URL::route("foto_slide.add_jabatan") }}');
})
</script>
