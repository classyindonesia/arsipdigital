    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{!! URL::route('home.index') !!}"><i class='fa fa-cubes'></i> {!! env("NAMA_APP") !!} </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">


        <ul class="nav navbar-nav navbar-right">
 

            <li @if(isset($pencarian_pengguna_home)) class='active' @endif><a href="{!! URL::route('pengguna.index') !!}">  
              <i class='fa fa-search'></i> pencarian data pengguna</a></li>
            <li @if(isset($reset_password_home)) class='active' @endif><a href="/password/email">
              <i class='fa fa-envelope'></i> lupa password</a></li>        
      </ul>




        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
