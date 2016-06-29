<script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover()
})	
</script>


<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th style='text-align:center;width:5%'>No.</th>
			<th>Nama</th>
			<th style='text-align:center;width:20%'>size</th>
			<th style='text-align:center;width:10%'>Action</th>
		</tr>
	</thead>
	<tbody>
<?php $no=1; ?>
@foreach($arsip->mst_file as $list)

		<tr>
			<td align='center'>{{ $no }}</td>
			<td>

				@if($list->c__data_url_image != '')
					<span id='popover{!! $list->id !!}' data-toggle="popover" data-trigger="hover" data-content="">
						{{ $list->nama_file_asli }}
					</span>
					<script type="text/javascript">
					var dataUrl = "{!! $list->c__data_url_image !!}";
					var image = '<img class="img-responsive" src="'+dataUrl+'" >';
					$('#popover{!! $list->id !!}').popover({placement: 'right', content: image, html: true});
					</script>
				@else
					{{ $list->nama_file_asli }}
				@endif 
				
			</td>
			<td align='center'>{{ Fungsi::size($list->size) }}</td>
			<td class='text-center'>
				@include('konten.backend.arsip_saya.action_file')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
 
	</tbody>
</table>