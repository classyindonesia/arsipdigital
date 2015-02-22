<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5px'>No.</th>
			<th>Nama Lampiran</th>
			<th width='100px'>size</th>
			<th width='100px'>action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $lampiran->firstItem(); ?>
@foreach($lampiran as $list)		
		<tr>
			<td class='text-center'>{{ $no }}</td>
			<td> {{ $list->nama }} </td>
			<td> {{ Fungsi::size($list->size) }} </td>
			<td>
				@include('konten.backend.berita.lampiran.action.download') || 
				@include('konten.backend.berita.lampiran.action.view_detil') || 
				@include('konten.backend.berita.lampiran.action.del')
				
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


{!! $lampiran->render() !!}