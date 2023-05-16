@extends('adminlte::page')

@section('title', $page)

@section('content_header')
    <h1>{{ $page }}</h1>
@stop

@section('css')
        {{-- @vite(['resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
        <script src="{{ mix('js/app.js') }}" defer></script>
@stop
