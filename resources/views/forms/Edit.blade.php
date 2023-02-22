@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit form</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('forms.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('forms.update', $form->id) }}" method="POST">

        {{--  add a key in this post , the key generrated by private key of this laravel app (look at .env )  --}}
        @csrf

        {{-- add hint  --}}
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="name" name="name" value="{{ $form->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nb:</strong>
                    <textarea class="form-control" style="height:50px" name="nb"
                        placeholder="email">{{ $form->nb }}</textarea>
                </div> 
                </div>--}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>email:</strong>
                        <input type="email" name="email" value="{{ $form->email }}" class="form-control" placeholder="email">
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>age:</strong>
                    <input type="number" name="age" class="form-control" placeholder="{{ $form->age }}"
                        value="{{ $form->age }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>note:</strong>
                    <input type="number" name="note" class="form-control" placeholder="{{ $form->note }}"
                        value="{{ $form->age }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection