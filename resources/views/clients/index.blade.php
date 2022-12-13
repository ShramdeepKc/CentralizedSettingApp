@extends('clients.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Client View</h2>
            </div>
        </div>
    </div>
    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Client</a>
            </div><br>
            <div class="pull-left">
                <a class="btn btn-danger" href="{{ route('federals.create') }}"> Create New federals</a>
            </div><br>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('federals.index') }}"> Show federals</a>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('status.index') }}"> Show status</a>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.index') }}"> Show Products</a>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Show Products</a>
            </div><br>
            
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>  
            <th>Federals</th>         
            <th>Name</th>
            <th>Code</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clients as $client)
       
        
        <tr>
            <td>{{ ++$i }}</td> 
                   
            <td>{{$client->federal->name}}</td>
           
           
            <td>{{ $client->name }}</td>
            <td>{{ $client->code }}</td>
            <td>
           
            <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                
            </form>
            </td>
        </tr>
        @endforeach
      
    </table>
  
    {!! $clients->links() !!}
      