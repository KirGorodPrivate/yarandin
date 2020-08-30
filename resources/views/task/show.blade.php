@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="card-title">{{$task->title}}</h1>
                <p class="card-text">{{$task->description}}</p>
                @if($task->status == "New")
                <p>Status: <span  class="text-success">{{$task->status}}</span></p>
                @elseif($task->status == "In progress")
                <p>Status: <span class="text-primary">{{$task->status}}</span></p>
                @else
                <p>Status: <span class="text-danger">{{$task->status}}</span></p>
                @endif
                @if($task->file != '')
                <span>File: </span>
                <a href="{{ route('task.download', $task->file) }}" download>{{$task->file}}</a>
                @else
                <p>No files attached to this Task</p>
                @endif
            </div>
            <div class="col-12">
                <a href="/project/{{$task->project->id}}/task/{{$task->id}}/delete" class="btn btn-danger">Delete</a>
                <a href="/project/{{$task->project->id}}/task/{{$task->id}}/update" class="btn btn-success">Update</a>
            </div>
        </div>
    </div>
@endsection
