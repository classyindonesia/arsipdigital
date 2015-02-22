<i data-toggle='tooltip' title='detail file lampiran' class='fa fa-eye' style='cursor:pointer;' id='view{{ $list->id }}'></i>
<script type="text/javascript">
$('#view{{ $list->id }}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! URL::route("lampiran_berita.view_detil", $list->id) !!}')
})
</script>