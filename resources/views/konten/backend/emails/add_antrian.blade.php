<script type="text/javascript">
 $('.selectpicker').selectpicker();
</script>
<div class='col-md-6'>

	<div class='col-md-12'>
		{!! Form::select('data_user', Fungsi::get_dropdown($data_user, 'user'), '', ['id' => 'data_user', 'class'	=> 'selectpicker form-control', 'data-live-search'	=> 'true']) !!}
	</div>



<hr>

	<div class='col-md-12'>
			<button id='tambahkan_all' class='btn btn-primary '> <i class='fa fa-plus'></i> tambahkan semua</button>
			<button id='tambahkan' class='btn btn-primary '> <i class='fa fa-plus-square'></i> tambahkan </button>
<button id='clear_antrian' class='btn btn-primary '> <i class='fa fa-refresh'></i> clear antrian</button>

	</div>

</div>


 




<script type="text/javascript">



$('#clear_antrian').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::route("emails.kirim_email") }}',
			data : {clear : 1, _token : '{!! csrf_token() !!}' },
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