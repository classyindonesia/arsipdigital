<a data-toggle='tooltip' title='edit' href="{!! URL::route('admin_berita.edit', $list->id) !!}"> <i class='fa fa-pencil-square'></i> </a>

||

<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>
<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::route("admin_berita.del") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}'},
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		})
	}
})
</script>
