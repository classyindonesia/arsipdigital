<span style='cursor:pointer;' id='del{{ Request::segment(4) }}' class='label label-info pull-right'>
<i class='fa fa-plus-square' ></i>
 all	
</span>

<script type="text/javascript">
$('#del{{ Request::segment(4) }}').click(function(){

	setuju = confirm('are you sure?');
	if(setuju == true){

			$.ajax({
				url : '{{ route("staff_akses.insert_all_user") }}',
				data : {mst_user_staff_id : '{{ Request::segment(4) }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					swal('error', 'terjadi kesalahan pada sisi server!', 'error');
				},
				success:function(ok){
					$('.modal-body').load('{!! URL::route("staff_akses.list_user", Request::segment(4)) !!}')
				}
			})	

	}
  

});
</script>


