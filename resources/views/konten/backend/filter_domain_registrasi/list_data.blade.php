<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="10px" class="text-center">No.</th>
			<th>Nama</th>
			<th>Domain</th>
			<th width="80px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	@php($no=$filter->firstItem())
	@foreach($filter as $list)
		<tr>
			<td class="text-center">{{ $no++ }}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->domain !!}</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

{!! $filter->appends(Request::all())->render() !!}