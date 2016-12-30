<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('custom_meta_tag')
    <title>@yield('title', env('NAMA_APP'))</title>
    <link href='//fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    @include('layouts.komponen.public.head')
  </head>
     <body> 


     @include('layouts.komponen.modal')


@include('layouts.komponen.public.navbar')



       <div class='container'>
 @yield('main_konten')
 
       </div>



@include('layouts.komponen.public.footer')


 @yield('script_bottom') 
 
  </body>
</html>