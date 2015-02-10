<ol class="breadcrumb">
  <li><a href="{!! URL::route('list_folder.index') !!}">Folder</a></li>

 <?php
$folder =  \App\Models\Mst\Folder::whereParentId(Request::segment(3))->get();
$itemsHelper = new \App\Helpers\BreadcrumbsHelper($folder);


  ?>
  {!! $itemsHelper->htmlList() !!}

</ol>