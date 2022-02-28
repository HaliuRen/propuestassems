@livewireStyles
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/propuestas/css/propuestas.css') }}" rel="stylesheet" id="bootstrap">
@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="text-center">
            Laravel Form Wizard Example
        </div>
        <livewire:wizard />
    </div>

@stop

