@if(Auth::user()->ref_user_level_id == 1)
    @include('layouts.komponen.backend.sidebar.admin')
@elseif(Auth::user()->ref_user_level_id == 2)
    @include('layouts.komponen.backend.sidebar.staff')
@elseif(Auth::user()->ref_user_level_id == 3)
    @include('layouts.komponen.backend.sidebar.user')
@elseif(Auth::user()->ref_user_level_id == 4)
    @include('layouts.komponen.backend.sidebar.web')    
@endif