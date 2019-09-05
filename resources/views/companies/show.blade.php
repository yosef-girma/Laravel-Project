@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 float-left">
<div class="jumbotron">
   <h1> </h1>
   <p class="lead"> {{ $company->name }}  </p> 
</div>

<a href="/projects/create/{{ $company->id}}" class="btn btn-primary float-right btn-sm">Add Project</a>
<div class="row" style="background:white; margin:10px"> 
    @foreach ($company->projects as $project)
        <div class="col-lg-4">
          
        <h2> {{ $project->name }} </h2>
         <p class="text-danger">  {{ $project->description }} </p>    
        <p> <a class="btn btn-primary"   href="/projects/{{ $project->id}}"  role="button"> View Project</a></p>
        </div>
    @endforeach 
    
</div>

</div>
<div class="col-sm-3 col-md-3 col-lg-3 float-right">
<div class="sidebar-module sidebar-module-inset">
<h4> Action </h4>
<ol class="list-unstyled">
<p> <li> <a href="/companies/{{ $company->id }}/edit/"> Edit</a> <li> </p>
<p> <li> <a href="/projects/create/{{$company->id}}"> Add Project</a></p>
<p> <li> <a href="/companies/create"> Add new Company</a>
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
    
    <form  id="delete-form" method="post" action="{{ route('companies.destroy',[ $company->id ]) }} " style="display:none;">
    <input type="hidden" name="_method" value="delete">
    {{  csrf_field() }}

    </form>
    </li> 
    </p>
</ol>
</div>
</div>
@endsection