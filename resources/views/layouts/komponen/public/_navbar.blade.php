  <ul class="nav navbar-nav navbar-right">



 @include('layouts.komponen.public._navbar_menu_tambahan')


       <li @if(isset($galery_home)) class='active' @endif><a href="{!! URL::route('galery.index') !!}">  
        <i class='fa fa-image'></i> galery</a></li>


       <li @if(isset($daftar_file_home)) class='active' @endif><a href="{!! URL::route('daftar_file.index') !!}">  
        <i class='fa fa-folder'></i> daftar file</a></li>


     @if($sv->get_val('config_pencarian_frontend') == 1)
      <li @if(isset($pencarian_pengguna_home)) class='active' @endif><a href="{!! URL::route('pengguna.index') !!}">  
        <i class='fa fa-search'></i> pencarian data {!! $sv->get_val('config_nama_pencarian') !!}</a></li>
      @endif


      @if($sv->get_val('config_password_frontend') == 1)
      <li @if(isset($reset_password_home)) class='active' @endif><a href="/password/email">
        <i class='fa fa-envelope'></i> lupa password</a></li>  
        @endif      


      @if($sv->get_val('config_login_frontend') == 0)
      <li>
           <a id='login_page' href="#">
            <i class='fa fa-lock'></i> LOGIN
          </a>
      </li>  
<script type="text/javascript">
$('#login_page').click(function(){
  $('#myModal').modal('show');
  $('.modal-body').load('{!! route("auth.login") !!}')
  return false;
})
</script>

        @endif  


</ul>