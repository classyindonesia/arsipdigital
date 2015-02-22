<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($nav_berita)) class="active" @endif ><a href="{!! URL::route('admin_berita.index') !!}">Berita</a></li>
  <li role="presentation" @if(isset($lampiran_berita_home)) class="active" @endif><a href="{!! URL::route('lampiran_berita.index') !!}">Lampiran File</a></li>
 </ul>