@extends('layouts.app2')

@section('content')


{{-- simple show --}}

    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"> 
                <h2>  {{ $form->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('forms') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $form->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                {{ $form->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>age:</strong>
                {{ $form->age }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>note:</strong>
                {{ $form->note }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{ $form->created_at }} --}}
                {{-- {{ date_format($form->created_at, 'jS M Y') }}
            </div>
        </div>
    </div> --}}




{{-- card show --}}

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> profile : </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('forms') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>


    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/'.$form->image)}}" class="card-img-top" alt="...">
        <div class="card-body ">
          <h5 class="card-title">Student Info : </h5>
          <p class="card-text">-----------------</p>
        </div>
       
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Name :</strong> {{ $form->name }}</li>
          <li class="list-group-item"><strong>Email :</strong> {{ $form->email }}</li>
          <li class="list-group-item"> <strong>Age:</strong> {{ $form->age }}</li>
          <li class="list-group-item"><strong>Note:</strong> {{ $form->note }}</li>
          <li class="list-group-item"><strong>Date Created:</strong> {{ date_format($form->created_at, 'jS M Y') }}</li>
        </ul>
      
        <div class="card-body bg-info">
          <a href="{{ route('forms.edit', $form->id) }}" class="card-link btn btn-warning">Edite Profile</a>

          <div style="display: inline-block;">
            <form action="{{ route('forms.destroy', $form->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" title="delete" class="card-link btn btn-danger">
                    <span> Delete Profile</span>
                </button>                       
            </form>
            </div>
            
        </div>

        </div>




        
@endsection

