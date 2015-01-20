@extends('theme::main')

@section('content')
    <form class="form-horizontal" action="{{URL::to('subject')}}@if ($model->id)/{{$model->id}}@endif" method="POST">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$model->title}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                @if ($model->id)
                    @a.updater('Save', 'subject/'.$model->id)
                @else
                    @a.creator('Create', 'subject')
                @endif
            </div>
        </div>
    </form>
@stop