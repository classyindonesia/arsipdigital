<h3>Tambah Folder Baru</h3>
<hr style='margin:2px;'>


<div id='pesan'></div>



<div class='form-group'>
	{!! Form::label('password_lama', 'Password Lama : ') !!}
	<input type='password' name='password_lama' placeholder='password lama...' id='password_lama' class='form-control'>
</div>


<div class='form-group'>
	{!! Form::label('password_baru', 'Password baru : ') !!}
	<input type='password' name='password_baru' placeholder='password baru...' id='password_baru' class='form-control'>
</div>
 
 

<div class='form-group'>
	{!! Form::label('password_baru2', 're-enter Password baru : ') !!}
	<input type='password' name='password_baru2' placeholder='re-enter password baru...' id='password_baru2' class='form-control'>
</div>



 <div class='form-group'>
 	<button id='simpan' class='btn btn-primary'><i class='fa fa-floppy-o'></i> simpan</button>
 	<button id='close' class='btn btn-primary'><i class='fa fa-times'></i> close</button>
</div>



<script type="text/javascript">

$('#close').click(function(){
	$('#myModal').modal('hide');
})


$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
password_lama = $('#password_lama').val();
password_baru = $('#password_baru').val();
password_baru2 = $('#password_baru2').val();


 

form_data ={
	password_lama 	: password_lama,
	password_baru 	: password_baru,
	password_baru_confirmation 	: password_baru2,
	_token : '{!! csrf_token() !!}'
}
	$.ajax({
		url : '{{ URL::route("my_profile.update_password") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){

	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });

 		},
		success:function(ok){
			//window.location.reload();
		$('#password_lama').val('');
		$('#password_baru').val('');
		$('#password_baru2').val('');
		$('#pesan').addClass('alert alert-success animated fadeIn').html('<b>password telah tersimpan!</b>');

		}
	})
})
</script>
