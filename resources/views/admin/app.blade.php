@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('css')
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@stop

@section('js')
        <script src="{{ mix('js/app.js') }}" defer></script>
@stop