@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="btn btn-info" >EDIT PAGE</h1>
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
   
<form action="{{ route('status.update',$status->id) }}" method="POST">
    @csrf
    @method('PUT')
<div class="card">
   <div class="card-body row">
   <div class="col">
    <div class="col-xs-4 col-sm-4 col-md-4 ">
     <div class="form-group">
          <label for="client">Clients:</label>
          <select id="client" class="form-control" name="client_id" value="clients">
          @foreach ($clients as $client)
          <option value="{{$client->id}}" {{$client->id==$status->client_id ? 'selected':''}}>{{$client->name}}</option>
          @endforeach
      </select></div>
</div><br>
<div class="col-xs-4 col-sm-4 col-md-4 "> 
    <div class="form-group1">
          <label for="product">products:</label>
          <select id="product" class="form-control" name="product_id" value="{{$status->product->name}}">
          @foreach ($products as $product)
          <option value="{{ $product->id }}" {{ $product->id == $status->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
          @endforeach
     </select></div>
</div><br>
<label for="status">STATUS</label><br>
  <input type="radio" id="active" name="status" value="active"{{ ($status->status=="active")? "checked" : "" }}>
  <label for="active">Active</label><br>
  <input type="radio" id="inactive" name="status" value="inactive"{{ ($status->status=="inactive")? "checked" : "" }}>
  <label for="inactive">In Active</label><br>

        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>Remarks:</strong>
                <input type="text" class="form-control"  name="remarks" value="{{$status->remarks}}" > </input>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7">
            <div class="form-group">
                <strong>App-URL:</strong>
                <input type="text" class="form-control"  name="appurl" value="{{$status->appurl}}"> </input>
            </div>
        </div>
    
        <div class="col-xs-7 col-sm-7 col-md-7 ">
                <button type="submit" class="btn btn-primary">EDIT</button>
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

