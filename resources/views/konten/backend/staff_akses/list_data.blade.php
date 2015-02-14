<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%' class='text-center'>No.</th>
			<th>Nama</th>
			<th width='10%' class='text-center'>Jml User</th>
			<th width='6%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $staff_user->firstItem(); ?>
@foreach($staff_user as $list)
		<tr>
			<td class='text-center'>{{ $no }}</td>
			<td>{{ $list->data_user->nama }}</td>
			<td class='text-center'>{{ count($list->staff_user) }}</td>
			<td>
				  @include('konten.backend.staff_akses.action')
			</td>
		</tr>
<?php $no++; ?>
@endforeach
	</tbody>
</table>

{!! $staff_user->render() !!}