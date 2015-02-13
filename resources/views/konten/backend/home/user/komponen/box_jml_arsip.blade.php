<div class="col-lg-3 col-xs-6 animated fadeIn">
	    <div class="small-box bg-olive">
		    <div class="inner">
		        <h3>
		        	<?php
		        	$jml_arsip = \App\Models\Mst\Arsip::where('mst_user_id', '=', Auth::user()->id)->count();
		        	 ?>
		           {{ $jml_arsip }}
		        </h3>
		        <p>
		            Jml Arsip
		        </p>
		    </div>
		    <div class="icon">
		       <i class='fa fa-archive'></i>
		    </div>
		    <a href="{!! URL::route('my_archive.index') !!}" class="small-box-footer">
		        More info <i class="fa fa-arrow-circle-right"></i>
		    </a>
		</div>



		

	    <div class="small-box bg-teal">
		    <div class="inner">
		        <h3>
		        	<?php
		        	$jml_arsip = \App\Models\Mst\File::where('mst_user_id', '=', Auth::user()->id)->count();
		        	 ?>
		           {{ $jml_arsip }}
		           </h3>
		        <p>
		            Jml File Arsip
		        </p>
		    </div>
		    <div class="icon">
		       <i class='fa fa-th-list'></i>
		    </div>
		    <a href="#" class="small-box-footer">
		        More info <i class="fa fa-arrow-circle-right"></i>
		    </a>
		</div>







	    <div class="small-box bg-red">
		    <div style='padding-top:3.5em;' class="inner">
		        <b>
		        	<?php
		        	$jml_size = \App\Models\Mst\File::where('mst_user_id', '=', Auth::user()->id)->sum('size');
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