@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<form action="{{ route('clients.update',$client->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $client->name }}" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" value="{{ $client->code }}" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <div class="form-group1">
          <label for="federal">Federals:</label>
          <select id="federal" name="federal_id" value="{{$client->federal->name}}">
          @foreach ($federal as $fed)
          <option value="{{$fed->id}}" {{ $fed->id == $client->federal_id ? 'selected' : '' }}>{{ $fed->name }}</option>
          @endforeach
     </select></div>
     <div class="col-xs-3 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $client->image }}" width="100px">
                </div>
            </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="filupDate">Fillup Date:</label>
                 <input type="date" id="fillup_date" name="fillup_date" value="{{$client->fillup_date}}">
               </div>
        </div> 

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
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

   

   
