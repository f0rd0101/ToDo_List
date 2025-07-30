@extends('layouts.main')
@section('content')
<form action="{{ route('tasks.update', $task->id) }}" method="post">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label>Task Name</label>
    <input  name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter task name" value = "{{ $task->title }}">

    <label>Content</label>
    <input name="content" class="form-control"  id="exampleInputPassword1" placeholder="Add details" value = "{{ $task->content}}">
  </div>
  <div class="btn-update">
  <button type="submit" class="btn btn-primary btn-update">Update</button>
  </div>

</form>
@endsection