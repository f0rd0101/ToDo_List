@extends('layouts.main')
@section('content')
<form action="{{ route('tasks.update', $task->id) }}" method="post">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label>Task Name</label>
    <input  name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter task name" value = "{{ $task->title }}">
    
  </div>
  <div class="form-group">
    <label>Content</label>
    <input name="content" class="form-control"  id="exampleInputPassword1" placeholder="Add details" value = "{{ $task->content}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection