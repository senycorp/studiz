@extends('theme::main')

@section('content')
    Subject {{$model->title}}

    <a href="{{$model->id}}" data-method="delete">Delete</a>
@stop