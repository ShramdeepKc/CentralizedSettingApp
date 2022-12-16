@extends('adminlte::page')

@section('title')

@section('content_header')
 
@stop

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Status View</h2>
            </div>
        </div>
    </div>
    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('status.create') }}"> Create</a>
            </div><br> 
    
   
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>  
            <th>Clients</th>         
            <th>Products</th>
            <th>Status</th>
            <th>Remarks</th>
            <th>APP-URl</th>
            <th width="280px">Action</th>
        </tr>
       @foreach($status as $stat)     
        <tr>
            <td>{{ ++$i }}</td>     
            <td>{{ $stat->client->name }}</td> 
            <td>{{ $stat->product->name }}</td>
            <td>{{ $stat->status }}</td>
            <td>{{ $stat->remarks }}</td>
            <td>{{ $stat->appurl }}</td>
           
            <td>
            <form action="{{ route('status.destroy',$stat->id) }}" method="POST">
                <a href="{{ route('status.edit',$stat->id)}}" class="btn btn-primary">Edit</a>
                @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
            </td>
                   
            </form>
                
           
           
        </tr>
        @endforeach
      
    </table>
  
    {!! $status->links() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
   