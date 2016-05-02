@if(Session::has('message-change-data'))


<div class="row">

  	
  	<div class="col s12  teal lighten-2">
  		
  		{{Session::get('message-change-data')}}
  	</div>
      
    </div>



@endif