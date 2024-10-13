<!--
Propósito: Esta vista es la página de inicio de la aplicación.
Contenido: Contiene la sección hero, contenido que el usuario ha visto y películas populares. 
-->
@extends('layouts.home-layout')

@section('content')
    @include('components.home-navbar')
    @include('movie-section.home-hero')

    @include('movie-section.continue-watching')
    @include('movie-section.popular-movies')
    @include('components.home-footer')
@endsection