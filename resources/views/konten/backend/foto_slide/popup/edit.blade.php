<h2>Edit Data Foto Slide</h2>
<hr style='margin:2px;'>


@include('konten.backend.foto_slide.popup.form_update_foto')

<div id='pesan'></div>

<hr>
<div class='form-group'>
	{!! Form::label('nama', 'Nama : ') !!}
	<input value='{!! $foto->nama !!}' type='text' name='nama' id='nama' placeholder='nama....' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label('no_induk', 'Nomor Induk : ') !!}
	<input value='{!! $foto->no_induk !!}' type='text' name='no_induk' id='no_induk' placeholder='Nomor Induk....' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label('ref_jabatan_id', 'Jabatan : ') !!}
	{!! Form::select('ref_jabatan_id', Fungsi::get_dropdown($jabatan, 'jabatan'), 
		$foto->ref_jabatan_id, ['id' => 'ref_jabatan_id', 'class' => 'form-control']) !!}
</div>


<div class='form-group'>
	<button id='simpan' class='btn btn-primary form-control'> <i class='fa fa-floppy-o'></i> simpan</button>
</div>

<script type="text/javascript">
$('#simpan').click(function(){

	nama = $('#nama').val();
	ref_jabatan_id = $('#ref_jabatan_id').val();
	
	if(nama == '' || ref_jabatan_id == ''){
		alert('masih ada isian yg kosong!');
		return false;
	}

	form_data = {
		nama 			: nama,
		id 				: {!! $foto->id !!},
		ref_jabatan_id 	: ref_jabatan_id,
		no_induk 		: $('#no_induk').val(),
		_token 			: '{!! csrf_token() !!}'
	}

	$('#simpan').attr('disabled', 'disabled');

	$.ajax({
		url : '{!! route("foto_slide.update") !!}',
		data : form_data,
		type : 'post',
		error:function(err){
			$('#simpan').removeAttr('disabled');
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			$('#simpan').removeAttr('disabled');
			$('#pesan').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> data telah berhasil tersimpan! </div>');
		}
	})

})



$('#myModal').on('hidden.bs.modal', function (e) {
  window.location.reload();
})
</script>