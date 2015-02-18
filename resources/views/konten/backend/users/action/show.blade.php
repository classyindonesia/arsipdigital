<i data-toggle='tooltip' title='show' style='cursor:pointer;' id='show{{ $list->id }}' class='fa fa-eye'></i>

<script type="text/javascript">
$('#show{{ $list->id }}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! URL::route("users.show", $list->id) !!}')
})
</script>