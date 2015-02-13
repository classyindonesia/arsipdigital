<table  class='table table-bordered'>


		<tr class='bg-olive'>
			<td colspan='2'> <h3>Statistik Folder</h3> </td>
 
 		</tr>

 <?php
$folder = \App\Models\Mst\Folder::with('mst_arsip')->get();
$jml_all_arsip =  \App\Models\Mst\Arsip::count();
  ?>
@foreach($folder as $list)
		<tr>
			<td width='20%'>{{ $list->nama }}</td>
			<td>
				<?php 
				$jml_arsip_per_folder = count($list->mst_arsip);
				if($jml_arsip_per_folder <= 0){
					$hasil = 0;
				}else{
					$hasil = $jml_arsip_per_folder * 100 / $jml_all_arsip;
				}
				$hasil = round($hasil,0);
			 ?>
 					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $hasil }}%;">
					    [{{ $jml_arsip_per_folder }}] -  @if($hasil == 0)  0 @else {{ $hasil }} @endif%

					  </div>
					</div>
			</td>
 		</tr>
@endforeach


 </table>

 