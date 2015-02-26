 
<button id='add_attach' class='btn btn-primary pull-right'>
<i class='fa fa-cloud-upload'></i> add files
</button>
<button id='clear_attach' class='btn btn-primary pull-right'>
<i class='fa fa-refresh'></i> clear attached files
</button>

<script type="text/javascript">
$('#add_attach').click(function(){
	$('.modal-body').load('{!! URL::route("emails.add_attach") !!}')
})

$('#clear_attach').click(function(){


	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{!! URL::route("emails.clear_attach_file") !!}',
			data : { _token: "{!! csrf_token() !!}", clear : 1 },
			type : 'post',
			error:function(err){
				alert('error! terjadi kesalahan pada sisi server!');
			},
			success:function(ok){
				$('.modal-body').load('{!! URL::route("emails.attach_file") !!}');
			}
		});
	}

	  
})


</script>






<h3>Attached file</h3>
<hr style='margin:2px'>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th>Nama File</th>
			<th width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		@foreach($list_file as $list)
			<tr>
				<td>{!! $no !!}</td>
				<td>{!! $list->nama_file_asli !!}</td>
				<td>
					@include('konten.backend.emails.action.del_file_lampiran')
				</td>
			</tr>
			<?php $no++; ?>
		@endforeach
	</tbody>
</table>