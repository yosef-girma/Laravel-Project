@extends('layouts.app')
@section('content')
<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background:white;margin:10px;">
            <form method="post" action="{{ route('companies.update',[$company->id]) }}">
               {{ csrf_field() }}
                <input  type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="company-name"> Company Name <span class="required"> * </span> </label>
                    <input type="text"
                           id="company-name"
                           name="name"
                           required
                           spellcheck="false"
                           placeholder="company name"
                           class="form-control"
                           value="{{ $company->name }}" />

                </div>
                <div class="form-group">
                <label for="company-content"> Description </label>
                <textarea placeholder="Enter description"
                          style="resize:vertical"
                          id="company-content"
                          name="description"
                          rows="5" spellcheck="false"
                          class="form-control autosize-target text-left">
                          {{ $company->description }}
                </textarea>

                </div>
                <div class="form-group">
                 <input type="submit" class="btn btn-primary" value="submit" >
                </div>    
            </form>

            </div>
            
</div>
<div class="col-md-3 col-lg-3 pull-right">
<div class="sidebar-module sidebar-module-inset">
        <h4> Action </h4>
        <ol class="list-unstyled">
        <!-- <p> <a href="/companies/  $company->id /edit/"> </a>      </p> -->
        <p> <li class="list-group-item"> <a href="/companies/{{ $company->id }}"> View Companies </a> </li>  </p>
        <p><li class="list-group-item">  <a href="/companies/"> All Companies </a> <li> </p>
        </ol>
        </div>
</div>

@endsection