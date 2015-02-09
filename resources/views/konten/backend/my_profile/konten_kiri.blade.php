<div class='form-group'>
	{!! Form::label("nama", "nama lengkap :") !!}
	<input type='text' name='nama' id='nama' placeholder='nama lengkap' value='{!! Auth::user()->data_user->nama !!}' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label("no_induk", "nomor induk :") !!}
	<input type='text' name='no_induk' id='no_induk' placeholder='nomor induk' value='{!! Auth::user()->data_user->no_induk !!}' class='form-control' />
</div>



<div class='form-group'>
	{!! Form::label("alamat", "alamat :") !!}
	<input type='text' name='alamat' id='alamat' placeholder='alamat' value='{!! Auth::user()->data_user->alamat !!}' class='form-control' />
</div>


<div class='form-group'>
	{!! Form::label("tempat_lahir", "tempat_lahir :") !!}
	<input type='text' name='tempat_lahir' id='tempat_lahir' placeholder='tempat lahir' value='{!! Auth::user()->data_user->tempat_lahir !!}' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label("no_hp", "nomor hp :") !!}
	<input type='text' name='no_hp' id='no_hp' placeholder='nomor hp..' value='{!! Auth::user()->data_user->no_hp !!}' class='form-control' />
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