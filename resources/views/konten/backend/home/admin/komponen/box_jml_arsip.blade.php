<?php
$jml_arsip = \App\Models\Mst\Arsip::count();

?>

	    <div class="small-box bg-olive">
		    <div class="inner">
		        <h3>
		            {{ $jml_arsip }}
		        </h3>
		        <p>
		            Jml Arsip
		        </p>
		    </div>
		    <div class="icon">
		       <i class='fa fa-archive'></i>
		    </div>
		    <a href="#" class="small-box-footer">
		        More info <i class="fa fa-arrow-circle-right"></i>
		    </a>
		</div>
 