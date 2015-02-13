@if(Auth::user()->data_user->nama == NULL || Auth::user()->data_user->alamat == NULL || Auth::user()->data_user->no_hp == NULL )
	<div class=' alert alert-danger' style='font-size:25px;'>
			silahkan lengkapi data diri anda yg masih kosong! <br>
			<a class='btn btn-info' href="{!! URL::route('my_profile.index') !!}"> 
				<i class='fa fa-pencil-square'></i> edit data
			</a>
	</div>
@endif




