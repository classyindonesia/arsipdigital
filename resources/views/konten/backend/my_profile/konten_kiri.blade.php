 

    {{-- contoh penggunaan select+search 
    Form::selectRange('tgl_lahir', 1, 31, 
    date('d', strtotime($data_user->tgl_lahir)),  
    [
    'id' => 'tgl_lahir', 
    'style' => 'width:60px', 
    'class' => 'selectpicker',
    'data-live-search'	=> 'true'

    ]) --}}



<div class='form-group'>
	{!! Form::label("nama", "nama lengkap :") !!}
	<input type='text' name='nama' id='nama' placeholder='nama lengkap' value='{!! Auth::user()->data_user->nama !!}' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label("no_induk", "nomor induk :") !!}
	<input type='text' name='no_induk' id='no_induk' placeholder='nomor induk' value='{!! Auth::user()->data_user->no_induk !!}' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label("alamat", "*alamat :") !!}
	<input type='text' name='alamat' id='alamat' placeholder='alamat' value='{!! Auth::user()->data_user->alamat !!}' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label("tempat_lahir", "*tempat_lahir :") !!}
	<input type='text' name='tempat_lahir' id='tempat_lahir' placeholder='tempat lahir' value='{!! Auth::user()->data_user->tempat_lahir !!}' class='form-control' />
</div>



<div class='form-group'>
	{!! Form::label("tgl_lahir", "*Tanggal Lahir :") !!}


    {!! Form::selectRange('tgl_lahir', 1, 31, date('d', strtotime($data_user->tgl_lahir)),  ['id' => 'tgl_lahir', 'style' => 'width:60px']) !!}
    {!! Form::selectMonth('bln_lahir', date('m', strtotime($data_user->tgl_lahir)),  ['id' => 'bln_lahir', 'style' => 'width:100px']) !!} 
    {!! Form::selectYear('thn', 1970, date('Y')-10,  date('Y', strtotime($data_user->tgl_lahir)), ['id' => 'thn_lahir', 'style' => 'width:100px']) !!}

</div>



<div class='form-group'>
	{!! Form::label("no_hp", "*nomor hp :") !!}
	<input type='text' name='no_hp' id='no_hp' placeholder='nomor hp..' value='{!! Auth::user()->data_user->no_hp !!}' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label("jenis_kelamin", "*Jenis Kelamin :") !!}
	{!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], $data_user->jenis_kelamin, ['id' => 'jenis_kelamin']) !!}
</div>


<div class='form-group'>
	{!! Form::label("ref_kota_id", "Kota tempat tinggal :") !!}
	{!! Form::select('ref_kota_id', 
			Fungsi::get_dropdown($kota, 'kota tmpt tgl'), 
			$data_user->ref_kota_id, 
				[
					'id' => 'ref_kota_id',
					'class'	=> 'selectpicker',
					'data-live-search'	=> 'true'
				]) 
	!!}
</div>




