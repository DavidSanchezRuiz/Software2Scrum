@if(count($errors) > 0)
     <ul class="notification-title" style="color: red">

    @foreach($errors->all() as $error)
  	<li>* {!!$error!!}</li>
  	@endforeach
	</ul>


@endif