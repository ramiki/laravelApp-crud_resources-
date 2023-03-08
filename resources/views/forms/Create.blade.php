{{-- for more info about blade Templates : check the doc or the two pic in views/layouts folder : --}}

{{-- call the layouts/app.blade.php and put it in this page  --}}
@extends('layouts.app2')

{{-- put this content in @yield('content') of extended layouts/app.blade.php above --}}
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New profile :</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('forms.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
    
    {{-- if the incoming request fields do not pass the given validation rules 
    Laravel will automatically redirect the user back to their previous location. 
    In addition, all of the validation errors and request input will automatically be flashed to the session.
    $errors variable is shared with all of your application's views
    lang errors validation changed in config/app.php at local --}}

    {{-- handle errors methode 1 : --}}
    {{-- @if (count($errors)) --}}  
    {{-- or --}}
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> errors.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    
    <form action="{{ route('forms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- upload image --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group @if ($errors->get('image')) has-error @endif">
                    <strong>image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image"  value="{{ old('image') }}" >
                    @error('image')
                          <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group @if ($errors->get('name')) has-error @endif">
                    <strong>Name:</strong>
                    {{-- displaying old input within a Blade template, it is more convenient to use the old helper 
                    to repopulate the form. If no old input exists for the given field, null will be returned --}}
                    <input type="name" name="name" class="form-control" placeholder="name"  value="{{ old('name') }}" >
                    @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- handle errors methode 2 : --}}
            {{-- @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}

            {{-- handle errors methode 3 : --}}
            {{-- @foreach ($errors->get('name') as $message)
                <div class="alert alert-danger">{{ $message }}</div>
            @endforeach --}}


             {{-- champ 'nb' if needed !  --}}
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nb:</strong>
                    <textarea class="form-control" style="height:50px" name="nb"
                        placeholder="nb"> ## ... </textarea>
                </div> 
                </div> --}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>email:</strong>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ old('email')}}" >
                        @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>age:</strong>
                    <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="age" value="{{ old('age') }}" >
                    @error('age')
                          <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>note:</strong>
                    <input type="number" name="note" class="form-control @error('note') is-invalid @enderror" placeholder="note" value="{{ old('note') }}" >
                    @error('note')
                          <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection