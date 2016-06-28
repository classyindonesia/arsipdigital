<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>

<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){

setuju = confirm('are you sure?');
if(setuju == true){
			$.ajax({
				url : '{{ route("backend.filter_domain.delete") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					swal('error', 'terjadi kesalahan pada sisi server!', 'error');
				},
				success:function(ok){
					window.location.reload();
				}
			})		
}



});
</script>


