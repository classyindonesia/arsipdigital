<li style='text-align:center;'> 

	@if(file_exists(public_path('upload/avatars/'.md5(Auth::user()->email).'.jpg')))
     	<img src="/upload/avatars/{!! md5(Auth::user()->email) !!}.jpg" class='img-circle' alt='...' style='width:100px;height:100px;border:3px solid #aaa;' />
       	


    @else
    <img src="/upload/user.png" class='img-circle' alt='...' style='width:100px;height:100px;border:3px solid #aaa;' />
    @endif



    <hr style='margin:0px;'>

   {{ Auth::user()->data_user->nama }}
    <br>
     <hr>
</li>