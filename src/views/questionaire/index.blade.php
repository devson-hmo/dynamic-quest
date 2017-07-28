@extends("layouts.app")


@section("content")
    @component("questionaire::components.panel")
        <h1>Cuestionarios</h1>
        
        <question-app></question-app>
    @endcomponent   
@endsection