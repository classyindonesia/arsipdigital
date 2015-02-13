<div class="col-lg-3 col-xs-6 animated fadeIn">

	    <div class="small-box bg-red">
		    <div style='padding-top:3.1em;' class="inner">
		        <b>
		        	<?php
		        	$jml_size = \App\Models\Mst\File::sum('size');
		        	 ?>
		           {{ Fungsi::size($jml_size) }}
		           </b>
		        <p>
		            File size
		        </p>
		    </div>
		    <div class="icon">
		       <i class='fa fa-database'></i>
		    </div>
		    <a href="#" class="small-box-footer">
		        More info <i class="fa fa-arrow-circle-right"></i>
		    </a>
		</div>
</div>