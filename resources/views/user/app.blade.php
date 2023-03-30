@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('css')
        {{-- @vite(['resources/js/app.js']) --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
