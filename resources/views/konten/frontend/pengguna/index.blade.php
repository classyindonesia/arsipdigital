@extends('layouts.public')

@section('main_konten')

 

<h2>Pencarian Data {!! Fungsi::setup_variable("config_nama_pencarian") !!}</h2>
<hr>


<table width='100%'>
	<tr>
		<td>
			<input value='{{ Session::get("pencarian_pengguna") }}' autofocus class='form-control' type='text' name='nama' placeholder='search by name...' id='pencarian' />
		</td>
		<td>
			<button class='btn btn-primary' id='submit'> <i class='fa fa-search'></i> search</button>
		</td>
	</tr>
</table>

<script type="text/javascript">
function submit_search(){
	nama = $.trim($('#pencarian').val());
	if(nama == ''){
		return false;
	}
$.ajax({
	url : '{!! URL::route("pengguna.submit_search") !!}',
	type : 'post',
	data: {pencarian : nama, _token : '{!! csrf_token() !!}', submit : 1 },
	error:function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		window.location.href = '{!! URL::route("pengguna.search") !!}';
	}
})
}


$('#submit').click(function(){
	submit_search();
})

$("#pencarian").keypress(function(e) {
    if(e.which == 13) {
       submit_search();
       
    }
});

</script>





@endsection
