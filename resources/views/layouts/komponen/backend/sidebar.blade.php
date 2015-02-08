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
                    

                    <li @if(isset($users_home)) class="active" @endif>
                        <a href="{{ URL::route('users.index') }}">
                            <i class='fa fa-users'></i> Daftar Pengguna
                        </a>
                    </li>
                    



                    <li @if(isset($rak_home)) class="active" @endif>
                        <a href="{{ URL::route('rak.index') }}">
                            <i class='fa fa-building'></i> Daftar Rak Arsip
                        </a>
                    </li>


                    <li @if(isset($folder_home)) class="active" @endif>
                        <a href="{{ URL::route('folders.index') }}">
                            <i class='fa fa-folder'></i> Daftar Folder/Map Arsip
                        </a>
                    </li>


                    <li><a href="javascript:;">Products</a></li>
                    <li><a href="javascript:;">FAQ</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>
                </ul>
            </nav>
 