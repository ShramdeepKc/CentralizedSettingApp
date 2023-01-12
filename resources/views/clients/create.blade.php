@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a class="btn btn-info" >ADD NEW CLIENT</a>
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
   
<form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <div class="form-group">
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder=" Enter Your Name">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text"  name="code" class="form-control" placeholder="Code">
               
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
    <div class="form-group row">
          <label for="federal">Federals:</label>
          <select id="federal" name="federal_id" class="form-control" value="federal">
          @foreach ($federal as $fed)
          <option value="{{$fed->id}}">{{$fed->name}}</option>
          @endforeach
     </select></div>
</div>
<div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder=" Upload image">
            </div>
        </div>   
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <label for="filupDate">Fillup Date:</label>
                 <input type="date" id="fillup_date" class="form-control" name="fillup_date">
               </div>
        </div> 
                                                           

        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">ADD</button>
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

