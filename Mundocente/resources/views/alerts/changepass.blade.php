@if(Session::has('message-change-data-pass'))


<div class="row">

  	
  	<div class="col s12 red">
  		
  		{{Session::get('message-change-data-pass')}}
  	</div>
      
    </div>



@endif