@extends('layouts.main')
@section('content')
<div>
    <ul>
        @foreach($tasks as $task)
         <li>
           <h2>{{ $task->title }}</h2>
           <p>{{ $task->content }}</p>
         </li>
        @endforeach
    </ul>
</div>

<form action="{{ route('tasks.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label>Task Name</label>
    <input  name="title" class="form-control" id="exampleInputEmail1"  placeholder="What task do you want to acomplish today?">
    
  </div>
  <div class="form-group">
    <label>Content</label>
    <input name="content" class="form-control"  id="exampleInputPassword1" placeholder="Tell more about what do you want to do">
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection