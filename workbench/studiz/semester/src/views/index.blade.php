@extends('theme::main')

@section('content')
    <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900|Oswald);
        .status {
            font-family: 'Source Sans Pro', sans-serif;
        }
        .status .panel-title {
            font-family: 'Oswald', sans-serif;
            font-size: 72px;
            font-weight: bold;
            color: #fff;
            line-height: 45px;
            padding-top: 20px;
            letter-spacing: -0.8px;
        }
    </style>
        <a href="semester/create" class="btn btn-success"><i class="fa fa-plus"></i> Create</a>
        <div class="row">
            @forelse($models as $model)
                <div class="col-xs-6 col-md-3">

                    <div class="panel status panel-danger">
                        <div class="panel-heading">
                            <h1 class="panel-title text-center">{{ $model->title }}</h1>
                        </div>
                        <div class="panel-body text-center">
                            <a href="semester/{{$model->id}}" class="btn"><i class="fa fa-eye"></i> View</a>
                            <a href="semester/{{$model->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="semester/{{$model->id}}" data-method="DELETE" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>

                </div>
            @empty
                <li>No users</li>
            @endforelse
        </div>

@stop