<div class='form-group'>
	<input value='{!! $jabatan->nama !!}' type='text' name='nama' placeholder='nama jabatan...' id='nama' class='form-control' />
</div>
<button id='simpan' class='btn btn-primary'><i class='fa fa-floppy-o'></i> simpan</button>
<button id='cancel' class='btn btn-danger'><i class='fa fa-times'></i> cancel</button>

<script type="text/javascript">
$('#cancel').click(function(){
	$('.modal-body').load('{!! route("foto_slide.jabatan") !!}');
})
$('#simpan').click(function(){
	nama = $('#nama').val();
	if(nama == ''){
		return false;
	}

	$.ajax({
		url : '{!! route("foto_slide.update_jabatan") !!}',
		data : {nama : nama,_token : '{!! csrf_token() !!}', id : '{!! $jabatan->id !!}'},
		type : 'post',
		error:function(err){
			alert('error! terjadi kesalahan pada sisi server!')
		},
		success:function(ok){
			$('.modal-body').load('{!! route("foto_slide.jabatan") !!}');
		}
	})
})

</script>