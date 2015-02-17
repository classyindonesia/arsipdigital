<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($my_archive_home)) class="active" @endif>
  	<a href="{!! URL::route('my_archive.index') !!}"> <i class='fa fa-archive'></i> Arsip Saya</a>
  </li>
  <li role="presentation" @if(isset($folder_home)) class="active" @endif>
  	<a href="{!! URL::route('list_folder.index') !!}"><i class='fa fa-folder'></i> Folder</a>
  </li>

  <li role="presentation" @if(isset($rak_user)) class="active" @endif>
  	<a href="{!! URL::route('rak_user.index') !!}"><i class='fa fa-building'></i> Rak Arsip</a>
  </li>


 </ul>