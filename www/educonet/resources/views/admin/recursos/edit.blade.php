@extends('adminlte::page')

@section('title', 'Editar curso')

@section('content_header')
    <h1 class="text-center text-info">Editar curso</h1>
@stop

@section('content')
    <div class= "flex justify-center flex-wrap p-4 mt-5">
        @include("admin.recursos.form")
    </div>
@stop