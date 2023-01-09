@extends('adminlte::page')

@section('title')

@section('content_header')

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

<div class="row">
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>{{ $clients }}</h3>
<p>Clients List</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="{{route('clients.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{$products}}</h3>
<p>Products are in use</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>{{$user}}</h3>
<p>User Registrations</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="/" class="small-box-footer">
More info <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
</div>


















@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script> console.log('Hi!'); </script>
@stop