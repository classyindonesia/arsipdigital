<i style='cursor:pointer;' data-toggle='tooltip' title='download or view' id='dp{{ $list->id }}' class='fa fa-external-link'></i>

<script type="text/javascript">
/* 
$('#download{{ $list->id }}').click(function(){
	window.location.href = '{!! URL::route("my_archive.download_file", $list->id) !!}'
})
*/
$('#dp{{ $list->id }}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! URL::route("my_archive.before_download", $list->id) !!}')
})
</script>