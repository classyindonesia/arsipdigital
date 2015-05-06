<h3>Tambah menu</h3>
<hr style='margin:2px;'>


<div id='pesan'></div>



<div class='form-group'>
	{!! Form::label('nama', 'Nama menu : ') !!}
	<input type='text' name='nama' value="{!! $menu->nama !!}" placeholder='nama menu...' id='nama' class='form-control'>
</div>

<div class='form-group'>
	{!! Form::label('link', 'link menu : ') !!}
	<input type='text' name='link' value="{!! $menu->link !!}" placeholder='link...' id='link' class='form-control'>
</div>


@if(count($menu->mst_menu_child)<=0)
	<div class='form-group'>
		{!! Form::label('parent_id', 'Parent menu : ') !!}
		{!! Form::select('parent_id', Fungsi::get_dropdown($parent, 'parent menu'), $menu->parent_id, ['id' => 'parent_id']) !!}
	</div>
@endif 


<div class='form-group'>
	{!! Form::label('is_internal', 'type link menu : ') !!}
	{!! Form::select('is_internal', [1 => 'internal', 0 => 'eksternal'], $menu->is_internal, ['id' => 'is_internal']) !!}
</div>


 <div class='form-group'>
 	<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> simpan</button>
</div>



<script type="text/javascript">




$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
 nama = $('#nama').val();
 link = $('#link').val();
 is_internal = $('#is_internal').val();
 parent_id = $('#parent_id').val();



form_data ={
	nama : nama,
	link : link,
	id : '{!! $menu->id !!}',
	is_internal : is_internal,
	parent_id : parent_id,
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ URL::route("backend_menu.update") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
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
