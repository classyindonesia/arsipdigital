<i class='fa fa-pencil-square' id='edit_jabatan{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#edit_jabatan{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("foto_slide.edit_jabatan", $list->id) }}')

})
</script>

