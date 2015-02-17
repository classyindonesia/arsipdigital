<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('NAMA_APP'))</title>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    @include('layouts.komponen.public.head')

    <!-- Bootstrap -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
     <body> 













       <div class='container'>
        <div class='col-md-6 jumbotron animated fadeIn'>
              <h1 style='margin-top: 0px;'> <i class='fa fa-cubes'></i> Arsip Digital</h1>
<hr style='margin:2px;'>
 {!! env('DESKRIPSI_APP') !!}

          </div>
        <div class='col-md-6'>
            @yield('main_konten')
        </div>
       </div>


    <footer class="footer">
      <div class="container">
       <p class="text-muted">Copyright &copy; {{ str_replace('http://', '', URL::to("/")) }}</p>
      </div>
    </footer>

    @include('layouts.komponen.public.js')
  </body>
</html>