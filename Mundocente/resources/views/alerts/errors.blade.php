@if(count($errors) > 0)
 <div class="row">

  	@foreach($errors->all() as $error)
  	<div class="col s12  red lighten-3">{!!$error!!}</div>
  	
  	@endforeach

      
    </div>


@endif