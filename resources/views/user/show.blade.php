@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$user->name}}</h1>
                <p>Email: {{$user->email}}</p>
                <small>Created at: {{$user->created_at}}</small>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h3>Projects: </h3>
            </div>
            @foreach(\App\Project::all()->where('user_id', $user->id) as $project)
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
