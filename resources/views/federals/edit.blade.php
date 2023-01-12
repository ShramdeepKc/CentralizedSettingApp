@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a class="btn btn-info" >EDIT FEDERALS</a>
@stop

@section('content')

   
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
  
    <form action="{{ route('federals.update',$federal->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="col">
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $federal->name }}" class="form-control" >
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input type="text" class="form-control"  name="code" value="{{ $federal->code }}"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
    
