@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a class="btn btn-info" >EDIT CLIENT</a>
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
   
<form action="{{ route('products.update',$product->id) }}" method="POST">
@csrf
        @method('PUT')
  
     <div class="col">
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control"  value="{{ $product->name }}">
            </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" class="form-control"  name="code" value="{{ $product->code }}"></input>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" class="form-control"  name="description" value="{{ $product->description }}"></input>
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 ">
                <button type="submit" class="btn btn-primary">Edit</button>
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
