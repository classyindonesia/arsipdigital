<i style='cursor:pointer;' data-toggle='tooltip' title='list user' id='list_user{{ $list->id }}' class='fa fa-th-list'></i> 

<script type="text/javascript">
	$('#list_user{{ $list->id }}').click(function(){
		$('#myModal').modal('show');
		$('.modal-body').load('{{ URL::route("staff_akses.list_user", $list->id) }}');
	})
</script>
