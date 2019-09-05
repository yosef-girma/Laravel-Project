@extends('layouts.app')
@section('content')
<div class="container">

        <div class="col-md-3 float-right" >
        
                <h4> Action </h4>
                <ol class="list-unstyled">
                <p> <li> <a href="/projects/{{ $project->id }}/edit/"> Edit</a> <li> </p>
                <p> <li> <a href="/projects/create"> create new project</a>
                <p> <li> <a href="/projects">My Projects </a>    
                    
                    @if($project->user_id == Auth::user()->id)
                    <p> <li> 
                    
                    <a href=" " onclick="
                    
                    var result = confirm('are you sure you want to delete?');
                
                    if(result)
                    {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                
                    }
                   "> 
                    
                    Delete </a> 
                    
                    <form  id="delete-form" method="post" action="{{ route('projects.destroy',[ $project->id ]) }} " style="display:none;">
                    <input type="hidden" name="_method" value="delete">
                    {{  csrf_field() }}
                
                    </form>
                    </li> 
                
                    </p>
                    @endif
                </ol>

              <h4> Add memeber </h4>
              <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                  <form action="{{ route('projects.adduser')}}" id="adduser" method="post">
                  <div class="input-group">
                    
                    <input type="hidden" value="{{ $project->id}}" name="project_id">
                     <input type="text" class="form-control"  placeholder="Email">
                     <span class="input-group-btn"><button type="submit" class="btn btn-default">Add</button>
                     </span>
                </div>
                  </form>
             </div>     
             </div> 
             <br />
             <h4>  Team member </h4> 
             <ol class="list-unstyled">
            <li> <a href="#">Yosef Girma </a></li> 
            <li> <a href="#">Yosef Girma </a></li>
            <li> <a href="#">Yosef Girma </a></li>
            <li> <a href="#">Yosef Girma </a></li>
            </ol>  


                </div>
<div class="col-md-9 col-lg-9 float-left">
<div class="jumbotron">
   <h1> </h1>
   <p class="lead"> {{ $project->name }}  </p> 
</div>

        

<a href="/projects/create" class="btn btn-primary float-right btn-sm">Add Project</a>
<div class="row" style="background:white; margin:10px"> 

    <form method="post" action="{{ route('comments.store') }}">
        {{ csrf_field() }}
        
        <input type="hidden" name="commentable_type"    value="App\Project" >
        <input type="hidden" name="commentable_id" value="{{ $project->id}}" >
         <div class="form-group">
             <label for="comment-content"> Enter Comment <span class="required"> * </span> </label>
             <textarea type="text"
                    name="body"
                    row="3"
                    placeholder="Enter Comment"
                    class="form-control">
         </textarea>

                    

         </div>
         <div class="form-group">
         <label for="project-content"> url photo </label>
         <textarea placeholder="Enter url"
                   style="resize:vertical"
                   name="url"
                   rows="3" 
                   class="form-control autosize-target text-left">
                
         </textarea>

         </div>
         <div class="form-group">
          <input type="submit" class="btn btn-primary" value="submit" >
         </div>    
     </form>

     @include('partials.comment');
    {{-- @foreach ($project->projects as $project)
        <div class="col-lg-4">
          
        <h2> {{ $project->name }} </h2>
         <p class="text-danger">  {{ $project->description }} </p>    
        <p> <a class="btn btn-primary"   href="/projects/{{ $project->id}}"  role="button"> View Project</a></p>
        </div>
    @endforeach --}}
</div>


<div class="col-lg-4 col-md-4 col-sm-4">

<p> <a class="btn btn-primary" href="/projects/{{ $project->id}}" role="button"  >View Project</a></p>


</div>
</div>
</div>
</div>


@endsection