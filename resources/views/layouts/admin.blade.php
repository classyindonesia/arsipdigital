<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('NAMA_APP'))</title>

 
<link href='//fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
  


    @include('layouts.komponen.backend.head')
    @include('layouts.komponen.backend.js')
 


    <!-- Bootstrap -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
     <body>
 
    @include('layouts.komponen.modal')


    @include('layouts.komponen.backend.navbar')



 

       <div class='container-fluid'>
        <div class='col-md-2'>
           @include('layouts.komponen.backend.sidebar')
        </div>
       
      <div class='col-md-10'>

        @yield('title_header')


         @yield('main_konten')
       </div>
    </div>


 
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy; {{ str_replace('http://', '', URL::to("/")) }}</p>
      </div>
    </footer>
    

  </body>
</html>