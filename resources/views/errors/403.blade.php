@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">

            <h2 class="bg-danger"> this page is not authorized :/</h2>
               <h3> <a class="bg-info" href="{{ url('forms') }}"> <------------ Go Back ----------> </a> </h3>

        </div>
    </div>
</div>

@endsection