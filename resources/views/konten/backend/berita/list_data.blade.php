<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th>Judul</th>
			<th width='5%'>status</th>
			<th width='10%'> <i class='fa fa-calendar'></i> created at</th>
			<td width='10%'><i class='fa fa-clock-o'></i> jam</td>
			<th width='100px'>action</th>			
		</tr>
	</thead>
	<tbody>
		<?php $no = $berita->firstItem(); ?>
@foreach($berita as $list)
		<tr>
			<td class='text-center'>{{ $no }}</td>
			<td>{{ $list->judul }}</td>
			<td> @if($list->is_published == 0) 
					<span class='label label-warning'>draft</span> 
				@else
					<span class='label label-success'>published</span> 
				@endif					
			</td>
			<td> {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($list->created_at))) }} </td>
			<td> {{ date('H:i', strtotime($list->created_at)) }} WIB </td>
			<td>
				@include('konten.backend.berita.action')

			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


{!! $berita->render() !!}