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
            <label for="inputEmail3" class="col-sm-2 control-label">Color</label>
            <div class="col-sm-10">
                <input type="text" name="color" class="form-control colorpicker" value="{{$model->color}}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control">{{$model->description}}</textarea>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $(".colorpicker").ColorPickerSliders({
                size: 'sm',
                placement: 'bottom',
                swatches: false,
                sliders: false,
                hsvpanel: true,
                previewformat: 'hex'
            });

            $('textarea').wysihtml5();
        });
    </script>
@stop