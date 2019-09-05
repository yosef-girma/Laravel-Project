@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
<div class="card  ">


    <div class="card-header bg-primary">
        projects
     <a class="float-right btn btn-primary" href="/projects/create/"> Create new project</a>

    </div>

  <div class="card-block">

   <ul class="list-group">
    <li class="list-group-item"> Projects</li> 
    @foreach ($projects as $project)
          
   <li class="list-group-item"> <a href="/projects/{{ $project->id}}">{{ $project->name }} </a></li>
   
    @endforeach

    </ul>    

    </div>

    </div>
</div>


@endsection