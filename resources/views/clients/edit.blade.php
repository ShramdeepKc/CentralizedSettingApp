@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="btn btn-info" >EDIT PAGE</h1>
@stop

@section('content')
<form action="{{ route('clients.update',$client->id) }}" method="POST" enctype="multipart/form-data"   >
        @csrf
        @method('PUT')
        <div class="card">
   <div class="card-body row">
        <div class="col">
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $client->name }}" >
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" value="{{ $client->code }}" >
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 ">
        <div class="form-group col-md-4">
          <label for="federal">Federals:</label>
          <select id="federal" class="form-control" name="federal_id" value="{{$client->federal->name}}">
          @foreach ($federal as $fed)
          <option value="{{$fed->id}}" {{ $fed->id == $client->federal_id ? 'selected' : '' }}>{{ $fed->name }}</option>
          @endforeach
     </select></div>
    </div>
     <div class="col-xs-7 col-sm-7 col-md-7">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $client->image }}" width="100px">
                </div>
            </div>
<div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <label for="filupDate">Fillup Date:</label>
                 <input type="date" id="fillup_date" class="form-control" name="fillup_date" value="{{$client->fillup_date}}">
               </div>
        </div> 

        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
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

   

   
