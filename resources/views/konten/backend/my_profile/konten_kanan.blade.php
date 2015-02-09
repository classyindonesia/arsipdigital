<div class='form-group'>
	{!! Form::label("nama_ibu_kandung", "Nama Ibu Kandung :") !!}
	<input type='text' name='nama_ibu_kandung' id='nama_ibu_kandung' placeholder='nama ibu kandung..' value='{!! Auth::user()->data_user->nama_ibu_kandung !!}' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label("no_telp", "nomor telepon :") !!}
	<input type='text' name='no_telp' id='no_telp' placeholder='nomor telepon..' value='{!! Auth::user()->data_user->no_telp !!}' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label("kode_post", "kode pos :") !!}
	<input type='text' name='kode_post' id='kode_post' placeholder='kode pos..' value='{!! Auth::user()->data_user->kode_post !!}' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label("no_ktp", "nomor KTP :") !!}
	<input type='text' name='no_ktp' id='no_ktp' placeholder='nomor KTP..' value='{!! Auth::user()->data_user->no_ktp !!}' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label("ref_status_ikatan_id", "Status Ikatan :") !!}
{!! Form::select('ref_status_ikatan_id', Fungsi::get_dropdown($ref_status_ikatan, 'status ikatan'), Auth::user()->data_user->ref_status_ikatan_id, ['id' => 'ref_status_ikatan_id']) !!}
</div>


<div class='form-group'>
	{!! Form::label("ref_status_pernikahan_id", "Status Nikah :") !!}
{!! Form::select('ref_status_pernikahan_id', Fungsi::get_dropdown($ref_status_pernikahan, 'status nikah'), Auth::user()->data_user->ref_status_pernikahan_id, ['id' => 'ref_status_pernikahan_id']) !!}
</div>


<div class='form-group'>
	{!! Form::label("ref_agama_id", "Agama :") !!}
{!! Form::select('ref_agama_id', Fungsi::get_dropdown($agama, 'agama'), $data_user->ref_agama_id, ['id' => 'ref_agama_id']) !!}
</div>
