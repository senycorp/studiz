@extends('theme::main')

@section('content')
    <form class="form-horizontal" action="{{URL::to('semester')}}@if ($model->id)/{{$model->id}}@endif" method="POST">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$model->title}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Duration of Semester</label>
            <div class="col-sm-10">
                <div class="input-prepend input-group">
                    <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                    <input type="text" name="duration" class="form-control" value="{{$model->start_at}} - {{$model->end_at}}"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Assigned Subjects</label>
            <div class="col-sm-10">
                <div class="input-prepend input-group">
                    <select name="subjects" multiple="true" class="form-control">
                        @if ($model->id)
                            {{\Studiz\Theme\Component\Choice::fromModel(\Studiz\Subject\Model\Subject::all(), \Studiz\Semester\Model\Semester::find($model->id)->subjects()->get())}}
                        @else
                            {{\Studiz\Theme\Component\Choice::fromModel(\Studiz\Subject\Model\Subject::all())}}
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                @if ($model->id)
                    @a.updater('Save', 'semester/'.$model->id)
                @else
                    @a.creator('Create', 'semester')
                @endif
            </div>
        </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('input[name="duration"]').daterangepicker({
                format: 'YYYY-MM-DD'
            });

            $('select[name="subjects"]').chosen({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@stop