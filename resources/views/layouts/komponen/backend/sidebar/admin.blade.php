              <nav class="nav-sidebar">
                <ul class="nav">


                    @include('layouts.komponen.backend.sidebar.sidebar_user_avatar')



                    <li @if(isset($dashboard_home)) class="active" @endif >
                        <a href="{{ URL::route('home.index') }}">
                            <i class='fa fa-home'></i> Home
                        </a>
                    </li>
                    

                    <li @if(isset($arsip_home)) class="active" @endif>
                        <a href="{{ URL::route('arsip.index') }}">
                            <i class='fa fa-archive'></i> Arsip User
                        </a>
                    </li>


                    <li @if(isset($staff_akses_home)) class="active" @endif>
                        <a href="{{ URL::route('staff_akses.index') }}">
                            <i class='fa fa-plug'></i> Staff Akses
                        </a>
                    </li>
                    


                    <li @if(isset($users_home)) class="active" @endif>
                        <a href="{{ URL::route('users.index') }}">
                            <i class='fa fa-users'></i> Daftar Pengguna
                        </a>
                    </li>
               


                    <li @if(isset($emails_home)) class="active" @endif>
                        <a href="{{ URL::route('emails.index') }}">
                            <i class='fa fa-envelope-o'></i> Email
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

                    <li @if(isset($ref_home)) class="active" @endif>
                        <a href="{{ URL::route('data_ref.index') }}">
                            <i class='fa fa-th-list'></i> Data Referensi
                        </a>
                    </li>



                    <li @if(isset($my_profile)) class="active" @endif>
                        <a href="{{ URL::route('my_profile.index') }}">
                            <i class='fa fa-wrench'></i> Profil Saya
                        </a>
                    </li>

                    <li @if(isset($config_home)) class="active" @endif>
                        <a href="{{ URL::route('config.index') }}">
                            <i class='fa fa-cogs'></i> Config
                        </a>
                    </li>


 
                    <li><a href="{{ URL::to('auth/logout') }}"><i class="glyphicon glyphicon-off"></i> Logout</a> </li>


                </ul>
            </nav>
 