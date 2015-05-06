<table class="table table-bordered table-hover  animated fadeIn">
	<thead>
		<tr>
			<th width='5%' align='center'>No.</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Level</th>
			<th  align='center' width='15%'>Action</th>
		</tr>
	</thead>
	<tbody>

<?php $no = $users->firstItem(); ?>
 
@foreach($users as $list)
		<tr>
			<td align='center'> {{ $no }} </td>
			<td> {{ $list->nama }}</td>
			<td> {{ $list->mst_user->email }} </td>
			<td> {{ $list->mst_user->level->nama }} </td>
			<td align='center'> 
				@include('konten.backend.users.action')	
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>

{!! $users->render() !!}