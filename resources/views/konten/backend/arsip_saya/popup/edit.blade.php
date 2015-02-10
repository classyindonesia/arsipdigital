<h3>Edit Arsip</h3>
<hr style='margin:2px;'>


<div id='pesan'></div>



<div class='form-group'>
	{!! Form::label('nama', '*Nama Arsip : ') !!}
	<input type='text' value='{{ $arsip->nama }}' name='nama' placeholder='nama arsip...' id='nama' class='form-control'>
</div>

<div class='form-group'>
	{!! Form::label('no_surat', 'Nomor Surat : ') !!}
	<input type='text' value='{{ $arsip->no_surat }}' name='no_surat' placeholder='Nomor arsip...' id='no_surat' class='form-control'>
</div>


<div class='form-group'>
	{!! Form::label('nama_tujuan', 'Nama Tujuan Surat : ') !!}
	<input type='text' value='{{ $arsip->nama_tujuan }}' name='nama_tujuan' placeholder='Nama Tujuan Surat...' id='nama_tujuan' class='form-control'>
</div>


<div class='form-group '>
	{!! Form::label('mst_folder_id', '*Folder Arsip : ') !!}
	{!! Form::select('mst_folder_id', Fungsi::get_dropdown($folder, 'folder'), $arsip->mst_folder_id, ['id' => 'mst_folder_id']) !!}
</div>
 





<div class='form-group'>
	{!! Form::label('tgl_arsip', 'Tanggal surat diarsipkan : ') !!}

    {!! Form::selectRange('tgl_arsip', 1, 31, date('d', strtotime($arsip->tgl_arsip)),  ['id' => 'tgl_arsip', 'style' => 'width:60px']) !!}
    {!! Form::selectMonth('bln_arsip', date('m', strtotime($arsip->tgl_arsip)),  ['id' => 'bln_arsip', 'style' => 'width:100px']) !!} 
    {!! Form::selectYear('thn_arsip', date('Y')-10, date('Y'),  date('Y', strtotime($arsip->tgl_arsip)), ['id' => 'thn_arsip', 'style' => 'width:100px']) !!}

</div>




<div class='form-group'>
	{!! Form::label('tgl_surat', 'Tanggal surat : ') !!}

    {!! Form::selectRange('tgl_surat', 1, 31, date('d', strtotime($arsip->tgl_surat)),  ['id' => 'tgl_surat', 'style' => 'width:60px']) !!}
    {!! Form::selectMonth('bln_surat', date('m', strtotime($arsip->tgl_surat)),  ['id' => 'bln_surat', 'style' => 'width:100px']) !!} 
    {!! Form::selectYear('thn_surat', date('Y')-10, date('Y'),  date('Y', strtotime($arsip->tgl_surat)), ['id' => 'thn_surat', 'style' => 'width:100px']) !!}

</div>




<div class='form-group'>
	{!! Form::label('keterangan', 'keterangan tambahan : ') !!}
	<textarea  name='keterangan' placeholder='keterangan...' id='keterangan' class='form-control'>{{ $arsip->keterangan }}</textarea>
 </div>


 	 <div class='form-group'>
	 	<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> simpan</button>
	</div>
 
 




<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

nama 			= $('#nama').val();
nama_tujuan 	= $('#nama_tujuan').val();
no_surat		= $('#no_surat').val();
 
mst_folder_id	= $('#mst_folder_id').val();

tgl_arsip		= $('#thn_arsip').val()+"-"+$('#bln_arsip').val()+"-"+$('#tgl_arsip').val();
tgl_surat		=  $('#thn_surat').val()+"-"+$('#bln_surat').val()+"-"+$('#tgl_surat').val();
 
keterangan		= $('#keterangan').val();


form_data ={
	id 				: '{{ $arsip->id }}',
	nama 			: nama,
	nama_tujuan 	: nama_tujuan,
	no_surat 		: no_surat,
	mst_folder_id	: mst_folder_id,
	keterangan		: keterangan,
	tgl_arsip		: tgl_arsip,
	tgl_surat		: tgl_surat,
   	_token 			: '{!! csrf_token() !!}'
}
	$.ajax({
		url : '{{ URL::route("my_archive.update") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){

	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });

		      //    alert('error! terjadi kesalahan pada sisi server!')
		},
		success:function(ok){
			window.location.reload();
		}
	})
})
</script>
