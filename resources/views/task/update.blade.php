@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Update Task</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="/project/{{$project_id}}/task/{{$task_id}}/save" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title" name="title" value="{{$task->title}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$task->description}}</textarea>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="New" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        New
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="In progress">
                    <label class="form-check-label" for="exampleRadios2">
                        In progress
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios3" value="Done">
                    <label class="form-check-label" for="exampleRadios3">
                        Done
                    </label>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="file">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Update Task</button>
                </form>
            </div>
        </div>
    </div>

@endsection
