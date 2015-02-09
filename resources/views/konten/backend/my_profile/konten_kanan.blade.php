<div class='form-group'>
	{!! Form::label("nama_ibu_kandung", "Nama Ibu Kandung :") !!}
	<input type='text' name='nama_ibu_kandung' id='nama_ibu_kandung' placeholder='nama ibu kandung..' value='{!! Auth::user()->data_user->nama_ibu_kandung !!}' class='form-control' />
</div>