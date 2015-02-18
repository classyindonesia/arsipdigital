<table class='tabel_form_data' width='100%'>
	<tr>
		<td>
			{!! Form::label("nama", "nama lengkap :") !!}
		</td>
		<td>
			<input type='text' name='nama' id='nama' placeholder='nama lengkap' value='{!! Auth::user()->data_user->nama !!}' class='form-control' />
		</td>
	</tr>

<tr>
	<td>
		{!! Form::label("alamat", "*alamat :") !!}
	</td>
	<td>
		<input type='text' name='alamat' id='alamat' placeholder='alamat' value='{!! Auth::user()->data_user->alamat !!}' class='form-control' />
	</td>
</tr>



<tr>
	<td>{!! Form::label("ref_kota_id", "Kota tempat tinggal :") !!}</td>
	<td>	{!! Form::select('ref_kota_id', 
			Fungsi::get_dropdown($kota, 'kota tmpt tgl'), 
			$data_user->ref_kota_id, 
				[
					'id' => 'ref_kota_id',
					'class'	=> 'selectpicker',
					'data-live-search'	=> 'true'
				]) 
	!!}</td>
</tr>

<tr>
	<td>{!! Form::label("tempat_lahir", "*tempat_lahir :") !!}</td>
	<td><input type='text' name='tempat_lahir' id='tempat_lahir' placeholder='tempat lahir' value='{!! Auth::user()->data_user->tempat_lahir !!}' class='form-control' /></td>
</tr>


<tr>
	<td>{!! Form::label("tgl_lahir", "*Tanggal Lahir :") !!}</td>
	<td>
    {!! Form::selectRange('tgl_lahir', 1, 31, date('d', strtotime($data_user->tgl_lahir)),  ['id' => 'tgl_lahir', 'style' => 'width:60px']) !!}
    {!! Form::selectMonth('bln_lahir', date('m', strtotime($data_user->tgl_lahir)),  ['id' => 'bln_lahir', 'style' => 'width:100px']) !!} 
    {!! Form::selectYear('thn', 1970, date('Y')-10,  date('Y', strtotime($data_user->tgl_lahir)), ['id' => 'thn_lahir', 'style' => 'width:100px']) !!}

	</td>
</tr>



<tr>
	<td>{!! Form::label("no_hp", "*nomor hp :") !!}</td>
	<td><input type='text' name='no_hp' id='no_hp' placeholder='nomor hp..' value='{!! Auth::user()->data_user->no_hp !!}' class='form-control' /></td>
</tr>


<tr>
	<td>{!! Form::label("jenis_kelamin", "*Jenis Kelamin :") !!}</td>
	<td>{!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], $data_user->jenis_kelamin, ['id' => 'jenis_kelamin']) !!}</td>
</tr>

<tr>
	<td>{!! Form::label("ref_homebase_id", "Home Base :") !!}</td>
	<td>	{!! Form::select('ref_homebase_id', 
			Fungsi::get_dropdown(\App\Models\Ref\HomeBase::all(), 'home base'), 
			$data_user->ref_homebase_id, 
				[
					'id' => 'ref_homebase_id',
					'class'	=> 'selectpicker',
					'data-live-search'	=> 'true'
				]) 
	!!}</td>
</tr>



</table>
 
 
 