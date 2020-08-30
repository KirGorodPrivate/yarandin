@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center pb-3">Projects List</h1>
        </div>
        <div class="col-12">
            <a href="/project/create" class="btn btn-primary mb-3">Create Project</a>
        </div>
    </div>
        <div class="row">
        @foreach($projects as $project)
            <div class="col-4 d-flex align-stretch">
                <div class="card mb-3" style="width: 18rem; background: rgb(85,147,255);
                background: linear-gradient(0deg, rgba(85,147,255,1) 0%, rgb(99 0 232) 96%);">
                <a href="{{ route('project.show', $project->id) }}" style="text-decoration: none; color: inherit;">
                <div class="card-body">
                    <h5 class="card-title text-white pb-4 text-center">{{$project->title}}</h5>
                    <p class="card-text text-white">{{$project->description}}</p>
                </div>
                </a>
                </div>
            </div>
        @endforeach
        </div>
</div>
@endsection
