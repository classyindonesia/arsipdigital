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


 

@include('layouts.komponen.public.navbar')



       <div class='container'>



 @yield('main_konten')
 


       </div>


    <footer class="footer">
      <div class="container">
       <p class="text-muted">Copyright &copy; {{ str_replace('http://', '', URL::to("/")) }}</p>
      </div>
    </footer>

    

    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '{!! env("DISQUS_SHORTNAME") !!}'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
    
  </body>
</html>