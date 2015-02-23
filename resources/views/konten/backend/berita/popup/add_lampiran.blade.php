<h3>Lampiran File Berita</h3>
<hr style='margin:2px'>
<script type="text/javascript">
 $('.selectpicker').selectpicker();
</script>

<div class='col-md-12' style='margin-bottom:2em;'>
	<div class='col-md-9'>
	{!! 
		Form::select('mst_lampiran_berita_id', $list_lampiran, '', 
					[
						'id' => 'mst_lampiran_berita_id',
						'class'	=> 'selectpicker form-control',
						'data-live-search'	=> 'true'
					]) 
	!!}

	</div>
	<div class='col-md-1'>
		<button class='btn btn-primary' id='tambah'> <i class='fa fa-plus'></i> tambahkan</button>
	</div>
</div>





<script type="text/javascript">

$('#tambah').click(function(){
	lampiran_id = $('#mst_lampiran_berita_id').val();
	if(lampiran_id == ''){
		return false;
	}

$.ajax({
	url : "{!! URL::route('admin_berita.insert_lampiran') !!}",
	data: { mst_lampiran_berita_id : lampiran_id, mst_berita_id : '{{ Request::segment(3) }}', _token : '{!! csrf_token() !!}'},
	type : 'post',
	error:function(err){
		alert('error! terjadi kesalahan pada sisi server!');
	},
	success:function(ok){
		$('.modal-body').load('{!! URL::route("admin_berita.add_lampiran", Request::segment(3)) !!}');
	}
})


})


$('#myModal').on('hidden.bs.modal', function (e) {
  window.location.reload();
})


</script>

 



<table class='table table-bordered'>
	<tr>
		<td width='5%'>No.</td>
		<td>Nama Lampiran</td>
		<td width='5%'>Action</td>
	</tr>

<?php $no=1; ?>
@foreach($lampiran as $list)
	<tr>
		<td>{{ $no }}</td>
		<td>@if(count($list->mst_lampiran)>0) {{ $list->mst_lampiran->nama }} @else - @endif </td>
		<td>@include('konten.backend.berita.popup.action')</td>
	</tr>
<?php $no++; ?>
@endforeach
</table>