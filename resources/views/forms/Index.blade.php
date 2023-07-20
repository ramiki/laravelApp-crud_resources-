@extends('layouts.app2') 
@section('content')
    <div class="row ">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Class : </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('forms.create') }}" title="Create a form"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>

            {{-- if is_admin = true show button to send eamil --}}
            @if(auth::user()->is_admin)
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('forms.mail') }}" title="Create a form"> Send mail :  <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
            @endcan
        </div>
    </div>

    {{-- for datails , look at methode store() in FormController --}}
    {{-- get flashed session methode 1  --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    

    {{-- get flashed session methode 2  --}}
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}

    {{-- get flashed session methode 3  --}}
    {{-- @if (session()->has('success'))
            <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
    @endif --}}
        



{{-- table view --}}

{{-- @if ( $forms->count() > 0)

    <table class="table table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>by</th>
            <th>email</th>
            <th>age</th>
            <th>note</th>
            <th>image</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($forms as $form)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $form->name }}</td> --}}
                {{-- afficher user name by relationshhip --}}
                {{-- <td>{{ $form->user->name }}</td> --}}
                {{-- afficher user name by auth --}}
                {{-- <td>{{ Auth::user()->name }}</td> --}}
                {{-- <td>{{ $form->email }}</td>
                <td>{{ $form->age }}</td>
                <td>{{ $form->note }}</td>
                <td>{{ $form->image }}</td>
                <td>{{ date_format($form->created_at, 'jS M Y') }}</td>
                <td>
                    <a href="{{ route('forms.show',$form->id) }}" title="show"> --}}

                   {{-- find user by name with the controller show methode --}}
                    {{-- <a href="{{ route('forms.show', str_replace(' ', '_', $form->name)) }}" title="show"> --}}
                        
                    {{-- find user by name look at form model : getRouteKeyName() --}}
                    {{-- <a href="{{ route('forms.show', $form) }}" title="show">  --}}

                        {{-- <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>
                    <a href="{{ route('forms.edit', $form->id) }}">
                        <i class="fas fa-edit  fa-lg"></i>
                    </a>                  
                    <form action="{{ route('forms.destroy', $form->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>                       
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </table> --}}


    {{-- session walk trought --}}
{{-- {{ dd(session())  }}   --}}

{{-- session file : --}}
 {{-- {{ dd(session()->getname()) }} --}}
 {{-- {{ dd(session()->getId()) }} --}}

{{-- session file -> attribute --}}
 {{-- {{ dd(session('_token')) }} --}}
 {{-- {{ dd(session()->get('_token')) }} --}}

{{-- session file -> attribute -> _flash--}}
{{-- {{ dd(session("_flash")['old'] )  }}   --}}

    {{-- auth walk trought --}}
{{-- {{ dd(auth())  }}   --}}

{{-- auth guards : --}}
{{-- {{ ddd(auth()->user())  }}   --}}
 

{{-- cards view --}}



<br>

@if ( $forms->count() > 0)

<div class="row">
@foreach ($forms as $form)

{{-- other methode to retrive forms and directly check if empty  --}}
{{-- @forelse ($forms as $form) --}}
<div class="col-sm-6 col-md-3">

<div class="card" style="width: 16rem;">
    <img src="{{ asset('storage/'.$form->image)}}" class="card-img-top" alt="...">
    <div class="card-body ">
      <h5 class="card-title text-center">Student : </h5>
    </div>
   
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><strong>Name :</strong> {{ $form->name }}</li>
      <li class="list-group-item"> <strong>Age:</strong> {{ $form->age }}</li> 
      {{-- @if(auth::user()->is_admin) --}}
      @if( $form->user_id == auth::id())
      <li class="list-group-item text-success"> <strong>by :</strong> {{ $form->user->name }}</li>
      @endif
    </ul>

    <div class="card-body bg-secondary text-center" >
        <a href="{{ route('forms.show', $form->id) }}" class="d-block card-link btn btn-primary">Show Profile</a>
        @can('update' , $form)
      <br>
        <a href="{{ route('forms.edit', $form->id) }}" class="d-block card-link btn btn-warning">Edite Profile</a>
        @endcan
        @can('delete' , $form)
      <br>
        <div style="display: inline-block;">
            <form action="{{ route('forms.destroy', $form->id) }}" method="POST">
             @csrf
             @method('DELETE')
                <button type="submit" title="delete" class="card-link btn btn-danger">
                 <span> Delete Profile</span>
                </button>                       
            </form>
        </div> 
        @endcan  
     </div>
    
    </div>
</div>
        @endforeach
        {{-- @empty --}}
    </div>



@else 
<h5> empty users !</h5>
@endif
{{-- @endforelse --}}

    <div class="d-flex">
        {{-- Displaying Pagination Results , for more edtails look at : https://laravel.com/docs/7.x/pagination --}}
    {!!  $forms->links() !!}  
    </div>
@endsection
