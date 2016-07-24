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
       @if(Auth::user()->rol=='administrador')
       	@include('formularios.edit_publication_unic')
       @endif

        @if(Auth::user()->rol!='administrador')
       	<h3>No tienes permiso para editar esta publicación</h3>
       @endif
        
    </div>
</div>





@endsection