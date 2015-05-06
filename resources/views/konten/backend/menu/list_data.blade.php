<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="50px" class="text-center">No.</th>
			<th>Nama menu</th>
			<th>internal/eksternal</th>
			<th>link</th>
			<th width="90px">child menu</th>
			<th width='90px' class='text-center' >action</th>
		</tr>
	</thead>
	<tbody>
<?php $no=$menu->firstItem(); ?>
@foreach($menu as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td> @if($list->is_internal == 1) 
					<span class='label label-success'>internal</span> 
				@else 
					<span class='label label-warning'>eksternal</span> 
				@endif
			</td>
			<td> {!! $list->link !!} </td>
			<td class="text-center"> 
				<a class="label label-info" href="{!! route('backend_menu.child', $list->id) !!}">
					{!! count($list->mst_menu_child) !!} 
				</a>
				
			</td>
			<td>
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach

	</tbody>
</table>


{!! $menu->render() !!}