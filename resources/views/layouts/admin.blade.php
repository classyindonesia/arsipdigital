<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('layouts.komponen.backend.head')

    <!-- Bootstrap -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
     <body class="skin-blue">
 



@include('layouts.komponen.backend.header')




        <div class="wrapper row-offcanvas row-offcanvas-left">


  @include('layouts.komponen.backend.sidebar')



            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

              @yield('konten_header')



              @yield('main_konten')
     




            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->



    @include('layouts.komponen.backend.js')


  </body>
</html>