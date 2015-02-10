              <nav class="nav-sidebar">
                <ul class="nav">


                    <li style='text-align:center;'> 
                        <i class='fa fa-user' style='font-size:50px;'></i> 
                        <hr style='margin:0px;'>

                       {{ Auth::user()->data_user->nama }}
                        <br>
                        <i class='fa fa-circle text-success'></i> online
                        <hr>
 

                    </li>



                    <li @if(isset($dashboard_home)) class="active" @endif >
                        <a href="{{ URL::route('home.index') }}">
                            <i class='fa fa-home'></i> Home
                        </a>
                    </li>
     


                    <li @if(isset($my_archive)) class="active" @endif>
                        <a href="{{ URL::route('my_archive.index') }}">
                            <i class='fa fa-archive'></i> Arsip Saya
                        </a>
                    </li>

                    

                    <li @if(isset($my_profile)) class="active" @endif>
                        <a href="{{ URL::route('my_profile.index') }}">
                            <i class='fa fa-wrench'></i> Profil Saya
                        </a>
                    </li>



 
                    <li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>
                </ul>
            </nav>
 