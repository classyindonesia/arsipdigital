<?php
$id = Request::segment(3);
	?>

@if($id != NULL)

	<?php
		$parent = \App\Models\Mst\Folder::find($id);
		if($parent->parent_id == 0){
			$route_url = URL::route('folders.index');
		}else{
			$parent_id = $parent->parent_id;
			$route_url = URL::route('folders.child', $parent_id);			
		}
?>
 <a class='label label-primary' href="{!! $route_url !!}"> <i class='fa fa-arrow-left'></i> back</a> 

@endif