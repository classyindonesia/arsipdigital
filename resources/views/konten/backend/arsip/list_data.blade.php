<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th  style='text-align:center;' width='5%'>No.</th>
			<th>Nama Arsip</th>


			<th  style='text-align:center;' width='7%'>jml file</th>
			<th width='20%'>Tgl berkas diarsipkan</th>
			<th width='160px' class="text-center">action</th>
		</tr>
	</thead>
	<tbody>

<?php $no= $arsip->firstItem(); ?>
@foreach($arsip as $list)
		<tr>
			<td style='text-align:center;'>{{ $no }}</td>

			<td>
				 <a href="{!! route('my_archive.files', $list->id) !!}">
				 	{{ $list->nama }}
				 </a> 
				<br>
				<span class='label label-success'>
					{{ $list->kode_arsip }} 
				</span>
				|| 
				<span class='label label-success'>
					<i class='fa fa-folder'></i>
					@if(count($list->mst_folder)>0) 
						{{ $list->mst_folder->nama }} 
	 				@else
						-
					@endif					
				</span>	
				||
				<span class='label label-success'>
				 <i class='fa fa-user'></i>	 @if(count($list->mst_user)>0) {{ $list->mst_user->data_user->nama }} @else - @endif 
				</span>			
			</td>
 
			<td style='text-align:center;'>{{ count($list->mst_file) }}</td>
			<td>{{ Fungsi::date_to_tgl($list->tgl_arsip) }}</td>
			<td class="text-center"> 
				@include('konten.backend.arsip.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


{!! $arsip->render() !!}