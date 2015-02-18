<nav class="navbar navbar-default">
  <div class="container-fluid">



    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header"  >


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

            <a style='margin-top:-10px;margin-left:2em;' class="navbar-brand" href="{{ URL::route('home.index') }}"> 
              <i style='font-size:30px;' class="fa fa-cubes"></i> {{ env('NAMA_APP') }}</a>
 
    </div>
 






    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
           @if(count(Auth::user()->data_user)>0) {{ Auth::user()->data_user->nama }} @else -kosong- @endif <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li style='padding-left:1em;'>

              {{ Auth::user()->email }} 

            </li>



            <li class="divider"></li>
            <li><a href="{{ URL::to('auth/logout') }}">Logout</a></li>
          </ul>
        </li>

        
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>