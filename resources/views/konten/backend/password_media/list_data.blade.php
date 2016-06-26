<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Nama Password</th>
			<th>Password</th>
			<th class="text-center" width="100px">Action</th>
		</tr>
	</thead>
	<tbody>
	@php($no=$password->firstItem())
	@foreach($password as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->password !!}</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		@php($no++)
	@endforeach
	</tbody>
</table>


{!! $password->render() !!}