@if($list->mst_user->id != Auth::user()->id)
	<i data-toggle='tooltip' title='delete' class='fa fa-times' style='cursor:pointer;' id='del{{ $list->mst_user->id }}'></i>
	<script type="text/javascript">
	$('#del{{ $list->mst_user->id }}').click(function(){
		setuju = confirm('are you sure?');
		if(setuju == true){
			$.ajax({
				url : '{{ URL::route("users.del") }}',
				data : {id : '{{ $list->mst_user->id }}', _token : '{!! csrf_token() !!}'},
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
@endif