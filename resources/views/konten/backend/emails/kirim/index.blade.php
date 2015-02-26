@extends('layouts.admin')

 

@section('title_header')	
	
	

 <h1 class='title_header '>Kirim Email  </h1>
<hr>
@stop



@section('main_konten') 
@include('konten.backend.emails.tombol.attach_file')

@include('konten.backend.emails.komponen.nav_atas')





<div class='form-group'>
	{!! Form::label('subject', 'Subject Email') !!}
	<input type='text' id='subject' name='subject' placeholder='subject' class='form-control' />
</div>


<div class='form-group'>
	<textarea name='konten'   class='form-control' id='ckeditor'></textarea>
</div>


 
Jumlah penerima : <span>{!! $jml_penerima !!}</span>

<hr>
@include('konten.backend.emails.kirim.tombol_action')


<script type="text/javascript">
$( document ).ready( function() {
	$( 'textarea#ckeditor' ).ckeditor();
} );


</script>




@endsection



@section('title')
	 Kirim Email
@endsection


@section('script_tambahan')
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckeditor/adapters/jquery.js"></script>
@endsection