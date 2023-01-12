@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
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
   
<form action="{{ route('status.store') }}" method="POST">
    @csrf
  
    <div class="col-xs-5 col-sm-5 col-md-5 ">
    <div class="form-group1">
          <label for="client" >Clients:</label>
          <select id="client" class="form-control" name="client_id" value="clients">
          @foreach ($clients as $client)
          <option value="{{$client->id}}">{{$client->name}}</option>
          @endforeach
     </select></div>
</div><br>
<div class="col-xs-5 col-sm-5 col-md-5 ">
    <div class="form-group1">
          <label for="product">products:</label>
          <select id="product" class="form-control" name="product_id" value="product">
          @foreach ($products as $product)
          <option value="{{$product->id}}">{{$product->name}}</option>
          @endforeach
     </select></div>
</div><br>
<label for="status">STATUS</label><br>
  <input type="radio" id="active" name="status" value="active">
  <label for="active">Active</label><br>
  <input type="radio" id="inactive" name="status" value="inactive">
  <label for="inactive">In Active</label><br>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Remarks:</strong>
                <textarea class="form-control"   name="remarks" placeholder="Remarks"></textarea>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>APP URL:</strong>
                <textarea class="form-control"  name="appurl" placeholder="app url"></textarea>
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 ">
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

