<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>



@include($base_view.'popup.action.add')
@include($base_view.'popup.action.add_all')


<script type="text/javascript">
$('#myModal').on('hidden.bs.modal', function (e) {
	window.location.reload();
})
</script>




</script>


<h3>List User</h3>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%' class='text-center'>No.</th>
			<th>Nama</th>
			<th>Email</th>
			<th width='5%' class='text-center'>Action</th>
		</tr>
	</thead>
	<tbody>
<?php $no = 1; ?>
@foreach($list_user as $list)
		<tr>
			<td class='text-center'>{{ $no }}</td>
			<td> @if(count($list->data_user)) {{ $list->data_user->nama }} @else - @endif</td>
			<td>{{ $list->email }}</td>
			<td>

				@include('konten.backend.staff_akses.action.del_user_akses')
			</td>
		</tr>
<?php $no++; ?>
@endforeach

	</tbody>
</table>
