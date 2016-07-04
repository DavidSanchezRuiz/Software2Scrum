@extends('layout.main')
@section('content')


<?php
$count_result = 0;
?>


<div class="container-account">
    <div class="card">
        <div style="padding:10px">
            <span class="card-title"><i class="material-icons card-title-center">filter_list</i> Editar publicaciones</span>
        </div>
       

        @include('layout.publicationEdit')
    </div>
</div>





@endsection


