@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center pb-3">Projects List</h1>
        </div>
        <div class="col-12">
            <a href="{{ route('project.create')" class="btn btn-primary mb-3">Create Project</a>
        </div>
    </div>
        @foreach($projects as $project)
        <div class="row border mb-3" style="background-color: #e0e0e0;">
            <div class="col-12">
                <h3>
                    {{$project->title}}
                </h3>
            </div>
            <div class="col-12">
                <p>{{$project->description}}</p>
            </div>
            <div class="col-12">
                <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
        @endforeach
</div>
@endsection
