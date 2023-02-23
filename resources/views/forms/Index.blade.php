@extends('layouts.app2') 
@section('content')
    <div class="row ">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('forms.create') }}" title="Create a form"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    {{-- for datails about this lignes , look at methode store() in FormController --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
@if ( $forms->count() > 0)

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>email</th>
            <th>age</th>
            <th>note</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($forms as $form)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $form->name }}</td>
                <td>{{ $form->email }}</td>
                <td>{{ $form->age }}</td>
                <td>{{ $form->note }}</td>
                <td>{{ date_format($form->created_at, 'jS M Y') }}</td>
                <td>
                    <a href="{{ route('forms.show',$form->id) }}" title="show">

                   {{-- find user by name with the controller show methode --}}
                    {{-- <a href="{{ route('forms.show', str_replace(' ', '_', $form->name)) }}" title="show"> --}}
                        
                    {{-- find user by name look at form model : getRouteKeyName() --}}
                    {{-- <a href="{{ route('forms.show', $form) }}" title="show">  --}}

                        <i class="fas fa-eye text-success  fa-lg"></i>
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
    </table>

@else 
<h5> empty users !</h5>
@endif

    <div class="d-flex">
        {{-- Displaying Pagination Results , for more edtails look at : https://laravel.com/docs/7.x/pagination --}}
    {!!  $forms->links() !!}  
    </div>
@endsection
