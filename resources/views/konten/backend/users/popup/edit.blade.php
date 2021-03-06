<h3 class='animated fadeIn'>Edit User</h3>
<hr style='margin:2px;'>
 

<div id='pesan'>
</div>


<div class='form-group'>
	{!! Form::label('nama', 'Nama Lengkap : ') !!}
	<input type='text' value='@if(count($user->data_user)>0) {{ $user->data_user->nama }} @endif' placeholder='nama...' name='nama' id='nama' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label('email', 'Email : ') !!}
	<input value='{{ $user->email }}' type='text' placeholder='email...' name='email' id='email' class='form-control' />
</div>
 

<div class='form-group'>
	{!! Form::label('ref_user_level_id', 'level user : ') !!}
	{!! Form::select('ref_user_level_id', Fungsi::get_dropdown($level, 'level'), $user->ref_user_level_id, ['id' => 'ref_user_level_id']) !!}
</div>


<div class='form-group'>
	<button class='btn btn-primary' id='simpan'><i class='fa fa-floppy-o'></i> simpan</button>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
$('#pesan').removeClass('alert alert-danger').html('');

	email = $('#email').val();
	nama = $('#nama').val();
 	level = $('#ref_user_level_id').val();



 



form_data ={
	user_id : '{{ $user->id }}',
	user_data_id : '@if(count($user->data_user)>0){{ $user->data_user->id }}@endif',
	email : email,
	nama : nama,
	ref_user_level_id : level,
	_token : '{!! csrf_token() !!}'

}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ URL::route("users.update") }}',
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
