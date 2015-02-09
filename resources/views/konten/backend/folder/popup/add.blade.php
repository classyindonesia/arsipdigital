<h3>Tambah Folder Baru</h3>
<hr style='margin:2px;'>


<div id='pesan'></div>



<div class='form-group'>
	{!! Form::label('nama', 'Nama Folder : ') !!}
	<input type='text' name='nama' placeholder='nama folder...' id='nama' class='form-control'>
</div>



<div class='form-group'>
	{!! Form::label('parent_id', 'Folder : ') !!}
	{!! Form::select('parent_id', Fungsi::get_dropdown($parent, 'parent'), '', ['id' => 'parent_id']) !!}
 </div>





<div class='form-group'>
	{!! Form::label('mst_rak_id', 'Rak : ') !!}
	{!! Form::select('mst_rak_id', Fungsi::get_dropdown($rak, 'rak'), '', ['id' => 'mst_rak_id']) !!}
 </div>





<div class='form-group'>
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	<textarea type='text' name='keterangan' placeholder='keterangan...' id='keterangan' class='form-control'></textarea>
 </div>



 <div class='form-group'>
 	<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> simpan</button>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
nama = $('#nama').val();
keterangan = $('#keterangan').val();
if(nama == ''){
	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	$('#pesan').append('semua isian harus terisi!');
}

form_data ={
	nama : nama,
	keterangan : keterangan,
	mst_rak_id  : $('#mst_rak_id').val(),
	mst_user_id : '{!! Auth::user()->id !!}',
	parent_id : $('#parent_id').val(),
	_token : '{!! csrf_token() !!}'
}
	$.ajax({
		url : '{{ URL::route("folders.insert") }}',
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
			window.location.reload();
		}
	})
})
</script>
