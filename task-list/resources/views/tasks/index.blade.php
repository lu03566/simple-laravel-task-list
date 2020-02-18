@extends('base')

@section('main')
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<div>
<a style="margin: 19px;" href="{{ route('create')}}" class="btn btn-primary">New tasks</a>
</div>  


	
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Task List</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->name}}</td>
            <td>
                <a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection