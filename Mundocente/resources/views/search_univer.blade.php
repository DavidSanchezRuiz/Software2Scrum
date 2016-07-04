@extends('layout.main')
@section('content')



<section class="section" id="#Content">
    <div class="container">
        <div class="row">
        @include('alerts.changepass')
            @include('formularios.form_search_especific')

            @include('layout.result_univ')



        </div>
    </div>
</section>



@endsection