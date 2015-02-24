<script type="text/javascript">
 $('.selectpicker').selectpicker();
</script>
<div class='col-md-6'>
	<div class='col-md-5'>
		{!! Form::select('data_user', Fungsi::get_dropdown($data_user, 'user'), '', ['id' => 'data_user', 'class'	=> 'selectpicker form-control', 'data-live-search'	=> 'true']) !!}
	</div>
	<div class='col-md-7'>
			<button id='tambahkan_all' class='btn btn-primary pull-right'> <i class='fa fa-plus'></i> tambahkan semua</button>
			<button id='tambahkan' class='btn btn-primary pull-right'> <i class='fa fa-plus-square'></i> tambahkan </button>

	</div>

</div>



<script type="text/javascript">
$('#tambahkan').click(function(){

	data_user = $('#data_user').val();
	if(data_user == ''){
		return false;
	}

	$.ajax({
		url:'{!! URL::route("emails.insert_antrian") !!}',
		data : {data_user : data_user, _token : '{!! csrf_token() !!}'},
		type: 'post',
		error:function(err){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			window.location.reload();
		}
	}) 
})




$('#tambahkan_all').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url:'{!! URL::route("emails.insert_antrian") !!}',
			data : {add_all : 1, _token : '{!! csrf_token() !!}'},
			type: 'post',
			error:function(err){
				alert('error! terjadi kesalahan pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		}) 		
	}
})


</script>