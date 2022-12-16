@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Federal View</h2>
            </div>
        </div>
    </div>
    <div class="pull-left">
                <a class="btn btn-danger" href="{{ route('federals.create') }}"> Create New federals</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($federals as $federal)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $federal->name }}</td>
            <td>{{ $federal->code }}</td>
            <td>

            <form action="{{ route('federals.destroy',$federal->id) }}" method="POST">
                
    
                    <a class="btn btn-primary" href="{{ route('federals.edit',$federal->id) }}">Edit</a>
                     
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $federals->links() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
  
      