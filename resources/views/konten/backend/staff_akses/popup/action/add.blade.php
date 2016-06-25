<i style='cursor:pointer;' data-toggle='tooltip' title='add user' class='fa fa-plus-square pull-right' id='add'></i>
<script type="text/javascript">
$('#add').click(function(){
	$('.modal-body').load('{!! URL::route("staff_akses.add_list_user", Request::segment(4)) !!}');
})
</script>