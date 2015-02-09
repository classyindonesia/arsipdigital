<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($ref_home_index)) class="active" @endif><a href="{!! URL::route('data_ref.index') !!}">Home</a></li>
  <li role="presentation" @if(isset($ref_home_agama)) class="active" @endif><a href="{!! URL::route('ref_agama.index') !!}">Agama</a></li>
  <li role="presentation" @if(isset($ref_home_homebase)) class="active" @endif><a href="{!! URL::route('ref_homebase.index') !!}">home Base</a></li>
  <li role="presentation" @if(isset($ref_home_kota)) class="active" @endif><a href="{!! URL::route('ref_kota.index') !!}">Kota</a></li>
  <li role="presentation" @if(isset($ref_home_status_pernikahan)) class="active" @endif><a href="{!! URL::route('ref_status_pernikahan.index') !!}">Status Pernikahan</a></li>
  <li role="presentation" @if(isset($ref_home_status_ikatan)) class="active" @endif><a href="{!! URL::route('ref_status_ikatan.index') !!}">Status Ikatan</a></li>


</ul>