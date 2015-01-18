@extends('theme::main')

@section('content')
    <ul>
        @forelse($models as $model)
            <li>
                <a href="subject/{{$model->id}}">
                    {{ $model->title }}
                </a>
            </li>
        @empty
            <li>No users</li>
        @endforelse
    </ul>
@stop