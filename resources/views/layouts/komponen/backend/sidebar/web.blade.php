              <nav class="nav-sidebar">
                <ul class="nav">


                    @include('layouts.komponen.backend.sidebar.sidebar_user_avatar')




                    <li @if(isset($dashboard_home)) class="active" @endif >
                        <a href="{{ URL::route('home.index') }}">
                            <i class='fa fa-home'></i> Home
                        </a>
                    </li>
                      
                    <li @if(isset($berita_home)) class="active" @endif >
                        <a href="{{ URL::route('admin_berita.index') }}">
                            <i class='fa fa-newspaper-o'></i> Berita
                        </a>
                    </li>


                    <li @if(isset($my_profile)) class="active" @endif>
                        <a href="{{ URL::route('my_profile.index') }}">
                            <i class='fa fa-wrench'></i> Profil Saya
                        </a>
                    </li>

                    <li><a href="{{ URL::to('auth/logout') }}"><i class="glyphicon glyphicon-off"></i> Logout</a> </li>

 
                </ul>
            </nav>
 