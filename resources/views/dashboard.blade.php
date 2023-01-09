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



<div class="col-md-5">

<div class="card">
<div class="card-header">
<h3 class="card-title">All Clients</h3>
<div class="card-tools">
<span class="badge badge-danger">{{ $clients }} Clients</span>
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
@foreach($list as $lists)
<div class="card-body p-0">
<ul class="users-list clearfix">
<li>
<td><img src="/image/{{ $lists->image }}" width="80px"></td>
<a class="users-list-name">{{$lists->name}}</a>
<a class="users-list-date">Started using at ➡️ {{$lists->fillup_date}}</a>
</li>
</ul>
</div>
@endforeach
<div class="card-footer text-center">
<a href="{{Route('clients.index')}}">View All Clients</a>
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