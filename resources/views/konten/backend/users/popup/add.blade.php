<h3 class='animated fadeIn'>Create New User</h3>
<hr style='margin:2px;'>
 

<div id='pesan'>
</div>


<div class='form-group'>
	{!! Form::label('nama', 'Nama Lengkap : ') !!}
	<input type='text' placeholder='nama...' name='nama' id='nama' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label('email', 'Email : ') !!}
	<input type='text' placeholder='email...' name='email' id='email' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label('password', 'Password : ') !!}
	<input   type='password' placeholder='password...' name='password' id='password' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label('password_confirmation', 're-enter Password : ') !!}
	<input   type='password' placeholder='re-enter password...' name='password_confirmation' id='password_confirmation' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label('ref_user_level_id', 'level user : ') !!}
	{!! Form::select('ref_user_level_id', Fungsi::get_dropdown($level, 'level'), '', ['id' => 'ref_user_level_id']) !!}
</div>


<div class='form-group'>
	<button class='btn btn-primary' id='simpan'><i class='fa fa-floppy-o'></i> simpan</button>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
$('#pesan').removeClass('alert alert-danger').html('');

	email = $('#email').val();
	nama = $('#nama').val();
	password = $('#password').val();
	password_confirmation = $('#password_confirmation').val();
	level = $('#ref_user_level_id').val();
if(password == '' || password_confirmation == '' || level == '' || nama == '' || email == ''){
	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	$('#pesan').append('semua isian harus terisi!')
	return false;
}


if(password != password_confirmation){
	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	$('#pesan').append('password tdk sama!')	
 	return false;
}


form_data ={
	email : email,
	nama : nama,
	password : password,
	ref_user_level_id : level,
	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
 	$.ajax({
		url : '{{ URL::route("users.insert") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
 		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
          datajson = JSON.parse(xhr.responseText);
          $.each(datajson, function( index, value ) {
          		$('#pesan').append(index + ": " + value+"<br>")
                  //alert( index + ": " + value );
          });
		           
		          //alert('error! terjadi kesalahan pada sisi server!')
		},
		success:function(ok){
			window.location.reload();
		}
	})
})
</script>
