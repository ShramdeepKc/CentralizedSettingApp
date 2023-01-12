@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a class="btn btn-info" >ADD NEW FEDERALS</a>
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
   
<form action="{{ route('federals.store') }}" method="POST">
    @csrf
  
     <div class="col">
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 " >
            <div class="form-group ">
                <strong>Code:</strong>
                <input type="text"  name="code" class="form-control" placeholder="Code"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" class="btn btn-secondary">ADD</button>
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

