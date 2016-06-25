<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Nama</th>
			<th>Email</th>
			<th width="80px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	@php($no=$akses->firstItem())
	@foreach($akses as $list)
		<tr>
			<td class="text-center">
				{!! $no !!}
			</td>
			<td>{!! $list->mst_user->data_user->nama  !!}</td>
			<td>{!! $list->mst_user->email  !!}</td>
			<td class="text-center"> 
				@include($base_view.'action')
			</td>
		</tr>
		@php($no++)
	@endforeach
	</tbody>
</table>


{!! $akses->appends(Request::all())->render(); !!}