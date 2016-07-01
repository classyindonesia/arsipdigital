<div class="row">
    <div class="col-md-8">
        @include($base_view.'statistik.graph_harian')
        <hr>
        @include($base_view.'statistik.graph_mingguan')
        <hr>
         @include($base_view.'statistik.graph_bulanan')
    </div>
    <div class="col-md-4">
    	@include($base_view.'statistik.harian')
    	@include($base_view.'statistik.mingguan')    	
        @include($base_view.'statistik.bulanan')
    </div>

</div>

