<i style='cursor:pointer;' class='fa fa-arrow-circle-left' id='back'></i>
<script type="text/javascript">
$('#back').click(function(){
	$('.modal-body').load('{!! URL::route("staff_akses.list_user", Request::segment(3)) !!}')
})
</script>





<h3>Edit Akses - {{ $list_user->data_user->nama }}</h3>

<hr>


<table class='table table-bordered'>
	<tr class='well'>
		<td>Nama</td>
		<td>Email</td>
		<td>Status</td>
	</tr>

@foreach(\App\Models\Mst\User::whereRefUserLevelId(3)->get() as $list )
	<tr>
		<td>{{ $list->data_user->nama }}</td>
		<td>{{ $list->email }}</td>
		<td> @if(count($list->akses_staff_user) >0) 
				<i style='cursor:pointer;' id='edit{{ $list->id }}' class='fa fa-check-square-o'></i> 
			@else 
				<i style='cursor:pointer;' id='edit{{ $list->id }}' class='fa fa-square-o'></i>
			@endif 
		</td>
	</tr>

<script type="text/javascript">
	$('#edit{{ $list->id }}').click(function(){
		form_data = {
			_token : '{!! csrf_token() !!}',
			mst_user_staff_id : '{{ Request::segment(3) }}',
			mst_user_id 	: '{{ $list->id }}'
		}
		$.ajax({
			url : '{!! URL::route("staff_akses.update_akses") !!}',
			data : form_data,
			type : 'post',
			error:function(err){
				alert('error! terjadi kesalahan pada sisi server!');
			},
			success:function(ok){
				$('.modal-body').load('{!! URL::route("staff_akses.add_list_user", Request::segment(3)) !!}');
			}
		})
	})

</script>



@endforeach

</table>



