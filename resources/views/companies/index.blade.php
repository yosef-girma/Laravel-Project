@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
<div class="card  ">


    <div class="card-header bg-primary">
        companies
     <a class="float-right btn btn-primary" href="/companies/create"> Create new company</a>

    </div>

  <div class="card-block">

   <ul class="list-group">
    <li class="list-group-item"> Prestigous Company </li> 
    @foreach ($companies as $company)
          
   <li class="list-group-item"> <a href="/companies/{{ $company->id}}">{{ $company->name }} </a></li>
   
    @endforeach

    </ul>    

    </div>

    </div>
</div>


@endsection