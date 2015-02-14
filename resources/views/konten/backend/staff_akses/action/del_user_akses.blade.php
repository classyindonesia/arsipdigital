<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<i data-toggle='tooltip' title='del' class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>
<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		form_data = {
			id : '{{ $list->id }}', 
			_token : '{!! csrf_token() !!}',
			mst_user_staff_id : '{{ Request::segment(3) }}'
			}
		$.ajax({
			url : '{{ URL::route("staff_akses.del_akses") }}',
			data : form_data,
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				$('.modal-body').load('{!! URL::route("staff_akses.list_user", Request::segment(3)) !!}')
				//window.location.reload();
			}
		})
	}
})
</script>
