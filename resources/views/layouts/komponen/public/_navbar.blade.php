        <ul class="nav navbar-nav navbar-right">
 
           @if($sv->get_val('config_pencarian_frontend') == 1)
            <li @if(isset($pencarian_pengguna_home)) class='active' @endif><a href="{!! URL::route('pengguna.index') !!}">  
              <i class='fa fa-search'></i> pencarian data pengguna</a></li>
            @endif


            @if($sv->get_val('config_password_frontend') == 1)
            <li @if(isset($reset_password_home)) class='active' @endif><a href="/password/email">
              <i class='fa fa-envelope'></i> lupa password</a></li>  
              @endif      
      </ul>