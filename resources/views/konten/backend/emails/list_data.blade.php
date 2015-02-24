<div class='col-md-5'>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%' class='text-center'>No.</th>
			<th>Email</th>
			<th width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $antrian->firstItem(); ?>
		@foreach($antrian as $list)
		<tr>
			<td class='text-center'> {{ $no }} </td>
			<td>{{ $list->email }}</td>
			<td> 
				@include('konten.backend.emails.action')
			</td>
		</tr>
		<?php $no++; ?>
		@endforeach
	</tbody>
</table>

{!! $antrian->render() !!}

</div>
