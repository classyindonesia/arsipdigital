<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('NAMA_APP'))</title>
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    @include('layouts.komponen.public.head')
  </head>
     <body> 


 





       <div class='container'>



 @yield('main_konten')
 


       </div>


    <footer class="footer">
      <div class="container">
       <p class="text-muted">Copyright &copy; {{ str_replace('http://', '', URL::to("/")) }}</p>
      </div>
    </footer>

    @include('layouts.komponen.public.js')
  </body>
</html>