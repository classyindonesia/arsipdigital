<table class='tabel_form_data' width='100%'>
	<tr>
		<td>{!! Form::label("no_induk", "nomor induk :") !!}</td>
		<td><input type='text' name='no_induk' id='no_induk' placeholder='nomor induk' value='{!! Auth::user()->data_user->no_induk !!}' class='form-control' /></td>
	</tr>

	<tr>
		<td>{!! Form::label("nama_ibu_kandung", "Nama Ibu Kandung :") !!}</td>
		<td><input type='text' name='nama_ibu_kandung' id='nama_ibu_kandung' placeholder='nama ibu kandung..' value='{!! Auth::user()->data_user->nama_ibu_kandung !!}' class='form-control' /></td>
	</tr>
	<tr>
		<td>{!! Form::label("no_telp", "nomor telepon :") !!}</td>
		<td><input type='text' name='no_telp' id='no_telp' placeholder='nomor telepon..' value='{!! Auth::user()->data_user->no_telp !!}' class='form-control' /></td>
	</tr>

	<tr>
		<td>{!! Form::label("kode_post", "kode pos :") !!}</td>
		<td><input type='text' name='kode_post' id='kode_post' placeholder='kode pos..' value='{!! Auth::user()->data_user->kode_post !!}' class='form-control' /></td>
	</tr>
	<tr>
		<td>{!! Form::label("no_ktp", "nomor KTP :") !!}</td>
		<td><input type='text' name='no_ktp' id='no_ktp' placeholder='nomor KTP..' value='{!! Auth::user()->data_user->no_ktp !!}' class='form-control' /></td>
	</tr>

	<tr>
		<td>{!! Form::label("ref_status_ikatan_id", "Status Ikatan :") !!}</td>
		<td>{!! Form::select('ref_status_ikatan_id', Fungsi::get_dropdown($ref_status_ikatan, 'status ikatan'), Auth::user()->data_user->ref_status_ikatan_id, ['id' => 'ref_status_ikatan_id']) !!}</td>
	</tr>

	<tr>
		<td>{!! Form::label("ref_status_pernikahan_id", "Status Nikah :") !!}</td>
		<td>{!! Form::select('ref_status_pernikahan_id', Fungsi::get_dropdown($ref_status_pernikahan, 'status nikah'), Auth::user()->data_user->ref_status_pernikahan_id, ['id' => 'ref_status_pernikahan_id']) !!}</td>
	</tr>

	<tr>
		<td>{!! Form::label("ref_agama_id", "Agama :") !!}</td>
		<td>{!! Form::select('ref_agama_id', Fungsi::get_dropdown($agama, 'agama'), $data_user->ref_agama_id, ['id' => 'ref_agama_id']) !!}</td>
	</tr>	



</table>
 

 
 
