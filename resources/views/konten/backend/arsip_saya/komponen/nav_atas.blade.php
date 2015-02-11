<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($my_archive_home)) class="active" @endif><a href="{!! URL::route('my_archive.index') !!}">Arsip Saya</a></li>
  <li role="presentation" @if(isset($folder_home)) class="active" @endif><a href="{!! URL::route('list_folder.index') !!}">Folder</a></li>

  <li role="presentation" @if(isset($rak_user)) class="active" @endif><a href="{!! URL::route('rak_user.index') !!}">Rak Arsip</a></li>


   <li role="presentation"><a href="#"> <i class='fa fa-info-circle'></i> Info</a></li>
</ul>