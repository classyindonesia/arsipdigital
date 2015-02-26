<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($penerima_home)) class="active" @endif ><a href="{!! URL::route('emails.index') !!}">Penerima</a></li>
  <li role="presentation" @if(isset($kirim_email_home)) class="active" @endif><a href="{!! URL::route('emails.kirim') !!}">Kirim Email</a></li>
</ul>

<hr>