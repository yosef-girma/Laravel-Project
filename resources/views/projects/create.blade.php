@extends('layouts.app')
@section('content')
<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background:white;margin:10px;">
            <form method="post" action="{{ route('projects.store') }}">
               {{ csrf_field() }}
               
                <div class="form-group">
                    <label for="project-name"> Project Name <span class="required"> * </span> </label>
                    <input type="text"
                           id="project-name"
                           name="name"
                           required
                           spellcheck="false"
                           placeholder="project name"
                           class="form-control"
                           />

                           @if($companies == null)
                           <input class="form-control" type="hidden"
                          
                           name="company_id"
                           value="{{ $company_id}}"  
                           >
                           @endif


                </div>
                @if( $companies !=null)
                <div class="form-group">
                    <label for="company-name"> Company name</label>
                <select class="form-control" name="company_id">
                    @foreach($companies as $company)
                    <option value="{{$company->id}}"> {{ $company->name }} </option>
                     @endforeach
                </select>
                
                </div>
                @endif

                <div class="form-group">
                <label for="project-content"> Description </label>
                <textarea placeholder="Enter description"
                          style="resize:vertical"
                          id="project-content"
                          name="description"
                          rows="5" spellcheck="false"
                          class="form-control autosize-target text-left">
                       
                </textarea>

                </div>
                <div class="form-group">
                 <input type="submit" class="btn btn-primary" value="submit" >
                </div>    
            </form>

            </div>
            
</div>
<div class="col-md-3 col-lg-3 float-right">
<div class="sidebar-module ">
        <h4> Action </h4>
        <ol class="list-unstyled">
        <!-- <p> <a href="/projects/  $project->id /edit/"> </a>      </p> -->
        <p><li class="list-group-item">  <a href="/projects/"> All Projects </a> <li> </p>
        </ol>
        </div>
</div>

@endsection