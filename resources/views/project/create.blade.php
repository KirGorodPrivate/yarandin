@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Create Project</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('project.save') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title" name="title">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection
