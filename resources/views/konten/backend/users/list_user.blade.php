<table class="table table-bordered table-hover  animated fadeIn">
	<thead>
		<tr>
			<th width='5%' align='center'>No.</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Level</th>
			<th width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>

<?php $no = $users->firstItem(); ?>
 
@foreach($users as $list)
		<tr>
			<td align='center'> {{ $no }} </td>
			<td> {{ $list->data_user->nama }} </td>
			<td> {{ $list->email }} </td>
			<td> {{ $list->level->nama }} </td>
			<td align='center'> 
				@include('konten.backend.users.action')
	
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>

{!! $users->render() !!}