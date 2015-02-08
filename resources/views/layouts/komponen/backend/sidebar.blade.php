              <nav class="nav-sidebar">
                <ul class="nav">


                    <li> 
                        <i class='fa fa-user' style='font-size:30px;'></i> {{ Auth::user()->name }}
                        <br>
                        <i class='fa fa-circle text-success'></i> online
                        <hr>
 

                    </li>



                    <li @if(isset($dashboard_home)) class="active" @endif ><a href="{{ URL::route('home.index') }}">Home</a></li>
                    <li @if(isset($users_home)) class="active" @endif><a href="{{ URL::route('users.index') }}">Daftar Pengguna</a></li>
                    <li><a href="javascript:;">Products</a></li>
                    <li><a href="javascript:;">FAQ</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="javascript:;"><i class="glyphicon glyphicon-off"></i> Sign in</a></li>
                </ul>
            </nav>
 