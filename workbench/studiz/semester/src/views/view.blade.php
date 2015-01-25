@extends('theme::main')

@section('content')
    Subject {{$model->title}}

    @a.deletor('Delete Subject', 'subject/'.$model->id, 'active')
@stop