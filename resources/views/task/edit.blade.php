@extends('layouts.main')
@section('content')
<form action="{{ route('tasks.update', $task->id) }}" method="post">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label>Task Name</label>
    <input  name="title" class="form-control" id="exampleInputEmail1"  placeholder="What task do you want to acomplish today?" value = "{{ $task->title }}">
    
  </div>
  <div class="form-group">
    <label>Content</label>
    <input name="content" class="form-control"  id="exampleInputPassword1" placeholder="Tell more about what do you want to do" value = "{{ $task->content}}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection