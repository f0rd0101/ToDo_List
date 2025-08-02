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
  <button type="submit" class="btn btn-update"  style="
  background-color: #3b82f6;
  border-radius: 6px;
  padding: 8px 16px;
  border: none;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 2px 6px rgba(59, 130, 246, 0.4);
"
onmouseover="this.style.backgroundColor='#2563eb'; this.style.boxShadow='0 4px 12px rgba(37, 99, 235, 0.6)';"
onmouseout="this.style.backgroundColor='#3b82f6'; this.style.boxShadow='0 2px 6px rgba(59, 130, 246, 0.4)';">Update</button>
  </div>

</form>
@endsection