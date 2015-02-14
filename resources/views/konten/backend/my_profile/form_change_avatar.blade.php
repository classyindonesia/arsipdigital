	@if(file_exists(public_path('upload/avatars/'.md5(Auth::user()->email).'.jpg')))
     	<img src="/upload/avatars/{!! md5(Auth::user()->email) !!}.jpg" class='img-circle' alt='...' style='width:100px;height:100px;border:3px solid #aaa;' />
    @else
	    <img src="/upload/user.png" class='img-circle' alt='...' style='width:100px;height:100px;' />
    @endif
<span id='change_avatar' style='cursor:pointer;' class='label btn-primary'> <i class='fa fa-pencil'></i> change avatar</span> 


 <hr>


<script type="text/javascript">
$('#change_avatar').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! URL::route("my_profile.change_avatar") !!}')
});
</script>