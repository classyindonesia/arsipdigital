<i data-toggle='tooltip' title='edit' class='fa fa-pencil-square' id='edit{{ $list->mst_user->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#edit{{ $list->mst_user->id }}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("users.edit", $list->mst_user->id) }}')

})
</script>

