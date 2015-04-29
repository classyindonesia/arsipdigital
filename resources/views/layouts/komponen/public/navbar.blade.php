    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{!! URL::route('home.index') !!}"><i class='{!! ICON_DEPAN !!}'></i> {!! env("NAMA_APP") !!} </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">


          @include('layouts.komponen.public._navbar')




        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
