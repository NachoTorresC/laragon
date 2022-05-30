@extends('adminlte::page')

@section('title', 'Nuevo Recurso')

@section('content_header')
    <h1 class="text-center text-info">Nuevo Curso</h1>
@stop

@section('content')
    <div class= "flex justify-center flex-wrap p-4 mt-5">
        @include("admin.cursos.form")
    </div>
@stop