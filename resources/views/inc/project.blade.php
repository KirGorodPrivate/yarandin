<div class="row">
        <div class="col-10">
            <h1 class="text-center">{{$project->title}}</h1>
            <p class="text-center">{{$project->description}}</p>
        </div>
        <div class="col-2 d-flex flex-column align-self-center">
                <a href="{{ route('project.update', $project->id) }}" class="btn btn-success mb-3">Update</a>
                <a href="{{ route('project.delete', $project->id) }}" class="btn btn-danger">Delete</a>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-12 d-flex flex-row justify-content-around align-items-center">
            <div><a href="{{ route('project.show', $project->id) }}">All</a></div>
            <div><a href="{{ route('project.new', $project->id) }}">New</a></div>
            <div><a href="{{ route('project.progress', $project->id) }}">In Progress</a></div>
            <div><a href="{{ route('project.done', $project->id) }}">Done</a></div>
            <div><a href="{{ route('task.create', $project->id) }}" class="btn btn-primary">Add Task</a></div>
        </div>
    </div>
    <div class="row">
        @if(count($tasks->all()) > 0)
        @foreach($tasks->all() as $task)   
            <div class="col-3 mb-4 d-flex align-stretch">
                <div class="card" style="width: 18rem;">
                    <div class="card-body" style="position: relative;">
                        <div class="card-icons mb-3 d-flex justify-content-between">
                            <div>
                                
                                <a href="/project/{{$project->id}}/task/{{$task->id}}" class=""><i class="fas fa-search"></i> Read More</a>
                            </div>
                            <div>
                                <a href="/project/{{$project->id}}/task/{{$task->id}}/delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a href="/project/{{$project->id}}/task/{{$task->id}}/update">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        <h5 class="card-title pb-3 text-bold">{{$task->title}}</h5>
                        <p class="card-text">{{$task->description}}</p>
                        <hr>
                        @if($task->status == "New")
                            <p>Status: <span  class="text-success">{{$task->status}}</span></p>
                            @elseif($task->status == "In progress")
                            <p>Status: <span class="text-primary">{{$task->status}}</span></p>
                            @else
                            <p>Status: <span class="text-danger">{{$task->status}}</span></p>
                            @endif
                    </div>
                </div>
            </div>  
        @endforeach
        @else
            <div class="col-12">
            <h3 class="text-center">No Tasks created yet</h3>
            </div>
        @endif
        
    </div>