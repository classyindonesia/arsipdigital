<table width='100%' class='pull-right' >
	<tr>
		<td>
			<input type='text' name='pencarian' 
			autofocus placeholder='search...'
			id='pencarian' class='form-control' value='{{ Session::get("pencarian_arsip") }}'>
		</td>
		<td width='22%'>
			<button id='submit' class='btn btn-primary'> <i class='fa fa-search'></i> search</button>
			@if(Session::has('pencarian_arsip'))
				<button id='reset' class='btn btn-danger'> <i class='fa fa-times'></i></button>
			@endif

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
		url : '{!! URL::route("my_archive.submit_search") !!}',
		data : {_token : '{!! csrf_token() !!}', pencarian : nama, submit : 1},
		type : 'post',
		error:function(xhr, status, error){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			window.location.reload();
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

$('#reset').click(function(){
	$.ajax({
		url : '{!! URL::route("my_archive.submit_search") !!}',
		data : {_token : '{!! csrf_token() !!}',   reset : 1},
		type : 'post',
		error:function(xhr, status, error){
			alert('error! terjadi kesalahan pada sisi server!');
		},
		success:function(ok){
			window.location.reload();
		}
	})	
})


</script>