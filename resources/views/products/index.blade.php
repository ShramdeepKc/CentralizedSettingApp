@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product View</h2>
            </div>
        </div>
    </div>
    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create  Products</a>
            </div><br> 
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Code</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i  }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->description }}</td>
            <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                
    
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                 
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

          
            </td>
        </tr>
        @endforeach
    </table>
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
    